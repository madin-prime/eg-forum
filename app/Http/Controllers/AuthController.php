<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username'=> 'required|unique:users',
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
         ]);

         $validator->setCustomMessages([
            'username.unique' => 'A user with that username already exists!',
            'email.unique' => 'A user with that email already exists!'
          ]);

         if($validator->fails()){
            return $validator->errors()->all();
         }

         User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'username'=> $request->username,
         ]);

         return redirect()->route('login');
    }

    public function login(Request $request){
      $auth = auth()->attempt($request->only('password','email'));

      if($auth){
         return redirect()->route('home');
      }

      else{
         return 'Wrong User';
      }
    }

    public function logout(){
      auth()->logout();

      return redirect()->route('login');

    }

    public function deleteAccount(Request $request){

      $user = $request->user();
      $user->delete();


      return redirect()->route('login');
    }
}
