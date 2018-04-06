<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function books()
    {
        return $this->hasMany(Booking::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function camp()
    {
        return $this->belongsTo(Camp::class);
    }

    public function getRouteKeyName()
    {
        return 'ref';
    }

    public function takeoff()
    {
        return strtolower($this->take_off);
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
