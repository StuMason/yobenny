<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Address;

class Thing extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_uuid',
        'title',
        'approved_by',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'image_url',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_uuid');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
