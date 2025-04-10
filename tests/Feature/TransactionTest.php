<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Transaction;
use App\Models\User;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that transactions are listed correctly.
     */
    public function test_transactions_are_listed_correctly()
    {
        // Create a user and act as that user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a sample transaction
        Transaction::create([
            'type' => 'income',
            'amount' => 200.00,
            'description' => 'Test Transaction'
        ]);

        // Visit the transactions index page
        $response = $this->get(route('transactions.index'));

        // Verify the page loads and displays the transaction details
        $response->assertStatus(200);
        $response->assertSee('Test Transaction');
        $response->assertSee('$200.00');
    }

    /**
     * Test that a new transaction can be created.
     */
    public function test_transaction_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'type' => 'expense',
            'amount' => 50.00,
            'description' => 'Expense Test'
        ];

        // Submit a POST request to store the new transaction
        $response = $this->post(route('transactions.store'), $data);

        // Verify redirection to the transactions index and database record creation
        $response->assertRedirect(route('transactions.index'));
        $this->assertDatabaseHas('transactions', [
            'description' => 'Expense Test'
        ]);
    }

    // You can extend this file with tests for update() and delete() operations.
}
