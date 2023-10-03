<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function login(Request $request)
        {
            if(Auth::user()){
                return response()->json(['error' => 'شما کاربر لاگین می باشید ']);
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                Auth::login($user = User::Where(['email' => $request->email])->first());
                // Authentication passed
                return response()->json(['success' => 'شما وارد شدید','user' => $user]);
            }
        
            // Authentication failed
            return response()->json(['error' => 'اطلاعات ورود صحیح نمی باشد']);

        }
}
