<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE TABLE goals (
                id BIGSERIAL PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                description TEXT NULL,
                target_amount NUMERIC(10,2) NOT NULL,
                current_amount NUMERIC(10,2) NOT NULL DEFAULT 0,
                status VARCHAR(255) NOT NULL DEFAULT 'active',
                created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TABLE IF EXISTS goals;");
    }
};
