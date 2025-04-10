# Use an official PHP image with Composer (adjust version as needed)
FROM laravelsail/php82-composer:latest

# Set working directory
WORKDIR /var/www/html

# Copy composer files first for caching dependencies
COPY composer.json composer.lock ./

# Install production dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy all project files to the container
COPY . .

# Generate optimized autoload files
RUN composer dump-autoload --optimize

# Set file permissions (adjust the user and group if necessary)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (the default HTTP port)
EXPOSE 80

# Run Artisan commands (optional: cache config/routes/views, etc.)
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Start PHP’s built-in server (for production consider using a proper web server like Nginx)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
