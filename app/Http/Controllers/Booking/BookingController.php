<?php
namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule; 
use App\Models\Booking\Route;
use App\Models\Booking\Booking;
use App\Http\Controllers\Funcs\Hasher;

use App\Http\Controllers\Traits\PrintTrait;


use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    use PrintTrait;

    public function __construct()
    {
        $this->middleware('verified_user', 
            [
                'only' => ['index']
            ]
        );
    }

    public function index(Route $route)
    {
        return view('pages.main', ['route' => $route->ref ]);
    }

    public function feed(Request $request, Route $route)
    {
        if($request->ajax()){
            //get all the booking for this route
            $ids = $route->booking()->where('pay_status', 1)->pluck('seat')->toArray();


            //flattened this bloody collection
            //since i coudnt find a lara method to do it s/o alex garret
            function flater(array $arr, array $flatten = [])
            {
                foreach ($arr as $item) {

                    $item = json_decode($item, true);

                    if(is_array($item)){
                        $flatten = flater($item, $flatten);
                        continue;
                    }

                    $flatten[] = $item;            
                }

                return $flatten;
            }
            
            $seats = flater($ids, $flatten = []);


            // return details of a route and seats thats been booked
            return response()->json([
                'route' => $route,
                'seats' => $seats,
                'camp' => $route->camp->name,
                'location' => $route->location->state,
                'price'   => number_format($route->price),
            ]);
        }
        else{
            return redirect()->route('home');
        }
    }

    // Create a booking record
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'seat'  => 'required|array',
            'sex'   => 'required',
            'userId' => 'required',
        ],[
            'name.required'   => 'Please provide your full name',
            'phone.digits'    => 'Your phone number must be 11 digits',
            'phone.required'  => 'Enter your phone number',
            'email.required'  => 'The Email field is required',
            'seat.required'   => 'Please select your seat number(s)',
            'sex.required'   => 'Please select your Gender'
        ]);

        $book = Booking::create([
                    // 'user_id'  => $requestuser()->id,
                    'user_id'  => $request->userId,
                    'route_id' => $request->rid,
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'phone'    => $request->phone,
                    'gender'   => $request->sex,
                    'seat'     => json_encode($request->seat),
                    'seat_num' => count($request->seat),
                    'amount'   => $request->price,
                    'bk_ref'   => 'bk-'.Hasher::getHashedToken(10),
                ]);

        // return response()->json($request);

        return $book->bk_ref;
    }

    // Update a booking record
    public function update(Request $request)
    {
         $this->validate($request, [
            'name'  => 'required|string',
            'phone' => [
                'required',
                'digits:11',
            ],
            'email' => [
                'required',
                'email',
            ],
            'seat'  => 'required|array',
            'sex'   => 'required',
            ],[
                'name.required'   => 'Please provide your full name',
                'phone.digits'    => 'Your phone number must be 11 digits',
                'phone.required'  => 'Enter your phone number',
                'email.required'  => 'The Email field is required',
                'seat.required'   => 'Please select your seat number(s)',
                'sex.required'   => 'Please select your Gender'
            ]);

            $book = Booking::where('bk_ref', $request->bkRef)->update([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'phone'    => $request->phone,
                        'gender'   => $request->sex,
                        'seat'     => json_encode($request->seat),
                        'seat_num' => count($request->seat),
                        'amount'   => $request->price,
                    ]);

            return $request->bkRef;
    }

    public function bookFeed(Request $request, Booking $booking)
    {
        // dd($booking->exists);
        $bookR = $booking->route;

        $ids = $bookR->booking()->where('pay_status', 1)->pluck('seat')->toArray();

        function flater(array $arr, array $flatten = [])
        {
            foreach ($arr as $item) {

                $item = json_decode($item, true);

                if(is_array($item)){
                    $flatten = flater($item, $flatten);
                    continue;
                }

                $flatten[] = $item;            
            }

            return $flatten;
        }
        
        $seats = flater($ids, $flatten = []);

        if($request->ajax()){

            return response()->json([
                'details' => $booking->toArray(),
                'seats'   => $seats,
            ]);

        }else{
            return redirect()->route('home');
        }
    }

    public function confirmDetails(Request $request, Booking $booking)
    {
        $route = $booking->route;

        if($request->ajax()){
            return response()->json([
                'details'  => $booking,
                'route'    => $route,
                'camp'     => $route->camp,
                'location' => $route->location,
                'price'    => number_format($route->price),
                'tprice'    => number_format($route->price * $booking->seat_num),
            ]);

        }else{
            return redirect()->route('home');
        }
    }

    public function success(Booking $booking)
    {
        if ($this->Printer($booking)) {
            return view('pages.success')->with('book', $booking);
        }else {
            return redirect()->route('auth.signout');
        }
        
    }
}
