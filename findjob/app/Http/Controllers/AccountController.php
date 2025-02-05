<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade


class AccountController extends Controller
{
    //This method will show user registration page
    public function registration(){
        return view('front.account.registration');
    }
    //This method will save a user
    public function processRegistration(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required | string | max:255',
            'email'=>'required | email |unique:users',
            'password'=>'required | min:5 |same:confirm_password',
            'confirm_password'=>'required',
        ]);

        if($validator->passes()){

            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();

            session()->flash('success','you have registered successfully');

            return response()->json([
                'status'=>true,
                'errors'=>[]
            ]) ;
            
        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors(),
            ]);
        }
    }
    //this method will show user login page
    public function login(){
        return view('front.account.login');

    }
    public function authenticate(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->passes()){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('account.profile');
            }else{
                return redirect()->route('account.login')->with('error','Either Email/Password is incorrect');
            }

        }else{
            return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }
    public function profile(){
        return view('front.account.profile');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
    // use Illuminate\Support\Facades\Auth;

// public function profile()
// {
//     if (!Auth::check()) {
//         return redirect()->route('account.login')->with('error', 'Please log in first.');
//     }
//     return view('front.account.profile');
// }


}
