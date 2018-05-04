<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $casts = [
        'pay_status' => 'boolean',
    ];

    protected $appends = ['payMode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public $fillable = [
        'user_id',
        'route_id',
        'name',
        'email',
        'gender',
        'phone',
        'seat',
        'bk_ref',
        'seat_num',
        'pay_status',
        'amount',
    ];

    public function getPay()
    {
        if($this->pay_status == 1)
            return 'Paid';
        else
            return 'Not Paid';
    }

    public function getRouteKeyName()
    {
        return 'bk_ref';
    }
}
