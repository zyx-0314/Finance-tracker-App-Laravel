<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create users table.
        DB::unprepared("
            CREATE TABLE users (
                id BIGSERIAL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                email_verified_at TIMESTAMP WITH TIME ZONE NULL,
                password VARCHAR(255) NOT NULL,
                remember_token VARCHAR(100) NULL,
                created_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT CURRENT_TIMESTAMP
            );
        ");

        // Create password_resets table.
        DB::unprepared("
            CREATE TABLE password_resets (
                email VARCHAR(255) NOT NULL,
                token VARCHAR(255) NOT NULL,
                created_at TIMESTAMP WITH TIME ZONE NULL
            );
        ");

        // Create sessions table.
        DB::unprepared("
            CREATE TABLE sessions (
                id VARCHAR(255) PRIMARY KEY,
                user_id BIGINT NULL,
                ip_address VARCHAR(45) NULL,
                user_agent TEXT NULL,
                payload TEXT NOT NULL,
                last_activity INTEGER NOT NULL
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TABLE IF EXISTS sessions;");
        DB::unprepared("DROP TABLE IF EXISTS password_resets;");
        DB::unprepared("DROP TABLE IF EXISTS users;");
    }
};
