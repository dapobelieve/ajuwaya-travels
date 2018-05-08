<?php

namespace App\Http\Controllers\Forgot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Mail;
use App\Models\User;
use App\Http\Controllers\Funcs\Hasher;
use App\Mail\ForgotMail;
use Hash;


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

            $userCode = $userEmail->token ?: $this->codeGen($userEmail->id);

            Mail::to($userEmail->email)->send(new ForgotMail($userEmail));

            return redirect()->back()->with('message', 'A mail has been sent to your email address.');
        }

    }

    public function reset($mail, $code)
    {
        $user = User::where('email', $mail)->first();

        if($user == null){
            abort(404);
        }else{
            if($user->token == $code){
                return view('auth.reset')->with('email', $mail);
            }else{
                abort(404);
            }
        }
    }

    private function updateUserPassword($email, $password)
    {
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($password);
        $user->save();
        return true;
    }

    public function postResetPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10'
        ],[
            'password.confirmed' => 'The Passwords dont match',
            'password_confirmation.max'   => 'Password must not be more than 10 characters'
        ]);

        $user = User::where('email', $request->usermail)->first();
        // dd($user);


        if($user == null){
            abort(404);
        }else{
            if($this->updateUserPassword($request->usermail, $request->password));
                return redirect()->route('auth.login')->with('authMsg', 'Password Changed. ');
        }
    }
}
