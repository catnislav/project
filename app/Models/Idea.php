<?php

namespace App\Models;

use App\Enums\IdeaState;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = []; // Allow mass assignment for all fields

    protected $attributes = [ // Default values for new records
        'state' => IdeaState::Pending,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
