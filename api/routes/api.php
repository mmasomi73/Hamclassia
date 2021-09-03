<?php

use App\Http\Controllers\API\Admin\PermissionsController;
use App\Http\Controllers\API\Admin\RolesController;
use App\Http\Controllers\API\Admin\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->name('users.')->group(function (){
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::POST('/', [UsersController::class, 'store'])->name('store');
    Route::delete('/bulk', [UsersController::class, 'bulkDelete'])->name('bulk.delete');
    Route::get('/{user}', [UsersController::class, 'show'])->name('show');
    Route::put('/{user}', [UsersController::class, 'update'])->name('update');
    Route::delete('/{user}', [UsersController::class, 'delete'])->name('delete');
});

Route::prefix('roles')->name('roles.')->group(function (){
    Route::get('/', [RolesController::class, 'index'])->name('index');
    Route::POST('/', [RolesController::class, 'store'])->name('store');
    Route::get('/{role}', [RolesController::class, 'show'])->name('show');
    Route::put('/{role}', [RolesController::class, 'update'])->name('update');
    Route::get('/{role}/permissions', [RolesController::class, 'permissions'])->name('show.permissions');
    Route::put('/{role}/permissions', [RolesController::class, 'updatePermissions'])->name('update.permissions');
});

Route::prefix('permissions')->name('permissions.')->group(function (){
    Route::get('/', [PermissionsController::class, 'index'])->name('index');
});

