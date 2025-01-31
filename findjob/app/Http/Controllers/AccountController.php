<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    //This method will show user registation page
    public function registration(){
        return view('front.account.registration');
    }
    //This method will save a user
    public function processRegistration(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required | email',
            'password'=>'required | min:5 |same:confirm_password',
            'confirm_password'=>'required',
        ]);
        if($validator->passes()){
            
        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors(),
            ]);
        }
    }
    //this method will show user login page
    public function login(){

    }

}
