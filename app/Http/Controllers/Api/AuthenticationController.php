<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
   //2 Functions , Register and login

    public function register(Request $request){
        //We need to retrieve the validator to make sure that users are registering as they are suppose to.

        $userValidator = Validator::make($request->all(),[
            'name'=>'required|max:10',
            'email'=>'required|max:30|email',
//            TODO : get password validation ( characters, letters, numbers etc.)
            'password'=>'required'
        ]);
        if($userValidator->fails()){
            return response()->json([
               'error'=>$userValidator->errors()
            ]);
        }
        $user = User::create([
//           creating the user
        'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return response()->json([
           //User has been created.
            "message"=>'User Created Successfuly',
            "token" =>$user->createToken("API TOKEN")->plainTextToken
        ]);

    }
    public function login (Request $request){
        // check the user credentials

        $user= User::where('email', $request->email)->first();
        if(empty($user)){
            return response()->json([
               'Message'=>"Wrong Email"
            ]);
        }
        else if( Hash::check($request->password, $user->password) && $user->email ===$request->email){
            //We want to get the token here
            return response()->json([
                'message'=>'Login Success',
                'token'=>$user->createToken('API TOKEN')->plainTextToken,
                'status'=>200
            ]);
        }
        else{
            return response()->json([
               "message"=>'Wrong Password'
            ]);
        }
    }

}
