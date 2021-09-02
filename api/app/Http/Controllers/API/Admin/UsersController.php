<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

    }

    public function show(User $user){
        return response($user->toJson(),200);
    }

    public function update(User $user, Request $request){
        $user->update($request->except('name', 'email'));
        return response(json_encode(['result'=>'user updated successfully.']),200);
    }

    public function delete(User $user, Request $request){
        $user->delete();
        return response(json_encode(['result'=>'user deleted successfully.']),200);
    }
}
