<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use App\Models\ROLES;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function loginUser(Request $request){
        $validateUser = Validator::make($request->all(),
            [
                "email"=>"required|email",
                "password"=>'required',
                'name'=>'required'
            ]);
        if($validateUser->fails()){
            return response()->json([
                "errors"=>$validateUser->errors()
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if(empty($user)){
            return response()->json([
                "Wrong Email"
            ]);
        }
        else if ( Hash::check($request->password, $user->password) && $request->email === $user->email){
            //Generate me the token
            return response()->json([
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'Message' => "Sucessfull login",
                "Status"=>200
            ]);
        }
        else{
            //Wrong password
            return response()->json([
                'Wrong Password'
            ]);
        }
    }
    //this is only if the user has the role ADMIN.

    public function registerUser(Request $request){
        $validateUser = Validator::make($request->all(),
            [
                "email"=>"required|email",
                "password"=>"required",
                "name"=>"required"
            ]);
        if($validateUser->fails()){
            return response()->json([
                "errors"=>$validateUser->errors()
            ]);
        }

        $user=User::create([
            //creating the user
            "name"=>$request->name,
            "password"=>$request->password,
            "email"=>$request->email
        ]);
        return response()->json([
            'token'=>$user->createToken("API TOKEN")->plainTextToken,
            'Message'=>"User Created",
            'status'=>200
        ]);
    }

    //Only Admin can do this.
//    public function authenticateAdmin(AuthenticationRequest $request, User $user){
//        //How do i change the role_id to =1?
//        if($user->role_id==1){
//            return response()->json([
//                "id"=>$request->id,
//                "The account is already a admin."
//            ]);
//        }
//        else{
//            $user->update(['role_id'=>ROLES::ADMIN->value]);
//            return response()->json([
//                "Updated To Admin"
//            ]);
//        }
//
//    }
//    public function authenticateModerator(AuthenticationRequest $request, User $user)
//    {
//        //How do i change the role_id to =1?
//        if($user->role_id==3){
//            return response()->json([
//                "The account is already a moderator",
//                "status"=>401,
//            ]);
//        }
//        else{
//            $user->update(['role_id' => ROLES::MODERATOR->value]);
//            return response()->json([
//                "Updated to moderator!"
//            ]);
//        }
//    }
//
//    public function authenticateUser(AuthenticationRequest $request, User $user)
//    {
//        //How do i change the role_id to =1?
//        if($user->role_id==2){
//            return response()->json([
//                "The account is already a user",
//                "status"=>401
//            ]);
//        }
//        else{
//            $user->update(['role_id' => ROLES::USER->value]);
//            return response()->json([
//                "Updated to user"
//            ]);
//        }
//
//    }

}
