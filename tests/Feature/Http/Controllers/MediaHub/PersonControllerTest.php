<?php

uses(RefreshDatabase::class);

test('index returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');



    $response = $this->get(route('mediahub.persons.index'));

    $response->assertOk();
    $response->assertViewIs('mediahub.person.index');

    // TODO: perform additional assertions
});

test('show returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $person = \App\Models\Person::factory()->create();

    $response = $this->get(route('mediahub.persons.show', ['id' => $person->id]));

    $response->assertOk();
    $response->assertViewIs('mediahub.person.show');
    $response->assertViewHas('person', $person);

    // TODO: perform additional assertions
});

// test cases...
