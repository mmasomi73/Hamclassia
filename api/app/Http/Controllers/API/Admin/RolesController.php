<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function show(User $user){
        return response($user->toJson(),200);
    }

    public function update(User $user, Request $request){
        $user->update($request->only('name', 'email'));
        return response(json_encode(['result'=>'user updated successfully.']),200);
    }

    public function delete(User $user, Request $request){
        $user->delete();
        return response(json_encode(['result'=>'user deleted successfully.']),200);
    }

    public function bulkDelete(Request $request)
    {
        User::query()->whereIn('id', $request->get('users', []))->delete();
        return response(json_encode(['result'=>'users deleted successfully.']),200);
    }
}
