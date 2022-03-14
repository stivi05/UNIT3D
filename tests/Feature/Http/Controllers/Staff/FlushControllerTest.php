<?php

namespace Tests\Feature\Http\Controllers\Staff;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Staff\FlushController
 */
class FlushControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function chat_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $messages = \App\Models\Message::factory()->times(3)->create();

        $response = $this->post(route('staff.flush.chat'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function peers_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $history = \App\Models\History::factory()->create();
        $peers = \App\Models\Peer::factory()->times(3)->create();

        $response = $this->post(route('staff.flush.peers'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    // test cases...
}
