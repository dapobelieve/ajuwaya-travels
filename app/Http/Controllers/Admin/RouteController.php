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
        $routes = Route::latest()->with('camp', 'location')->latest()->paginate(10);
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
     * Mass delete records
     * @param $request containing all ids 
     */

    public function deleteAll(Request $request)
    {
        $this->validate($request, [
            'ids' => 'required'
        ],
        [
            'ids.required' => 'No record selected',
        ]);


        $routes = explode(',', $request->ids);
        foreach($routes as $route_id){
            $route = Route::findOrFail($route_id);
            $route->delete();
        }

        return redirect()->route('routes.index')->with('sms', 'Route Deleted Successfully.');
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

        return redirect()->route('routes.index')->with('sms', 'Route Added Successfully.');
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
        $locs  = Location::all();
        $camps = Camp::orderBy('name', 'asc')->get();
        $data  = Route::findOrFail($id);
        return view('admin.route.edit')->with('route', $data)
                                        ->with('locations', $locs)
                                        ->with('camps', $camps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RouteRequest $request, $id)
    {
        $route = Route::findOrFail($id);
        $route->update([
            'location_id' => $request->state,
            'camp_id'     => $request->camp,
            'take_off'    => $request->take_off,
            'price'       => $request->price,
            'bus_type'    => $request->seater,
            'takeoff'     => $request->date.':00',
        ]);

        return redirect()->route('routes.index')->with('sms', 'Route Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();
        return redirect()->route('routes.index')->with('sms', 'Route Deleted Successfully.');
    }

    public function getBookings(Route $route)
    {
        $bookings = $route->booking()->get() ;

        return view('admin.route.bookings')->with('route', $route)
                                        ->with('bookings', $bookings);
    }
}
