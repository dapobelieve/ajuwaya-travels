<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Booking\Route;
use App\Http\Requests\RouteRequest;

use App\Models\Booking\Location;
use App\Models\Booking\Camp;
use App\Http\Controllers\Funcs\Hasher;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::with('camp', 'location')->latest()->get();
        return view('admin.route.list')->with('routes', $routes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locs = Location::all();
        $camps = Camp::orderBy('name', 'asc')->get();
        $routeRef = 'AJT-'.Hasher::getHashedToken(8);
        return view('admin.route.add')
                        ->with('locations', $locs)
                        ->with('ref', $routeRef)
                        ->with('camps', $camps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {
        // dd($request);
        Route::firstOrCreate([
            'location_id' => $request->state,
            'camp_id'     => $request->camp,
            'take_off'    => $request->location,
            'price'       => $request->price,
            'bus_type'    => $request->seater,
            'takeoff'     => $request->date.':00',
            'ref'         => $request->ref,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
