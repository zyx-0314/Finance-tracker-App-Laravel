# Use a base image with PHP and Composer (adjust version as needed)
FROM laravelsail/php82-composer:latest

# --------------------------------------------------------------------
# Step 0: Install PostgreSQL PDO Extension
# --------------------------------------------------------------------
# Update the package lists, install the PostgreSQL client library,
# and install/enable the PDO_pgsql extension.
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Set the working directory
WORKDIR /var/www/html

# --------------------------------------------------------------------
# Step 1: Copy composer files and essential files for package discover
# --------------------------------------------------------------------
# Copy composer files, artisan, and required directories first so that
# composer install can run without missing the artisan file.
COPY composer.json composer.lock artisan ./
COPY bootstrap ./bootstrap
COPY config ./config
COPY routes ./routes

# Install production dependencies without dev packages
RUN composer install --no-dev --optimize-autoloader

# --------------------------------------------------------------------
# Step 2: Copy the rest of the application code
# --------------------------------------------------------------------
COPY . .

# --------------------------------------------------------------------
# Step 3: Re-optimize autoload files and run package discover
# --------------------------------------------------------------------
RUN composer dump-autoload --optimize && php artisan package:discover --ansi

# Set proper file permissions (adjust as needed)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# --------------------------------------------------------------------
# Step 4: Set default command
# --------------------------------------------------------------------
# For a simple deployment, use Laravel's built-in server.
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
