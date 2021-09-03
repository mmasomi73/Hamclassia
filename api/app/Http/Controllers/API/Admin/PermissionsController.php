<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::query();
        if ($request->has('name')){
            $permissions->where('name', 'LIKE',"%{$request->get('name')}%");
        }
        $permissions = $permissions->get();
        return response($permissions->toJson(),200);
    }
}
