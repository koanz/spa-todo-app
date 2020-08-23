<?php

namespace Tests\Feature;

use App\User;
use App\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_note_can_be_created()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->post('/notes', $this->data($user));

        $this->assertCount(1, Note::all());
    }

    /** @test*/
    public function a_registered_user_can_create_a_note()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/notes', array_merge($this->data($user), ['user_id' => '']));

        $response->assertSessionHasErrors('user_id');
    }

    private function data($user)
    {
        return [
            'title' => 'Example note 1',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'user_id' => $user->id
        ];
    }
}
