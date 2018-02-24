<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\IdentifiesUsingUuidsTrait;

class BaseModel extends Model
{
    use IdentifiesUsingUuidsTrait;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
}
