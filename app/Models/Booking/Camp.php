<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

use App\Models\Booking\Camp;

class Camp extends Model
{
    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    public function toUp()
    {
        return ucwords($this->name);
    }

    public function firstLetter()
    {
        return ucwords($this->name[0]);;
    }

    protected $fillable = [
        'name',
        'details',
    ];
}
