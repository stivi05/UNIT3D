<?php

uses(RefreshDatabase::class);

test('index returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $user = \App\Models\User::factory()->create();

    $response = $this->get(route('users.posts.index', [$user]));

    $response->assertOk();
    $response->assertViewIs('user.post.index');
    $response->assertViewHas('posts');
    $response->assertViewHas('user', $user);

    // TODO: perform additional assertions
});

// test cases...
