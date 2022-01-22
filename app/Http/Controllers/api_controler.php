<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class api_controler extends Controller
{
    public function login(Request $request){

    
    $login=$request->validate([
      
        'email'=>'required',
        
        'password'=>'required'

    ]);
  
    if(!Auth::attempt($login))    {
  
        return 'errior';
  
    }
  $token=Auth::user()->createToken('auth_topken')->accessToken;
  return response(['user'=>Auth::User(),'auth_topken'=>$token]);
  
}

}
