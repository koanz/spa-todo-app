<?php

namespace Tests\Feature;

use App\User;
use App\Todo;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoManTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_todo()
    {
//        $this->withoutExceptionHandling();
        $this->post('/to_dos', $this->data(factory(User::class)->create()));

        $this->assertCount(1, Todo::all());
        $this->assertCount(3, Task::all());
    }

    /** @test */
    public function a_user_can_add_a_new_task_from_existing_todo()
    {
        $this->post('/to_dos', array_push($this->data(factory(User::class)->create())['tasks'], ));

        $toDo = Todo::first();
        dd($toDo->tasks);
    }

    private function data($user) {
        return [
            'title' => 'Example title 1',
            'user_id' => $user->id,
            'tasks' => [
                0 => [
                    'task' => 'Buy some fruits',
                    'checked' => false
                ],
                1 => [
                    'task' => 'Get the cellphone bill',
                    'checked' => false
                ],
                2 => [
                    'task' => 'Cancel the subscription of the cellphone',
                    'checked' => false
                ]
            ]
        ];
    }

}
