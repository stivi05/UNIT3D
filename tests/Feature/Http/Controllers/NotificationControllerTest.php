<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NotificationController
 */
class NotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function destroy_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $notification = \App\Models\Notification::factory()->create();

        $response = $this->delete(route('notifications.destroy', ['id' => $notification->id]));

        $response->assertOk();
        $this->assertDeleted($notification);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function destroy_all_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->delete(route('notifications.destroyall'));

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function faceted_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('notifications.'));

        $response->assertOk();
        $response->assertViewIs();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->get(route('notifications.index'));

        $response->assertOk();
        $response->assertViewIs('notification.index');
        $response->assertViewHas('notifications');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $notification = \App\Models\Notification::factory()->create();

        $response = $this->get(route('notifications.show', ['id' => $notification->id]));

        $response->assertRedirect(withSuccess(\trans('notification.marked-read')));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function update_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $notification = \App\Models\Notification::factory()->create();

        $response = $this->post(route('notifications.update', ['id' => $notification->id]), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function update_all_returns_an_ok_response()
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $response = $this->post(route('notifications.updateall'), [
            // TODO: send request data
        ]);

        $response->assertOk();

        // TODO: perform additional assertions
    }

    // test cases...
}
