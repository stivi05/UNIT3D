<?php

uses(RefreshDatabase::class);

test('post delete returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $post = \App\Models\Post::factory()->create();

    $response = $this->delete(route('forum_post_delete', ['postId' => $post->postId]));

    $response->assertOk();

    // TODO: perform additional assertions
});

test('post edit returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $post = \App\Models\Post::factory()->create();

    $response = $this->post(route('forum_post_edit', ['postId' => $post->postId]), [
        // TODO: send request data
    ]);

    $response->assertRedirect(withSuccess(trans('forum.edit-post-success')));

    // TODO: perform additional assertions
});

test('post edit form returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $topic = \App\Models\Topic::factory()->create();
    $post = \App\Models\Post::factory()->create();

    $response = $this->get(route('forum_post_edit_form', ['id' => $post->id, 'postId' => $post->postId]));

    $response->assertOk();
    $response->assertViewIs('forum.post.edit');
    $response->assertViewHas('topic', $topic);
    $response->assertViewHas('forum');
    $response->assertViewHas('post', $post);
    $response->assertViewHas('category');

    // TODO: perform additional assertions
});

test('reply returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $topic = \App\Models\Topic::factory()->create();
    $forum = \App\Models\Forum::factory()->create();
    $post = \App\Models\Post::factory()->create();
    $users = \App\Models\User::factory()->times(3)->create();

    $response = $this->post(route('forum_reply', ['id' => $post->id]), [
        // TODO: send request data
    ]);

    $response->assertRedirect(withSuccess(trans('forum.reply-topic-success')));

    // TODO: perform additional assertions
});

// test cases...
