<?php

use App\Http\Controllers\AtelierController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\CasController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ManagementBeneficiaireAteliersController;
use App\Http\Controllers\ManagementBeneficiaireCouvertureController;
use App\Http\Controllers\ManagementBeneficiaireDrogueTypeController;
use App\Http\Controllers\ManagementBeneficiaireServiceController;
use App\Http\Controllers\ManagementBeneficiaireSuicideController;
use App\Http\Controllers\ManagementBeneficiaireViolenceTypeController;
use App\Http\Controllers\ManagementDonneeUserController;
use App\Http\Controllers\ManagementIntervenantProgrammeController;
use App\Http\Controllers\ManagementIntervenantZoneController;
use App\Http\Controllers\ManagementRolePermissionController;
use App\Http\Controllers\MedicaleVisiteController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\SocialeVisiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Requests\IntegrationStatusBeneficiaireRequest;
use App\Models\Beneficiaire;
use App\Models\Intervenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
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
    if (Auth::check()) {
        return redirect()->back();
    }
    return view('auth.login');
});
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->group(function () {
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
    Route::get('management-permissions-roles', function (Request $request) {
        return view('superUser.permission');
    })->name('roles-permissions');
    Route::get('logout', function (Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
    Route::view('new-beneficiaire-form', 'interTerrain.inscription')->name('new-beneficiaire-form');
    Route::put('validation-state/{beneficiaire}/{user}', function (Beneficiaire $beneficiaire, User $user) {
        if ($user->social_assistant) {
            $beneficiaire->validation_social_assistant = 1;
        } elseif ($user->admin) {
            $beneficiaire->validation_directive = 1;
        } elseif ($user->medical_assistant) {
            $beneficiaire->validation_medical_assistant = 1;
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
    Route::get('/couverture-medical/{beneficiaire}', function (Beneficiaire $beneficiaire) {
        return view('interTerrain.Couverture-medical', compact('beneficiaire'));
    })->name('couverture-medical');
    Route::get('/violence/{beneficiaire}', function (Beneficiaire $beneficiaire) {
        return view('interTerrain.violence', compact('beneficiaire'));
    })->name('violence');
    Route::get('/suicide/{beneficiaire}', function (Beneficiaire $beneficiaire) {
        return view('interTerrain.suicide', compact('beneficiaire'));
    })->name('suicide');
    Route::get('all-couvertures', [ManagementBeneficiaireCouvertureController::class, 'index']);
    Route::post('match-beneficiaire-couvertures/{beneficiaire}', [ManagementBeneficiaireCouvertureController::class, 'matchRolePermission']);
    Route::get('/service/{beneficiaire}', function (Beneficiaire $beneficiaire) {
        return view('interTerrain.service', compact('beneficiaire'));
    })->name('service');
    Route::get('all-drogue_types', [ManagementBeneficiaireDrogueTypeController::class, 'index']);
    Route::post('match-beneficiaire-drogue_types/{beneficiaire}', [ManagementBeneficiaireDrogueTypeController::class, 'matchBeneficiaireDrogueTypes']);
    Route::get('all-violence_types', [ManagementBeneficiaireViolenceTypeController::class, 'index']);
    Route::post('match-beneficiaire-violence_types/{beneficiaire}', [ManagementBeneficiaireViolenceTypeController::class, 'matchBeneficiaireViolenceTypes']);
    Route::get('all-services', [ManagementBeneficiaireServiceController::class, 'index']);
    Route::post('match-beneficiaire-services/{beneficiaire}', [ManagementBeneficiaireServiceController::class, 'matchBeneficiaireServices']);
    Route::post('match-beneficiaire-suicide_causes/{beneficiaire}', [ManagementBeneficiaireSuicideController::class, 'matchBeneficiaireSuicideCauses'])->name('match-beneficiaire-suicide_causes');
    Route::put('reinit/{user}', function (Request $request, User $user) {
        $user->password = Hash::make('demo0000');
        if ($user->update()) {
            // $result = $user;
            // $status = 200;
            $result = 'Réinitialisation du compte avec succés';
            $status = 'success';
            $icon = 'fa-check';
        } else {
            $result = 'probleme au serveur.';
            // $status = 500;
            $status = 'danger';
            $icon = 'fa-times';
        }
        // return response()->json($result, $status);
        $request->session()->flash('msg', $result);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
    })->name('reinit');
    Route::resource('zones', ZoneController::class);
    Route::resource('programmes', ProgrammeController::class);
    Route::get('all-zones/{intervenant}', function (Request $request, Intervenant $intervenant) {
        return view('superUser.affectationzone', compact(
            'intervenant',
        ));
    })->name('all-zones');
    Route::post('match-intervenant-zones/{intervenant}', [ManagementIntervenantZoneController::class, 'matchIntervenantZones']);
    Route::get('all-programmes/{intervenant}', function (Request $request, Intervenant $intervenant) {
        return view('superUser.affectationprogramme', compact(
            'intervenant',
        ));
    })->name('all-programmes');
    Route::post('match-intervenant-programmes/{intervenant}', [ManagementIntervenantProgrammeController::class, 'matchIntervenantProgrammes']);
    Route::put('archive-beneficiaire/{beneficiaire}', function (Request $request, Beneficiaire $beneficiaire) {
        if (!Gate::allows('archive-beneficiaire-ability')) {
            abort(403);
        }
        $beneficiaire->archive = 1;
        if ($beneficiaire->update()) {
            $result = $beneficiaire;
            $status = 200;
            $msg = 'Archivé avec succéss.';
            $icon = 'fa-check';
        } else {
            $result = null;
            $status = 500;
            $msg = 'Probléme au serveur.';
            $icon = 'fa-times';
        }
        $request->session()->flash('msg', $msg);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
    })->name('archive-beneficiaire');
    Route::put('desuarchive-beneficiaire/{beneficiaire}', function (Request $request, Beneficiaire $beneficiaire) {
        if (!Gate::allows('desuarchive-beneficiaire-ability')) {
            abort(403);
        }
        $beneficiaire->archive = 0;
        if ($beneficiaire->update()) {
            $result = $beneficiaire;
            $status = 200;
            $msg = 'Réstauration avec succéss.';
            $icon = 'fa-check';
        } else {
            $result = null;
            $status = 500;
            $msg = 'Probléme au serveur.';
            $icon = 'fa-times';
        }
        $request->session()->flash('msg', $msg);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
    })->name('desuarchive-beneficiaire');
    Route::get('beneficiaires-history', function (Request $request) {
        if (!Gate::allows('show-history-beneficiaire-ability')) {
            abort(403);
        }
        $beneficiaires = Beneficiaire::where('archive', 1)->get();
        return view('interTerrain.listing-beneficiaires-archived', compact(
            'beneficiaires',
        ));
    })->name('beneficiaires-history');
    Route::resource('socialeVisites', SocialeVisiteController::class);
    Route::put('integration-status/{beneficiaire}', function (IntegrationStatusBeneficiaireRequest $request, Beneficiaire $beneficiaire) {
        $beneficiaire->integration_status = $request->integration_status;
        if ($beneficiaire->update()) {
            $result = $beneficiaire;
            $status = 200;
            $msg = 'Intégration changée avec succéss.';
        } else {
            $result = null;
            $status = 500;
            $msg = 'Probléme au serveur.';
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    })->name('integration-status');
    Route::resource('medicaleVisites', MedicaleVisiteController::class);
    Route::resource('groupes', GroupeController::class)
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas de groupe',
                ],
                404
            );
        });
    Route::resource('ateliers', AtelierController::class)
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas d\'atelier',
                ],
                404
            );
        });
    Route::get('all-ateliers/{beneficiaire}', [ManagementBeneficiaireAteliersController::class, 'index'])
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas de beneficiaire',
                ],
                404
            );
        });
    Route::post('match-beneficiaire-ateliers/{beneficiaire}', [ManagementBeneficiaireAteliersController::class, 'matchBeneficiaireAteliers'])
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas de beneficiaire',
                ],
                404
            );
        });
    Route::resource('cas', CasController::class)
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas de cas juridique',
                ],
                404
            );
        })
        ->parameters([
            "cas" => "cas"
        ]);
    Route::get('/visiteMedical', function (Beneficiaire $beneficiaire) {
        return view('superUser.AddMedicalVisite', compact('beneficiaire'));
    })->name('visitemedical');
    Route::get('/showVisiteMedical', function (Beneficiaire $beneficiaire) {
        return view('superUser.showVisiteMedical', compact('beneficiaire'));
    })->name('showVisiteMedical');
    Route::get('/AddGroups', function (Beneficiaire $beneficiaire) {
        return view('superUser.AddGroups', compact('beneficiaire'));
    })->name('AddGroups');
    Route::get('/showGroups', function (Beneficiaire $beneficiaire) {
        return view('superUser.showGroups', compact('beneficiaire'));
    })->name('showGroups');
    Route::get('/AddAtelier', function (Beneficiaire $beneficiaire) {
        return view('superUser.AddAtelier', compact('beneficiaire'));
    })->name('AddAtelier');
    Route::get('/showAtelier', function (Beneficiaire $beneficiaire) {
        return view('superUser.showAtelier', compact('beneficiaire'));
    })->name('showAtelier');
});
