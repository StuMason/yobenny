<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\IdentifiesUsingUuidsTrait;
use App\Models\Thing;


class Category extends Model
{
    use IdentifiesUsingUuidsTrait;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'thing_uuid'
    ];

    public function things()
    {
        return $this->belongsToMany(Thing::class);
    }
}
