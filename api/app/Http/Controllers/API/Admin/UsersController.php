<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()->select(['id','name','email']);
        if ($request->has('name')){
            $users->where('name', 'LIKE',"%{$request->get('name')}%");
        }
        if ($request->has('email')){
            $users->where('email', 'LIKE',"%{$request->get('email')}%");
        }
        $users = $users->get();
        return response($users->toJson(),200);
    }

    public function store(Request $request){
        $password = Str::random(8);
        User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($password),
        ]);
        return response(json_encode(['result'=>'user created successfully.', 'password'=>$password]),200);
    }

    public function show(User $user){
        return response($user->load('roles.permissions', 'permissions')->toJson(),200);
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

    public function updateRoles(User $user, Request $request)
    {
        $roles = Role::query()->select('name')->whereIn('id', $request->get('roles'))->get()->pluck('name');
        $user->syncRoles($roles);
        return response(json_encode(['result'=>'user Roles Updated successfully.']),200);
    }

}
