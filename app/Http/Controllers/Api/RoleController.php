<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //1 If the user is admin then he can do this. ( Adding roles, deleting roles, promoting roles.)
    public function index(AdminRequest $request)
    {
        $roles = Role::all();
        return AdminResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        if($this->user()->role_id==1){

            $roles = Role::create([
                'role'=>$request->role
            ]);
            return new AdminResource($roles);
        }
        else{
            return response()->json([
                "You can't Create Roles"
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(AdminRequest $role)
    {
        return new AdminResource($role);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Role $role)
    {
        $role->update([
            'role'=>$request->role
        ]);
        return new AdminResource($role);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminRequest $role)
    {
        $role->delete();
        return response()->json([
           'Role Deleted'
        ]);
    }
}
