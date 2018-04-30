<?php

namespace App\Http\Controllers\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking\Route;

class RouteController extends Controller
{
    public function show(Route $route)
    {
        return view('pages.details')->with('route', $route);
    }
}
