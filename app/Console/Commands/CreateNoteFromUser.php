<?php

namespace App\Console\Commands;

use App\User;
use App\Note;
use Illuminate\Console\Command;

class CreateNoteFromUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create_note';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new random note from an existing user';

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

        $note = $user->notes()->create([
            'title' => 'My Third note',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);
    }
}
