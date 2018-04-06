<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking\Location;
use App\Models\Booking\Camp;
use App\Models\Booking\Route;

class HomeController extends Controller
{
    public function index()
    {
        // get all locations and camps
        $locs = Location::all();
        $routes = Route::all();
        $camps = Camp::orderBy('name', 'asc')->get();

        return view('pages.home')
            ->with('locations', $locs)
            ->with('routes', $routes)
            ->with('camps', $camps);
    }

    public function results(Request $request)
    {
        // select all routes where params match
        // $route = Route::where(
        //     [
        //         [],
        //         []
        //     ]);

        $routes = Route::all();
        return view()->back()->with('routes', $routes);
    }


}
