<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Booking\Route;
use App\Models\Booking\Location;
use App\Models\Booking\Camp;


class HomeController extends Controller
{
    public function index()
    {
        // dd(config('paystack.secretKey'));
        // get all locations and camps
        $locs = Location::all();
        $routes = Route::with('camp', 'location')->latest()->limit(5)->get(); //eager loading
        $camps = Camp::orderBy('name', 'asc')->get();

        // dd($routes);

        return view('pages.home')
            ->with('locations', $locs)
            ->with('routes', $routes)
            ->with('camps', $camps);
    }

    public function results(Request $request)
    {
        $routes = Route::where([
            ['location_id', $request->location],
            ['camp_id',     $request->camp]
        ])->get();

        // dd($routes);
        return view('pages.search')->with('routes', $routes);
    }


}
