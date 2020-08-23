<?php

namespace App\Console\Commands;

use App\User;
use App\Task;
use DB;
use Illuminate\Console\Command;

class CreateTodoFromUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create_todo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::first();

        DB::beginTransaction();
        try {
            $todo = $user->toDos()->create([
                'title' => $this->ask('Need a title for your Todo List'),
            ]);

            do {
                $task = new Task;
                $task->task = $this->ask('What is the task?');
                $todo->aggregateTasks($task);
            } while($this->confirm('Do you wish to continue') != false);

            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
        }
    }
}
