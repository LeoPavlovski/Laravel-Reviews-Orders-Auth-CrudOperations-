<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModeratorRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    /**
     * WHEN MODERATOR PROMOTES
     */

    public function PromoteUserToModerator(ModeratorRequest $request ,User $user){
        if($user->role_id==2){
            $user->update([
               'role_id'=>3
            ]);
            return response()->json([
               'message'=>'Promoted Moderator'
            ]);
        }
        else if($user->role_id==1){
            return response()->json([
               'message'=>'Moderators cant promote users to Moderatos'
            ]);
        }
        else if($user->role_id==3){
            return response()->json([
               'message'=>'Account is already a moderator'
            ]);
        }
    }

    /**
     * WHEN MODERATOR DEMOTES
     */

public function DemotingModeratorToUser(ModeratorRequest $request ,User $user){
    if($user->role_id==3){
        $user->update([
            'role_id'=>2
        ]);
        return response()->json([
            'message'=>'Demoted To User'
        ]);
    }
    else if($user->role_id==1){
        return response()->json([
            'message'=>'Moderators cant promote users to Moderatos'
        ]);
    }
    else if($user->role_id==2){
        return response()->json([
            'message'=>'Account is already a User'
        ]);
    }
}

}
