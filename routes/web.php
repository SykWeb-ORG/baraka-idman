<?php

use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\ManagementBeneficiaireCouvertureController;
use App\Http\Controllers\ManagementBeneficiaireDrogueTypeController;
use App\Http\Controllers\ManagementDonneeUserController;
use App\Http\Controllers\ManagementRolePermissionController;
use App\Http\Controllers\UserController;
use App\Models\Beneficiaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->back();
    }
    return view('auth.login');
});
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/list-beneficiaires', function () {
        return view('interTerrain.listing');
    })->name('list-beneficiaires');
    Route::resource('users', UserController::class)
        ->missing(function (Request $request) {
            return response()->json("pas d'utilisateur", 404);
        });
    Route::post('match-role-permission', [ManagementRolePermissionController::class, 'matchRolePermission']);
    Route::get('roles-permissions', [ManagementRolePermissionController::class, 'index']);
    Route::get('/new-user-form', function () {
        return view('superUser.addnewuser');
    })->name('new-user-form');
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
    Route::get('management-permissions-roles', function(Request $request){
        return view('superUser.permission');
    })->name('roles-permissions');
    Route::get('logout', function (Request $request)
    {
        Auth::guard('web')->logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login');
    
    })->name('logout');
    Route::view('new-beneficiaire-form', 'interTerrain.inscription')->name('new-beneficiaire-form');
    Route::put('validation-state/{beneficiaire}/{user}', function(Beneficiaire $beneficiaire, User $user){
        if ($user->social_assistant) {
            $beneficiaire->validation_social_assistant = 1;
        }elseif ($user->admin) {
            $beneficiaire->validation_directive = 1;
        }
        if ($beneficiaire->update()) {
            $result = 'Utilisateur validé avec succés';
            $status = 'success';
            $icon = 'fa-check';
        } else {
            $result = 'probleme au serveur.';
            // $status = 500;
            $status = 'danger';
            $icon = 'fa-times';
        }
        session()->flash('msg', $result);
        session()->flash('status', $status);
        session()->flash('icon', $icon);
        return back();
    })->name('validation-state');
});
Route::get('/assistant', function () {
    return view('assistSocial.listing');
});
Route::get('/all-users', function () {
    return view('superUser.showusers');
})->name("all-users");
Route::get('/couverture-medical/{beneficiaire}', function (Beneficiaire $beneficiaire) {
    return view('interTerrain.Couverture-medical', compact('beneficiaire'));
});
Route::get('/violence', function () {
    return view('interTerrain.violence');
});
Route::get('/suicide', function () {
    return view('interTerrain.suicide');
});
Route::get('all-couvertures', [ManagementBeneficiaireCouvertureController::class, 'index']);
Route::post('match-beneficiaire-couvertures/{beneficiaire}', [ManagementBeneficiaireCouvertureController::class, 'matchRolePermission']);
Route::get('/service', function () {
    return view('interTerrain.service');
});
Route::get('all-drogue_types', [ManagementBeneficiaireDrogueTypeController::class, 'index']);
Route::post('match-beneficiaire-drogue_types/{beneficiaire}', [ManagementBeneficiaireDrogueTypeController::class, 'matchBeneficiaireDrogueTypes']);
