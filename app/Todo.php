<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    public function item() {
        return $this->belongsTo(Item::class);
    }
    
    public function tasks() {
        return $this->hasMany(Task::class);
        // return $this->hasMany('App\Category', 'parent_id')->with('tasks');
    }

    public function addTask($task) {
        $this->tasks()->create([
            'task' => $task['task']
        ]);
    }
}
