<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;

class AuthenticationControllerUser extends Controller
{
    //Users are not going to have any privileges.

    public function authenticateUser(User $user){
        if($user->role_id==2){
            return response()->json([
               'This account is already an user!'
            ]);
        }
        else if($user->role_id==3){
            return response()->json([
               'This account is a moderator. Users cant modify moderators'
            ]);
        }
        else if($user->role_id==1){
            return response()->json([
               'This account is a admin. Users cant modify admins'
            ]);
        }
    }

    public function authenticateAdmin(User $user){
        if($user->role_id==2){
            return response()->json([
               "Already a user!"
            ]);
        }
        else if ($user->role_id==1){
            return response()->json([
                'This account is a admin. Users cant modify admins'
            ]);
        }
        else if($user->role_id==3){
            return response()->json([
                'This account is a moderator. Users cant modify moderators'
            ]);
        }
    }

}
