<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Thing;
use App\Models\User;

class Address extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "uuid",
        "street_number",
        "route",
        "postal_code",
        "longitude",
        "lattitude",
        "country",
        "address_json",
        "contact_number",
        "user_uuid",
        "thing_uuid"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thing()
    {
        return $this->belongsTo(Thing::class);
    }
}
