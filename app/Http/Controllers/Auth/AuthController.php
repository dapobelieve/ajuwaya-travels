<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Token;
use App\Events\UserRegistered;
use App\Http\Controllers\Funcs\Slug;
use App\Http\Controllers\Funcs\Hasher;

use Auth;
use Hash;


class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('verified_user');
    }


    public function getRegister()
    {
        return view('auth.register');
    }

    public function getLogin(Request $request)
    {
        $preUrl = \Session::get('_previous');
        $request->session()->put('urler', $preUrl);

        return view('auth.login');
    }

    public function postRegister(Request $request)
    {
        // dd($request);
        // validating the data
        $this->validate($request , [
            'fname' => 'required|string',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ],[
            'fname.required' => 'Full Name field is required',
        ]);


        // submmiting users details to the db
        $user = User::create([
            'name'  => $request->input('fname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->token()->create([
            'token' => str_random(100), 
        ]);

        // email user for verification
        event(new UserRegistered($user));

        return redirect()->route('home')
                ->with('title', 'Congratulations')
                 ->with('success', 'You account has been created. Check your mail to complete your registration.');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        if(!Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ],$request->has('remember'))){
            
            return redirect()->back()->with('authMsg','Could not sign you in. Invalid Details');
        }
        // dd("what is this e");
        return redirect($request->session()->get('urler')['url']);
    }

    public function getSignout()
    {
        Auth::logout();
         return redirect()->route('home');
    }
}
