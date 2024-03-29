<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    // public function user() {
    //     return $this->belongsTo(Item::class);
    // }

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
