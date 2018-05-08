<?php

namespace App\Http\Controllers\Forgot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Mail;
use App\Models\User;
use App\Http\Controllers\Funcs\Hasher;
use App\Mail\ForgotMail;


class ForgotController extends Controller
{
    private function codeGen($userId)
    {
        $dUser = User::find($userId);
        $val = Hasher::getHashedToken(25);
        $dUser->token = $val;
        $dUser->save();     
        return $dUser->reset;
    }


    public function index()
    {
        return view('auth.forgot');
    }

    public function process(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'

        ],[
            'email.required' => 'Enter your email address'
        ]);

        $userEmail = User::where('email', $request->email)->first();

        // dd($userEmail);

        if($userEmail == null){

            return redirect()->back()->with('message', 'A mail has been sent to your email address.');

        }else {

            $userCode = $userEmail->reset ?: $this->codeGen($userEmail->id);

            Mail::to($userEmail->email)->send(new ForgotMail($userEmail));

            return redirect()->back()->with('message', 'A mail has been sent to your email address.');
        }

    }

    public function reset($mail, $code)
    {
        
    }
}
