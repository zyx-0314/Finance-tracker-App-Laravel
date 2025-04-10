<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Goal title
            $table->text('description')->nullable(); // Optional description
            $table->decimal('target_amount', 10, 2); // Goal target amount
            $table->decimal('current_amount', 10, 2)->default(0); // Current progress toward the goal
            $table->string('status')->default('active'); // e.g., active, completed
            $table->timestamps(); // created_at and updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
