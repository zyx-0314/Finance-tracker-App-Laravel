<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Goal;
use App\Models\User;

class GoalsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that goals are listed correctly.
     */
    public function test_goals_are_listed_correctly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a sample goal
        Goal::create([
            'title' => 'Test Goal',
            'description' => 'Goal Description',
            'target_amount' => 1000,
            'current_amount' => 100,
            'status' => 'active'
        ]);

        // Visit the goals index page
        $response = $this->get(route('goals.index'));

        // Verify the page loads and displays the goal details
        $response->assertStatus(200);
        $response->assertSee('Test Goal');
        $response->assertSee('Goal Description');
    }

    /**
     * Test that a new goal can be created.
     */
    public function test_goal_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'title' => 'New Goal',
            'description' => 'Goal Description Here',
            'target_amount' => 2000,
        ];

        // Submit a POST request to store the new goal
        $response = $this->post(route('goals.store'), $data);

        // Verify redirection to the goals index and that the record exists in the database
        $response->assertRedirect(route('goals.index'));
        $this->assertDatabaseHas('goals', [
            'title' => 'New Goal'
        ]);
    }

    /**
     * Test updating an existing goal.
     */
    public function test_goal_can_be_updated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $goal = Goal::create([
            'title' => 'Test Goal',
            'description' => 'Initial Description',
            'target_amount' => 1000,
            'current_amount' => 0,
            'status' => 'active'
        ]);

        $data = [
            'title' => 'Updated Goal',
            'description' => 'Updated Description',
            'target_amount' => 1500
        ];

        $response = $this->put(route('goals.update', $goal->id), $data);
        $response->assertRedirect(route('goals.index'));
        $this->assertDatabaseHas('goals', [
            'title' => 'Updated Goal'
        ]);
    }

    /**
     * Test deleting an existing goal.
     */
    public function test_goal_can_be_deleted()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $goal = Goal::create([
            'title' => 'Goal To Delete',
            'description' => 'Delete this goal',
            'target_amount' => 500,
            'current_amount' => 0,
            'status' => 'active'
        ]);

        $response = $this->delete(route('goals.destroy', $goal->id));
        $response->assertRedirect(route('goals.index'));
        $this->assertDatabaseMissing('goals', [
            'id' => $goal->id,
        ]);
    }
}
