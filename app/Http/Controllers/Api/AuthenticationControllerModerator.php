<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationControllerModeratorRequest;
use App\Models\ROLES;
use App\Models\user;
use Illuminate\Http\Request;

class AuthenticationControllerModerator extends Controller
{
 // moderator -> user
    //moderator -> admin
        //moderator ->moderator

    public function authenticateUser (AuthenticationControllerModeratorRequest $request , User $user ){
        if($user->role_id==1){
            return response()->json([
                "The account is a Admin. The moderator can only give permission to users."
            ]);
        }
        else if($user->role_id==2){
            $user->update([$user->role_id=>3]);
            return response()->json([
                "Promoted To moderator!"
            ]);
        }
        else if ($user->role_id==3){
            return response()->json([
                "The account is already a moderator"
            ]);
        }
    }
    public function authenticateAdmin (AuthenticationControllerModeratorRequest $request , User $user ){

        if($user->role_id==1){
            return response()->json([
               "The account is a Admin The moderator can only give permission to users."
            ]);
        }
        else if($user->role_id==2){
            $user->update([$user->role_id=>3]);
            return response()->json([
              "Promoted To moderator!"
            ]);
        }
        else if ($user->role_id==3){
            return response()->json([
               "The account is already a moderator"
            ]);
        }
    }
    public function authenticateModerator(AuthenticationControllerModeratorRequest $request , User $user){
        if($user->role_id==1){
            return response()->json([
                "The account is a Admin The moderator can only give permission to users."
            ]);
        }
        else if($user->role_id==2){
            $user->update(['role_id'=>ROLES::MODERATOR->value]);
            return response()->json([
                "Promoted To moderator!"
            ]);
        }
        else if ($user->role_id==3){
            return response()->json([
                "The account is already a moderator"
            ]);
        }
    }
}
