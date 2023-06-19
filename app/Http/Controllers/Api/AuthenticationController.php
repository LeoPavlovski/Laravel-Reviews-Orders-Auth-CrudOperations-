<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request ){
        $userAuth =Validator::make($request->all(),[
            'name'=>'required|string|max:10',
            'password'=>'required',
            'email'=>'required|unique:users,email',
            'phone'=>'required|string',
            'role_id'=>'required|integer'
        ]);
        if($userAuth->fails()){
            return response()->json([
               'errors'=>$userAuth->errors(),
            ]);
        }
        else if($userAuth->passes()){
            //create it
            $user = User::create([
                'name'=>$request->name,
                'password'=>$request->password,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'role_id'=>$request->role_id,
            ]);
            return response()->json([
                'message'=>'User Created!',
                "token" =>$user->createToken("API TOKEN")->plainTextToken
            ]);
        }
    }
    public function login(Request $request){
        $userAuth =Validator::make($request->all(),[
           'email'=>'required',
           'password'=>'required'
        ]);

        if($userAuth->fails()){
            return response()->json([
                'errors'=>$userAuth->errors()
            ]);
        }
        $user = User::where('email', $request->email)->first();

        if(empty($user)) {
            return response()->json([
               'message'=>'wrong email'
            ]);
        }
        if(Hash::check($request->password,$user->password) && ($user->email===$request->email)){
            //This is correct
            return response()->json([
               'id'=>$user->id,
               'Message'=>"Logged in!",
               'token'=>$user->createToken('API TOKEN')->plainTextToken
            ]);
        }
        else{
            return response()->json([
               //Wrong password
                'message'=>'Wrong Password'
            ]);
        }

  }

}
