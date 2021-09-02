<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = \App\Models\User::query()->where('name', 'LIKE', "%آیدا%")->first();
//    $user->assignRole('admin');
    return $user->getPermissionsViaRoles();
    return view('welcome');
});

Route::get('/*', function () {
    return redirect(url(env("FRONT_URL")));
});
