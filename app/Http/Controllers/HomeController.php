<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking\Booking;
use App\Models\Booking\Route;
use App\Models\Booking\Location;
use App\Models\Booking\Camp;

use App\Http\Controllers\Traits\PrintTrait;


class HomeController extends Controller
{
    use PrintTrait;


    public function index()
    {
        // get all locations and camps
        $locs = Location::all();
        $routes = Route::with('camp', 'location')->where('active', 1)->latest()->limit(5)->get(); //eager loading
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

    public function routes()
    {
        $routes = Route::with('camp', 'location')->where('active', 1)->latest()->get();
        return view('pages.routes')->with('routes', $routes);
    }

    public function print(Booking $bookRef)
    {
        // dd($bookRef);
        return $this->Printer($bookRef) ? view('pages.success')->with('book', $bookRef) 
                                                                ->with('noprint', true)
        : redirect()->route('auth.signout');
    }

    public function faq()
    {
        return view('pages.faq');
    }

}
