<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task'];

    // public function todo() {
    //     return $this->belongsTo(Item::class);
    // }

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
