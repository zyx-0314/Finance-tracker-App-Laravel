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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Unique ID for each transaction
            $table->string('type'); // e.g., "income" or "expense"
            $table->decimal('amount', 10, 2); // Transaction amount
            $table->text('description')->nullable(); // Optional description
            $table->timestamps(); // Created at and updated at timestamps
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
