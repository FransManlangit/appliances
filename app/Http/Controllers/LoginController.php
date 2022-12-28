<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;
// use Session;
use View;

class LoginController extends Controller
{
    public function index(){
        return View::make('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:3'
        ]);
    if(auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('token')->plainTextToken;

            if (auth()->user()->role === 'employee') {
                return response()->json(['access_token' => $token]);
            } else if (auth()->user()->role === 'admin'){
                return response()->json(['access_token' => $token]);
            }
    else {
        return response()->json(['access_token' => $token]);
            }
        }
        else{
           
            return response()->json(['error' => 'Email-Address And Password Are Wrong.']);
        }
     }
    public function logout(){
        Auth::logout();
        return response()->json(['success' => 'Succesfully Logout']);
 
    }
}


