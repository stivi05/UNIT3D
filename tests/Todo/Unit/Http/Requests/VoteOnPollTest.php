<?php

use Tests\TestCase;

uses(TestCase::class);

/**
 * @see \App\Http\Requests\VoteOnPoll
 */
beforeEach(function () {
    $this->subject = new \App\Http\Requests\VoteOnPoll();
});

test('authorize', function () {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $actual = $this->subject->authorize();

    expect($actual)->toBeTrue();
});

test('rules', function () {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $actual = $this->subject->rules();

    expect($actual)->toEqual([]);
});

test('messages', function () {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $actual = $this->subject->messages();

    expect($actual)->toEqual([]);
});
