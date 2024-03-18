<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
         ]);

         if($validator->fails()){
            return 'Error';
         }
         
         User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
         ]);

         return view('pages.auth.login');
    }

    public function login(Request $request){
      $auth = auth()->attempt($request->only('password','email'));

      if($auth){
         return redirect()->to('home');
      }

      else{
         return 'Wrong User';
      }
    }
}
