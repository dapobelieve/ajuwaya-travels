<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function books()
    {
        return $this->hasMany(Booking::class);
    }

    protected $fillable = [
        'location_id',
        'camp_id',
        'take_off',
        'price',
        'bus_type',
        'takeoff',
        'ref',
    ];
}
