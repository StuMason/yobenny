<?php

namespace App\Models;

use App\Models\Event;

class Category extends BaseModel
{
    protected $fillable = [
        'name',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
