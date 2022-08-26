<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ForgotPasswordController extends Controller
{
    public function showForgotPassword(){
        return view('forgotPassword');
    }
    public function submitForgotPasswordForm(Request $request){
        // return $request;
        $request->validate([
            'email'=>'required|email|exists:users'
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->input('email'),
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);

        Mail::send('email.forgotPassword', ['token'=>$token], function ($message) use($request){
            $message->to($request->input('email'));
            $message->subject('Reset Password');
        });
        return back()->with('message','we have emailed you reset password link');
    }


    public function showResetPasswordForm($token){
        return view('forgotPasswordLink',['token'=>$token]);
    }
    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);
        $password_reset_request=DB::table('password_resets')
        ->where('email',$request->input('email'))
        ->where('token',$request->token)
        ->first();

        if(!$password_reset_request){
            return back()->with('error','Invaild Token');
        }
        User::where('email',$request->input('email'))
        ->update(['password'=>Hash::make($request->input('password'))]);

        DB::table('password_resets')
        ->where('email',$request->input('email'))
        ->delete();

        return redirect('/login')->with('message','Your password has been changed');
    }
}
