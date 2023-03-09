<?php

uses(RefreshDatabase::class);

test('create returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');



    $response = $this->get(route('staff.rooms.create'));

    $response->assertOk();
    $response->assertViewIs('Staff.chat.room.create');

    // TODO: perform additional assertions
});

test('destroy returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $chatroom = \App\Models\Chatroom::factory()->create();
    $users = \App\Models\User::factory()->times(3)->create();

    $response = $this->delete(route('staff.rooms.destroy', ['id' => $id]));

    $response->assertOk();
    $this->assertModelMissing($staff.room);

    // TODO: perform additional assertions
});

test('edit returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $chatroom = \App\Models\Chatroom::factory()->create();

    $response = $this->get(route('staff.rooms.edit', ['id' => $id]));

    $response->assertOk();
    $response->assertViewIs('Staff.chat.room.edit');
    $response->assertViewHas('chatroom', $chatroom);

    // TODO: perform additional assertions
});

test('index returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');



    $response = $this->get(route('staff.rooms.index'));

    $response->assertOk();
    $response->assertViewIs('Staff.chat.room.index');
    $response->assertViewHas('chatrooms');

    // TODO: perform additional assertions
});

test('store returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');



    $response = $this->post(route('staff.rooms.store'), [
        // TODO: send request data
    ]);

    $response->assertOk();

    // TODO: perform additional assertions
});

test('store validates with a form request', function (): void {
    $this->assertActionUsesFormRequest(
        \App\Http\Controllers\Staff\ChatRoomController::class,
        'store',
        \App\Http\Requests\Staff\StoreChatRoomRequest::class
    );
});

test('update returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');



    $response = $this->post(route('staff.rooms.update', ['id' => $id]), [
        // TODO: send request data
    ]);

    $response->assertOk();

    // TODO: perform additional assertions
});

test('update validates with a form request', function (): void {
    $this->assertActionUsesFormRequest(
        \App\Http\Controllers\Staff\ChatRoomController::class,
        'update',
        \App\Http\Requests\Staff\UpdateChatRoomRequest::class
    );
});

// test cases...
