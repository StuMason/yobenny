<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'approved_by',
        'start_date',
        'end_date',
        'image_url',
        'location_url',
        'description',
    ];
    
}
