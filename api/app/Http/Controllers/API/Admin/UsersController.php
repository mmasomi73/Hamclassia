<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()->select(['id', 'name', 'family', 'email', 'mobile']);
        if ($request->has('name')) {
            $users->where('name', 'LIKE', "%{$request->get('name')}%");
        }
        if ($request->has('family')) {
            $users->where('family', 'LIKE', "%{$request->get('family')}%");
        }
        if ($request->has('email')) {
            $users->where('email', 'LIKE', "%{$request->get('email')}%");
        }
        if ($request->has('mobile')) {
            $users->where('mobile', 'LIKE', "%{$request->get('mobile')}%");
        }
        if ($request->has('sort_by')) {
            if ($request->get('sort_type', '') == 'asc') {
                $users->orderByDesc($request->get('sort_by'));
            } else {
                $users->orderBy($request->get('sort_by'));
            }
        }
        $users = $users->with('roles')->paginate(14);
        $collection = collect([]);
        foreach ($users as $user) {
            $collection->push([
                'id' => $user->id,
                'name' => $user->name,
                'family' => $user->family,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'roles' => $user->roles,
                'avatar' => $user->getFirstMediaUrl('avatar'),
            ]);
        }

        $paginate = collect([
            'total' => $users->total(),
            'per_page' => $users->perPage(),
            'current' => $users->currentPage(),
            'last_page' => $users->lastPage(),
            'from' => $users->firstItem(),
            'to' => $users->lastItem()
        ]);

        $response = collect([
            'pagination'=>$paginate,
            'data'=>$collection,
        ]);

        return response($response->toJson(), 200);
    }

    public function store(Request $request)
    {
        $password = Str::random(8);
        $user = User::create([
            'name' => $request->get('name'),
            'family' => $request->get('family'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'password' => bcrypt($password),
        ]);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return response(json_encode(['result' => 'user created successfully.', 'password' => $password]), 200);
    }

    public function show(User $user)
    {
        $user->load('roles.permissions', 'permissions');
        $collection = collect((object)[
            'id' => $user->id,
            'name' => $user->name,
            'family' => $user->family,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'roles' => $user->roles,
            'permissions' => $user->permissions,
            'avatar' => $user->getFirstMediaUrl('avatar'),
        ]);
        return response($collection->toJson(), 200);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'family', 'email', 'mobile'));
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return response(json_encode(['result' => 'user updated successfully.']), 200);
    }

    public function delete(User $user, Request $request)
    {
        $user->delete();
        return response(json_encode(['result' => 'user deleted successfully.']), 200);
    }

    public function bulkDelete(Request $request)
    {
        User::query()->whereIn('id', $request->get('users', []))->delete();
        return response(json_encode(['result' => 'users deleted successfully.']), 200);
    }

    public function updateRoles(User $user, Request $request)
    {
        $roles = Role::query()->select('name')->whereIn('id', $request->get('roles'))->get()->pluck('name');
        $user->syncRoles($roles);
        return response(json_encode(['result' => 'user Roles Updated successfully.']), 200);
    }

}
