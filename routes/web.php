<?php

use App\Http\Controllers\AtelierController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\CasController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ManagementBeneficiaireAteliersController;
use App\Http\Controllers\ManagementBeneficiaireCasController;
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
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SocialeVisiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Requests\IntegrationStatusBeneficiaireRequest;
use App\Models\Atelier;
use App\Models\Beneficiaire;
use App\Models\Cas;
use App\Models\Formation;
use App\Models\Groupe;
use App\Models\Intervenant;
use App\Models\MedicalAssistant;
use App\Models\MedicaleVisite;
use App\Models\Participant;
use App\Models\Place;
use App\Models\Programme;
use App\Models\Role;
use App\Models\Service;
use App\Models\SocialAssistant;
use App\Models\SocialeVisite;
use App\Models\User;
use App\Models\Zone;
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
            $result = 'Bénéficiaire validé avec succés';
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
    Route::put('match-beneficiaire-couvertures/{beneficiaire}', [ManagementBeneficiaireCouvertureController::class, 'matchRolePermission']);
    Route::get('/service/{beneficiaire}', function (Beneficiaire $beneficiaire) {
        return view('interTerrain.service', compact('beneficiaire'));
    })->name('service');
    Route::get('all-drogue_types', [ManagementBeneficiaireDrogueTypeController::class, 'index']);
    Route::put('match-beneficiaire-drogue_types/{beneficiaire}', [ManagementBeneficiaireDrogueTypeController::class, 'matchBeneficiaireDrogueTypes']);
    Route::get('all-violence_types', [ManagementBeneficiaireViolenceTypeController::class, 'index']);
    Route::put('match-beneficiaire-violence_types/{beneficiaire}', [ManagementBeneficiaireViolenceTypeController::class, 'matchBeneficiaireViolenceTypes']);
    Route::get('all-services', [ManagementBeneficiaireServiceController::class, 'index']);
    Route::put('match-beneficiaire-services/{beneficiaire}', [ManagementBeneficiaireServiceController::class, 'matchBeneficiaireServices']);
    Route::put('match-beneficiaire-suicide_causes/{beneficiaire}', [ManagementBeneficiaireSuicideController::class, 'matchBeneficiaireSuicideCauses'])->name('match-beneficiaire-suicide_causes');
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
        if (!Gate::allows('intervenant-zones-ability')) {
            abort(403);
        }
        return view('superUser.affectationzone', compact(
            'intervenant',
        ));
    })->name('all-zones');
    Route::put('match-intervenant-zones/{intervenant}', [ManagementIntervenantZoneController::class, 'matchIntervenantZones']);
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
                'status' => $status,
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
        })
        ->name('all-ateliers');
    Route::put('match-beneficiaire-ateliers/{beneficiaire}', [ManagementBeneficiaireAteliersController::class, 'matchBeneficiaireAteliers'])
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
    Route::get('get-users-for-service/{service}', function(Service $service) {
        $role = $service->role->role_nom;
        if ($role) {
            if ($role == 'social assistant') {
                $users = SocialAssistant::with('user')->get();
            }elseif ($role == 'medical assistant') {
                $users = SocialAssistant::with('user')->get();
            }elseif ($role == 'intervenant') {
                $users = SocialAssistant::with('user')->get();
            }
            $result = $users;
            $status = 200;
            $msg = 'success';
        } else {
            $result = null;
            $status = 404;
            $msg = 'Probléme de role qui n\'existe pas.';
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    })->name('get-users-for-service')
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas de service',
                ],
                404
            );
        });
    Route::get('/visiteMedical', function (Request $request) {
        if (!Gate::allows('create', MedicaleVisite::class)) {
            abort(403);
        }
        return view('superUser.AddMedicalVisite');
    })->name('visitemedical');
    Route::get('/showVisiteMedical', function (Request $request) {
        if (!Gate::allows('viewAny', MedicaleVisite::class)) {
            abort(403);
        }
        return view('superUser.showVisiteMedical');
    })->name('showVisiteMedical');
    Route::get('/AddGroups', function (Request $request) {
        if (!Gate::allows('create', Groupe::class)) {
            abort(403);
        }
        return view('superUser.AddGroups');
    })->name('AddGroups');
    Route::get('/showGroups', function (Request $request) {
        if (!Gate::allows('viewAny', Groupe::class)) {
            abort(403);
        }
        return view('superUser.showGroups');
    })->name('showGroups');
    Route::get('/AddAtelier', function (Request $request) {
        if (!Gate::allows('create', Atelier::class)) {
            abort(403);
        }
        return view('superUser.AddAtelier');
    })->name('AddAtelier');
    Route::get('/showAtelier', function (Request $request) {
        if (!Gate::allows('viewAny', Atelier::class)) {
            abort(403);
        }
        return view('superUser.showAtelier');
    })->name('showAtelier');
    Route::get('/ShowProgram&Zones', function (Beneficiaire $beneficiaire) {
        return view('superUser.ShowProgram&Zones', compact('beneficiaire'));
    })->name('ShowProgram&Zones');
    Route::get('/AffectServiceRole', function (Beneficiaire $beneficiaire) {
        if (!Gate::allows('roles-services-ability')) {
            abort(403);
        }
        return view('superUser.AffectServiceRole', compact('beneficiaire'));
    })->name('AffectServiceRole');
    Route::get('/AddCasJuridique', function (Request $request) {
        if (!Gate::allows('create', Cas::class)) {
            abort(403);
        }
        return view('superUser.AddCasJuridique');
    })->name('AddCasJuridique');
    Route::get('/showCasJuridique', function (Request $request) {
        if (!Gate::allows('viewAny', Cas::class)) {
            abort(403);
        }
        return view('superUser.showCasJuridique');
    })->name('showCasJuridique');
    Route::get('all-cas/{beneficiaire}', [ManagementBeneficiaireCasController::class, 'index'])
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas de beneficiaire',
                ],
                404
            );
        })
        ->name('all-cas');
    Route::put('match-beneficiaire-cas/{beneficiaire}', [ManagementBeneficiaireCasController::class, 'matchBeneficiaireCas'])
        ->missing(function (Request $request) {
            return response()->json(
                [
                    'result' => null,
                    'msg' => 'Pas de beneficiaire',
                ],
                404
            );
        });
    Route::put('match-role-services/{role}', function (Request $request, Role $role)
    {
        if (!Gate::allows('roles-services-ability')) {
            abort(403);
        }
        $old_services = $role->services->modelKeys();
        $services_to_attach = collect($request->services)->diff($old_services);
        $services_to_detach = collect($old_services)->diff(collect($request->services));
        foreach ($services_to_attach as $service_id) {
            $service = Service::find($service_id);
            if ($service) {
                $service->role()->associate($role);
                $service->save();
                // unset user_id from beneficiaire_service_user because the service will change its associated role:
                $service->beneficiaires()->updateExistingPivot($service_id, [
                    'user_id' => null,
                ]);
            }
        }
        if ($services_to_detach->isNotEmpty()) {
            foreach ($services_to_detach as $service_id) {
                $service = Service::find($service_id);
                if ($service) {
                    $service->role()->dissociate();
                    $service->save();
                    // unset user_id from beneficiaire_service_user because the service will be free:
                    $service->beneficiaires()->updateExistingPivot($service_id, [
                        'user_id' => null,
                    ]);
                }
            }
        }
        $role->refresh();
        return response()->json(
            [
                'result' => $role,
                'msg' => 'success',
            ],
            200
        );
    })->missing(function (Request $request) {
        return response()->json(
            [
                'result' => null,
                'msg' => 'Pas de role',
            ],
            404
        );
    });
    Route::get('all-roles', function (Request $request)
    {
        $roles = Role::all();
        return response()->json(
            [
                'result' => $roles,
                'msg' => 'success',
            ],
            200
        );
    });
    Route::get('all-beneficiaires', function (Request $request)
    {
        $beneficiaires = Beneficiaire::all();
        return response()->json(
            [
                'result' => $beneficiaires,
                'msg' => 'success',
            ],
            200
        );
    });
    Route::get('/showService', function (Request $request) {
        return view('superUser.ShowService');
    })->name('showService');
    Route::get('/AddFormation', function (Request $request) {
        if (!Gate::allows('create', Formation::class)) {
            abort(403);
        }
        return view('superUser.AddFormation');
    })->name('AddFormation');
    Route::get('/showFormation', function (Beneficiaire $beneficiaire) {
        return view('superUser.ShowFormation', compact('beneficiaire'));
    })->name('showFormation');
    Route::get('/AddSocialVisite', function (Request $request) {
        if (!Gate::allows('create', SocialeVisite::class)) {
            abort(403);
        }
        return view('superUser.AddSocialVisite');
    })->name('AddSocialVisite');
    Route::get('/showSocialVisite', function (Request $request) {
        if (!Gate::allows('viewAny', SocialeVisite::class)) {
            abort(403);
        }
        return view('superUser.ShowSocialVisite');
    })->name('showSocialVisite');
    Route::resource('services', ServiceController::class)
        ->missing(function (Request $request) {
            return response()->json("pas de service", 404);
        });
    Route::resource('formations', FormationController::class)
        ->missing(function (Request $request) {
            return response()->json("pas de formation", 404);
        });
    Route::get('/AddService', function (Request $request) {
        return view('superUser.Addservice');
    })->name('AddService');
    Route::resource('participants', ParticipantController::class)
        ->missing(function (Request $request) {
            return response()->json("pas de participant", 404);
        });
    Route::get('/AddVisiteJuridique', function (Beneficiaire $beneficiaire) {
        return view('superUser.AddVisiteJuridique', compact('beneficiaire'));
    })->name('AddVisiteJuridique');
    Route::get('/ShowVisiteJuridique', function (Beneficiaire $beneficiaire) {
        return view('superUser.ShowVisiteJuridique', compact('beneficiaire'));
    })->name('ShowVisiteJuridique');
    Route::get('/addzoneIntervenant', function (Request $request) {
        if (!Gate::allows('create', Zone::class)) {
            abort(403);
        }
        return view('superUser.addzoneIntervenant');
    })->name('addzoneIntervenant');
    Route::get('/zoneintervenance', function (Request $request) {
        if (!Gate::allows('viewAny', Zone::class)) {
            abort(403);
        }
        return view('interTerrain.zoneintervenance');
    })->name('zoneintervenance');
    Route::get('/AddVisiteJuridique', function (Beneficiaire $beneficiaire) {
        return view('superUser.AddVisiteJuridique', compact('beneficiaire'));
    })->name('AddVisiteJuridique');
    Route::get('/ShowVisiteJuridique', function (Beneficiaire $beneficiaire) {
        return view('superUser.ShowVisiteJuridique', compact('beneficiaire'));
    })->name('ShowVisiteJuridique');
    Route::get('/AddProgram', function (Request $request) {
        if (!Gate::allows('create', Programme::class)) {
            abort(403);
        }
        return view('superUser.AddProgramm');
    })->name('AddProgram');
    Route::get('/showProgram', function (Request $request) {
        if (!Gate::allows('viewAny', Programme::class)) {
            abort(403);
        }
        return view('superUser.ShowProgram');
    })->name('showProgram');
    Route::put('/link-places-with-programme/{programme}', function (Request $request, Programme $programme){
        $programme->places()->delete();
        $places = collect([]);
        foreach($request->places as $place)
        {
            $values = [
                'lieu' => $place['lieu'],
                'programme_date' => $place['programme_date'],
                'programme_resultat' => $place['programme_resultat'],
            ];
            $new_place = new Place($values);
            $places->push($new_place);
        }
        $programme->places()->saveMany($places->all());
        $programme->refresh();
        $result = $programme;
        $status = 200;
        $msg = "Programme modifié avec success.";
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    });
    Route::put('/link-participants-with-formation/{formation}', function (Request $request, Formation $formation){
        $formation->participants()->delete();
        $participants = collect([]);
        foreach($request->participants as $participant)
        {
            $values = [
                'participant_nom' => $participant['participant_nom'],
                'participant_prenom' => $participant['participant_prenom'],
                'participant_cin' => $participant['participant_cin'],
                'participant_tele' => $participant['participant_tele'],
            ];
            $new_participant = new Participant($values);
            $participants->push($new_participant);
        }
        $formation->participants()->saveMany($participants->all());
        $formation->refresh();
        $result = $formation;
        $status = 200;
        $msg = "formation modifié avec success.";
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
            ],
            $status
        );
    });
    Route::get('/dashboard', function (Beneficiaire $beneficiaire) {
        return view('superUser.dashboard', compact('beneficiaire'));
    })->name('dashboard');
});
