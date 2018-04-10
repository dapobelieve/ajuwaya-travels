<?php

use Faker\Generator as Faker;
use App\Http\Controllers\Funcs\Hasher;

$factory->define(App\Models\Booking\Route::class, function (Faker $faker) {
    $t = mt_rand(1, 8);
    $x = mt_rand(1, 36);

    return [
        'location_id' => $x,
        'camp_id'     => $t,
        'take_off'    => $faker->realText(12),
        'price'       => $faker->numberBetween(5000, 20000),
        'bus_type'    => $faker->randomElement([15, 35]),
        'takeoff'     => $faker->dateTimeThisYear(),
        'ref'         => 'AJT-'.Hasher::getHashedToken(8)
    ];
});
