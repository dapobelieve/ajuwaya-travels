<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Models\Booking\Route;
use App\Models\Booking\Booking;
use App\Http\Controllers\Funcs\Hasher;

use Auth;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    private $userId;


    public function __construct()
    {
        $this->middleware('verified_user', ['only' => [
            'index',
        ]]);

    }

    private function setUserId()
    {
        $this->userId = Auth::user()->id;
    }

    public function index(Route $route)
    {
        $this->setUserId();
        $model = $route->ref;
        return view('pages.main', ['model' => $model ]);
    }

    public function feed(Request $request, Route $route)
    {
        if($request->ajax())
            return $route->toJson();
        else
            return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string',
            'phone' => 'required|unique:bookings|digits:11',
            'email' => 'required|unique:bookings|email',
            'seat'  => 'required|array',
            // ''
        ],[
            'name.required'   => 'Please provide your full name',
            'phone.digits'    => 'Your phone number must be 11 digits',
            'phone.required'  => 'Enter your phone number',
            'email.required'  => 'The Email field is required',
            'email.unique'    => 'That email address has already been taken',
            'seat.required'   => 'Please select your seat number(s)'
        ]);

        $book = Booking::create([
                    // 'user_id'  => $requestuser()->id,
                    'user_id'  => 1,
                    'route_id' => $request->rid,
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'phone'    => $request->phone,
                    'gender'   => $request->sex,
                    'seat'     => json_encode($request->seat),
                    'seat_num' => count($request->seat),
                    'bk_ref'   => 'bk-'.Hasher::getHashedToken(10),
                ]);
        return "$book->bk_ref";
    }
}
