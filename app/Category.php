<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'thing_id'
    ];

    public function things()
    {
        return $this->belongsToMany('App\Thing');
    }
}
