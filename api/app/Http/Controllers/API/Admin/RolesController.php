<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::query();
        if ($request->has('name')){
            $roles->where('name', 'LIKE',"%{$request->get('name')}%");
        }
        $roles = $roles->get();
        return response($roles->toJson(),200);
    }

    public function store(Request $request){
        Role::create([
            'name'=>$request->get('name'),
        ]);
        return response(json_encode(['result'=>'role created successfully.']),200);
    }

    public function show(Role $role){
        return response($role->toJson(),200);
    }

    public function permissions(Role $role)
    {
        return response($role->permissions->toJson(),200);
    }

    public function update(Role $role, Request $request){
        $role->update($request->only('name', 'guard_name'));
        return response(json_encode(['result'=>'Role updated successfully.']),200);
    }

    public function updatePermissions(Role $role, Request $request)
    {
        $role->syncPermissions(Permission::query()->whereIn('id',$request->get('permissions'))->get());
        return response(json_encode(['result'=>'Permissions of Role updated successfully.']),200);
    }
}
