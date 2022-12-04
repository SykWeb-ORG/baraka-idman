<?php

use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\ManagementDonneeUserController;
use App\Http\Controllers\ManagementRolePermissionController;
use App\Http\Controllers\UserController;
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

Route::get('/list-beneficiaires', function () {
    return view('inter_terrain.listing');
});
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::resource('users', UserController::class)
    ->missing(function (Request $request) {
        return response()->json("pas d'utilisateur", 404);
    });
Route::post('match-role-permission', [ManagementRolePermissionController::class, 'matchRolePermission']);
Route::get('roles-permissions', [ManagementRolePermissionController::class, 'index']);
Route::get('/inter_terrain', function () {
    return view('superUser.addnewuser');
});
Route::get('/donnees-user/{user}', [ManagementDonneeUserController::class, 'index'])
    ->missing(function (Request $request) {
        return response()->json("pas d'utilisateur", 404);
    });
Route::post('/match-donnee-user/{user}', [ManagementDonneeUserController::class, 'matchDonneeUser'])
    ->missing(function (Request $request) {
        return response()->json("pas d'utilisateur", 404);
    });
Route::resource('beneficiaires', BeneficiaireController::class)
    ->missing(function (Request $request) {
        return response()->json('pas de beneficiaire', 404);
    });
    Route::get('/login', function () {
        return view('auth.login');
    });
Route::get('management-permissions-roles', function(Request $request){
    return view('superUser.permission');
});
