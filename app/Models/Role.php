<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\IdentifiesUsingUuidsTrait;

class Role extends Model
{
    use IdentifiesUsingUuidsTrait;

    const ADMIN = 'admin';

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
