<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Models\Booking\Route;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('verified_user', ['only' => [
        //     'index',
        // ]]);
    }

    public function index(Route $route)
    {
        $model = $route->ref;
        return view('pages.main', ['model' => $model ]);
    }

    public function feed(Request $route)
    {
        dd($route);
    }

    public function save(Request $request)
    {
        dd($request);
    }
}
