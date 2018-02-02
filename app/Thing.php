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
        'title',
        'approved_by',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'image_url',
        'location_url',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    
}
