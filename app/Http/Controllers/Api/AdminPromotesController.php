<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPromotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * ADMIN:: DEMOTING (ADMIN)
     */
   public function DemotingAdminToUser(AdminRequest $request, User $user){
       if($user->role_id==1){
           $user->update(['role_id'=>2]);
           return response()->json([
              "Demoted Admin To User!"
           ]);
       }
       else if($user->role_id==2){
           return response()->json([
               "The Account is already a user!"
           ]);
       }
       else if($user->role_id==3){
           return response()->json([
               'The Account is moderator. You can demote only users!'
           ]);
       }
   }

   public function DemotingAdminToModerator(AdminRequest $request , User $user){
       if($user->role_id==1){
           $user->update(['role_id'=>3]);
           return response()->json([
              'The Account is demoted to moderator.'
           ]);
       }
       else if($user->role_id==2){
           return response()->json([
              'The Account is user!'
           ]);
       }
       else if($user->role_id==3){
           return response()->json([
              "The Account is Moderator"
           ]);
       }
   }

    /**
     * ADMIN DEMOTING (MODERATOR)
     */
    //Admin can demote Admins->Moderators, Admins->Users, Moderators->Users

    public function DemotingModeratorsToUsers(AdminRequest $request,  User $user){
        if($user->role_id==3){
            $user->update(['role_id'=>2]);
            return response()->json([
                "Downgraded Moderator to User"
            ]);
        }
        else if($user->role_id==2){
            return response()->json([
               "Account is a user "
            ]);
        }
    }

    /**
     * ADMIN PROMOTING (USERS)
     */
   public function PromotingUserToModerator(AdminRequest $request , User $user){
       if($user->role_id==1){
           return response()->json([
              "message"=>"Account is an admin"
           ]);
       }
       else if($user->role_id==2){
           $user->update([
            'role_id'=>3
           ]);
           return response()->json([
               "message"=>"Account updated to Moderator"
           ]);

       }
       else if($user->role_id==3){
           return response()->json([
              'message'=>'User is already a Moderator'
           ]);
       }
   }
   public function PromotingUserToAdmin(AdminRequest $request , User $user){
       if($user->role_id==2){
           $user->update(['role_id'=>1]);
           return response()->json([
            'message'=>"User Promoted To Admin"
           ]);
       }
       else if($user->role_id==1){
           return response()->json([
              'message'=>"User is already admin!"
           ]);
       }
       else if($user->role_id==3){
           return response()->json([
               'message'=>"User is Moderator"
           ]);
       }
   }
    /**
     * ADMIN PROMOTING (MODERATOR)
     */
   public function PromotingModeratorToAdmin(AdminRequest $request , User $user){
       if($user->role_id==3){
           $user->update(['role_id'=>1]);
           return response()->json([
               'message'=>'Moderator Promoted To Admin!'
           ]);
       }
       else if($user->role_id==1){
         return response()->json([
            'message'=>'The Acount is already an Admin!'
         ]);
       }
       else if($user->role_id==2){
           return response()->json([
              'Message'=>'The Account is an User. You can upgrade a moderator to admin!'
           ]);
       }
   }

}
