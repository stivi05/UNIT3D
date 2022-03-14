<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketController
 */
class TicketControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function assign_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $ticket = \App\Models\Ticket::factory()->create();

        $response = $this->post(route('tickets.assign', ['id' => $ticket->id]), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function close_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $ticket = \App\Models\Ticket::factory()->create();

        $response = $this->post(route('tickets.close', ['id' => $ticket->id]), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function create_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $ticketCategories = \App\Models\TicketCategory::factory()->times(3)->create();
        $ticketPriorities = \App\Models\TicketPriority::factory()->times(3)->create();

        $response = $this->get(route('tickets.create'));

        $response->assertOk();
        $response->assertViewIs('ticket.create');
        $response->assertViewHas('categories');
        $response->assertViewHas('priorities');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $ticket = \App\Models\Ticket::factory()->create();

        $response = $this->delete(route('tickets.destroy', ['id' => $ticket->id]));

        $response->assertOk();
        $this->assertDeleted($ticket);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('tickets.index'));

        $response->assertOk();
        $response->assertViewIs('ticket.index');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $ticket = \App\Models\Ticket::factory()->create();

        $response = $this->get(route('tickets.show', ['id' => $ticket->id]));

        $response->assertOk();
        $response->assertViewIs('ticket.show');
        $response->assertViewHas('user');
        $response->assertViewHas('ticket', $ticket);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->post(route('tickets.store'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function unassign_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $ticket = \App\Models\Ticket::factory()->create();

        $response = $this->post(route('tickets.unassign', ['id' => $ticket->id]), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function update_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $ticket = \App\Models\Ticket::factory()->create();

        $response = $this->patch(route('tickets.update', ['id' => $ticket->id]), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    // test cases...
}
