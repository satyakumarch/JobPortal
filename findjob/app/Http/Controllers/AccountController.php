<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //This method will show user registation page
    public function registration(){
        return view('front.account.registration');

    }
    //this method will show user login page
    public function login(){

    }

}
