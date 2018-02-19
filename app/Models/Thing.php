<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\IdentifiesUsingUuidsTrait;

class Thing extends Model
{
    use IdentifiesUsingUuidsTrait;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

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
        'location_url',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
}
