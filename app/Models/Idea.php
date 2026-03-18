<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = []; // Allow mass assignment for all fields

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
