<?php

namespace App\Models;

use App\Models\User;

class Role extends BaseModel
{
    const ADMIN = 'admin';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
