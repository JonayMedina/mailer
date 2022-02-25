<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return response()->json(['roles' => $roles]);
    }

    public function create()
    {
        //
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active
        ]);

        return response()->json(['message' => 'Role Saved', 'role' => $role], 201);
    }

    public function show(Role $role)
    {
        return response()->json(['role' => $role], 200);
    }

    public function edit(Role $role)
    {
        //
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->description = $request->description;
        $role->active = ($request->active) ?: 1;
        $role->save();

        return response()->json(['message' => 'Role updated', 'role' => $role], 201);
    }

    public function active(Role $role)
    {
        $role->active = 1;
        $role->save();
        return response()->json(['message' => 'Role Actived'], 201);
    }

    public function desactive(Role $role)
    {
        $role->active = 0;
        $role->save();
        return response()->json(['message' => 'Role Inactived'], 201);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['message' => 'Rol Deleted'], 201);
    }
}
