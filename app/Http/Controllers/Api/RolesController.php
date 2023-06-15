<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RolesResource;
use App\Models\Role;
use Doctrine\DBAL\Query;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return RolesResource::collection($roles);
    }
    public function queries(){
        $query = Role::query();
        $roles = QueryBuilder::for($query)->allowedIncludes('user')
            ->allowedFilters('role')
            ->get();
        return RolesResource::collection($roles);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = Role::create([
           "role"=>$request->role,
        ]);
        return new RolesResource($roles);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new RolesResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
           "role"=>$request->role,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            "status"=>200,
            "Item Has been deleted!"
        ]);
    }
}
