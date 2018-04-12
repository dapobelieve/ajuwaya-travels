<?php
namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule; 
use App\Models\Booking\Route;
use App\Models\Booking\Booking;
use App\Http\Controllers\Funcs\Hasher;

use Auth;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{


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
        if($request->ajax()){
            //get all the booking for this route
            $ids = $route->booking()->pluck('seat')->toArray();

            //flattened this bloody collection
            //since i coudnt find a lara method to do it
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
            ]);
        }
        else{
            return redirect()->route('home');
        }
    }

    // Create a booking record
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name'  => 'required|string',
        //     'phone' => 'required|unique:bookings|digits:11',
        //     'email' => 'required|unique:bookings|email',
        //     'seat'  => 'required|array',
        //     'sex'   => 'required',
        //     'userId' => 'required',
        // ],[
        //     'name.required'   => 'Please provide your full name',
        //     'phone.digits'    => 'Your phone number must be 11 digits',
        //     'phone.unique'    => 'That phone number has already been used',
        //     'phone.required'  => 'Enter your phone number',
        //     'email.required'  => 'The Email field is required',
        //     'email.unique'    => 'That email address has already been taken',
        //     'seat.required'   => 'Please select your seat number(s)',
        //     'sex.required'   => 'Please select your Gender'
        // ]);

        $book = Booking::create([
                    // 'user_id'  => $requestuser()->id,
                    'user_id'  => $request->userId,
                    'route_id' => $request->rid,
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'phone'    => $request->phone,
                    'gender'   => $request->sex,
                    // 'seat'     => json_encode($request->seat),
                    // 'seat_num' => count($request->seat),
                    // 'pay_status' => 0,
                    'bk_ref'   => 'bk-'.Hasher::getHashedToken(10),
                ]);

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
                Rule::unique('bookings')->ignore($request->bkId),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('bookings')->ignore($request->bkId)
            ],
            'seat'  => 'required|array',
            'sex'   => 'required',
            ],[
                'name.required'   => 'Please provide your full name',
                'phone.digits'    => 'Your phone number must be 11 digits',
                'phone.unique'    => 'That phone number has already been used',
                'phone.required'  => 'Enter your phone number',
                'email.required'  => 'The Email field is required',
                'email.unique'    => 'That email address has already been taken',
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

        $ids = $bookR->booking()->pluck('seat')->toArray();

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
}
