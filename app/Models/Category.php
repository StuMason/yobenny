<?php

namespace App\Models;

use App\Models\Thing;

class Category extends BaseModel
{
    protected $fillable = [
        'name',
        'thing_uuid'
    ];

    public function things()
    {
        return $this->belongsToMany(Thing::class);
    }
}
