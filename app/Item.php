<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    protected $casts = [
        'updated_at' => 'date:d/m/Y',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function note() {
        return $this->hasOne(Note::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function addTask($task) {
        $this->tasks()->create([
            'task' => $task['task']
        ]);
    }

    // public function getItemDateAttribute($value) {
    //     return Carbon::parse($value)->format('dd/mm/Y');
    // }
}
