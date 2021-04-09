<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleAddPermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
Route::resource('/', HomeController::class);


Route::middleware(['auth:sanctum', 'verified'])->group(function (){
//pages

});

//for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function (){
    Route::resource('/dashboard', DashboardController::class);
    //Admin
    Route::resource('/dashboards/permissions', PermissionController::class);
    Route::resource('/dashboards/roles', RoleController::class);
    Route::resource('/dashboards/roles-permissions', RoleAddPermissionController::class);

    //users
    Route::resource('/dashboards/users',UserController::class);
    Route::get('/dashboards/unlockutypeuser/{id}', [ UserController::class, 'unLockutypeUser'])->name('dashboards.unlockutypeuser');
    Route::get('/dashboards/lockutypeuser/{id}', [ UserController::class, 'lockutypeUser'])->name('dashboards.lockutypeuser');
    //profile
    Route::get('/dashboards/profile', [ UserController::class, 'profile'])->name('dashboards.profile');
    Route::post('/dashboards/profile', [ UserController::class,'editProfile'])->name('dashboards.updateprofile');

    //password
    Route::get('/dashboards/password/change', [ UserController::class,'getPassword'])->name('dashboards.getpassword');
    Route::post('/dashboards/password/change', [ UserController::class,'editPassword'])->name('dashboards.editpassword');
});
