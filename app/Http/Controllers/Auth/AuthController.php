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
    public function getRegister()
    {
        return view('auth.register');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postRegister(Request $request)
    {
        // dd($request);
        // validating the data
        $this->validate($request , [
            'fname' => 'required',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ],[
            'fname.required',
            'phone.digits' => 'Phone Number must be 11 digits',
            'fname.required' => 'The first name is required',
            'lname.required' => 'The last name is required',
            'lname.string' => 'The last name must be a Word',
        ]);


        // submmiting users details to the db
        $user = User::create([
            'name'  => 'dapo',
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
}
