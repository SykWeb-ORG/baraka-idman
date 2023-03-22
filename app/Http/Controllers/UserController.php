<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Admin;
use App\Models\Intervenant;
use App\Models\JuridiqueAssistant;
use App\Models\MedicalAssistant;
use App\Models\SocialAssistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct() {
        $this->authorizeResource(User::class, 'user');
    }

    public function login(LoginRequest $request){
        if (Auth::check()) {
            return redirect()->back();
        }
        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->admin) {
                // return redirect()->route('new-user-form');
                return redirect()->route('dashboard');
            }elseif ($user->medical_assistant) {
                return redirect()->route('beneficiaires.index');
            }elseif ($user->social_assistant) {
                return redirect()->route('beneficiaires.index');
            }elseif ($user->intervenant) {
                return redirect()->route('beneficiaires.create');
            }elseif ($user->juridique_assistant) {
                return redirect()->route('beneficiaires.index');
            }
        }else {
            $result = 'Email ou(et) mot de passe no valid';
            // $status = 403;
            $status = 'danger';
            $icon = 'fa-times'; 
            // return response()->json($result, $status);
            $request->session()->flash('msg', $result);
            $request->session()->flash('status', $status);
            $request->session()->flash('icon', $icon);
            return back();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // return response()->json($users);
        return view('superUser.showusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cin = $request->cin;
        $user->phone_number = $request->phone_number;
        $user->birthday_date = $request->birthday_date;
        $user->email = $request->email;
        $user->password = Hash::make('demo0000');
        if ($user->save()) {
            if ($request->role == 'admin') {
                $admin = new Admin;
                if (($result = $admin->user()->associate($user)) && $admin->save()) {
                    // $status = 200;
                    $result = 'Utilisateur ajouté avec success';
                    $status = 'success';
                    $icon = 'fa-check';
                } else {
                    $result = 'probleme au serveur.';
                    // $status = 500;
                    $status = 'danger';
                    $icon = 'fa-times';        
                }
            }elseif ($request->role == 'social assistant') {
                $socialAssistant = new SocialAssistant;
                if (($result = $socialAssistant->user()->associate($user)) && $socialAssistant->save()) {
                    // $status = 200;
                    $result = 'Utilisateur ajouté avec success';
                    $status = 'success';
                    $icon = 'fa-check';
                } else {
                    $result = 'probleme au serveur.';
                    // $status = 500;
                    $status = 'danger';
                    $icon = 'fa-times';        
                }
            }elseif ($request->role == 'medical assistant') {
                $medicalAssistant = new MedicalAssistant;
                if (($result = $medicalAssistant->user()->associate($user)) && $medicalAssistant->save()) {
                    // $status = 200;
                    $result = 'Utilisateur ajouté avec success';
                    $status = 'success';
                    $icon = 'fa-check';
                } else {
                    $result = 'probleme au serveur.';
                    // $status = 500;
                    $status = 'danger';
                    $icon = 'fa-times';        
                }
            }elseif ($request->role == 'juridique assistant') {
                $juridiqueAssistant = new JuridiqueAssistant;
                if (($result = $juridiqueAssistant->user()->associate($user)) && $juridiqueAssistant->save()) {
                    // $status = 200;
                    $result = 'Utilisateur ajouté avec success';
                    $status = 'success';
                    $icon = 'fa-check';
                } else {
                    $result = 'probleme au serveur.';
                    // $status = 500;
                    $status = 'danger';
                    $icon = 'fa-times';        
                }
            }elseif ($request->role == 'intervenant') {
                $intervenant = new Intervenant;
                if (($result = $intervenant->user()->associate($user)) && $intervenant->save()) {
                    // $status = 200;
                    $result = 'Utilisateur ajouté avec success';
                    $status = 'success';
                    $icon = 'fa-check';
                } else {
                    $result = 'probleme au serveur.';
                    // $status = 500;
                    $status = 'danger';
                    $icon = 'fa-times';        
                }
            }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('superUser.modifieruser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->cin = $request->cin;
        $user->phone_number = $request->phone_number;
        $user->birthday_date = $request->birthday_date;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->photo_profile) {
            Storage::delete(Str::of($user->photo_profile)->remove('storage/'));
            $path = $request->file('photo_profile')->store('avatars');
            $user->photo_profile = 'storage/' . $path;
        }
        if ($request->role) {
            // get the role of the user .. 
            if ($user->admin != null) {
                $role = 'admin';
            }elseif ($user->intervenant != null) {
                $role = 'intervenant';
            }elseif ($user->social_assistant != null) {
                $role = 'social assistant';
            }elseif ($user->medical_assistant != null) {
                $role = 'medical assistant';
            }elseif ($user->juridique_assistant != null) {
                $role = 'juridique assistant';
            }
            // check if the role was modified ..
            if ($request->role != $role) {
                // delete the old role first ..
                if ($role == 'admin') {
                    $user->admin()->delete();
                } elseif ($role == 'intervenant') {
                    $user->intervenant()->delete();
                } elseif ($role == 'social assistant') {
                    $user->social_assistant()->delete();
                } elseif ($role == 'medical assistant') {
                    $user->medical_assistant()->delete();
                } elseif ($role == 'juridique assistant') {
                    $user->juridique_assistant()->delete();
                }
                // give him new role ..
                if ($request->role == 'admin') {
                    $admin = new Admin;
                    if (($result = $admin->user()->associate($user)) && $admin->save()) {
                        // $status = 200;
                        $result = 'Utilisateur modifié avec succés';
                        $status = 'success';
                        $icon = 'fa-check';
                    } else {
                        $result = 'probleme au serveur.';
                        // $status = 500;
                        $status = 'danger';
                        $icon = 'fa-times';
                    }
                }elseif ($request->role == 'social assistant') {
                    $socialAssistant = new SocialAssistant;
                    if (($result = $socialAssistant->user()->associate($user)) && $socialAssistant->save()) {
                        // $status = 200;
                        $result = 'Utilisateur modifié avec succés';
                        $status = 'success';
                        $icon = 'fa-check';
                    } else {
                        $result = 'probleme au serveur.';
                        // $status = 500;
                        $status = 'danger';
                        $icon = 'fa-times';
                    }
                }elseif ($request->role == 'medical assistant') {
                    $medicalAssistant = new MedicalAssistant;
                    if (($result = $medicalAssistant->user()->associate($user)) && $medicalAssistant->save()) {
                        // $status = 200;
                        $result = 'Utilisateur modifié avec succés';
                        $status = 'success';
                        $icon = 'fa-check';
                    } else {
                        $result = 'probleme au serveur.';
                        // $status = 500;
                        $status = 'danger';
                        $icon = 'fa-times';
                    }
                }elseif ($request->role == 'juridique assistant') {
                    $juridiqueAssistant = new JuridiqueAssistant;
                    if (($result = $juridiqueAssistant->user()->associate($user)) && $juridiqueAssistant->save()) {
                        // $status = 200;
                        $result = 'Utilisateur modifié avec succés';
                        $status = 'success';
                        $icon = 'fa-check';
                    } else {
                        $result = 'probleme au serveur.';
                        // $status = 500;
                        $status = 'danger';
                        $icon = 'fa-times';
                    }
                }elseif ($request->role == 'intervenant') {
                    $intervenant = new Intervenant;
                    if (($result = $intervenant->user()->associate($user)) && $intervenant->save()) {
                        // $status = 200;
                        $result = 'Utilisateur modifié avec succés';
                        $status = 'success';
                        $icon = 'fa-check';
                    } else {
                        $result = 'probleme au serveur.';
                        // $status = 500;
                        $status = 'danger';
                        $icon = 'fa-times';
                    }
                }
                // update the user with new data ..
                if ($user->update()) {
                    // $result = $user;
                    // $status = 200;
                    $result = 'Utilisateur modifié avec succés';
                    $status = 'success';
                    $icon = 'fa-check';
                } else {
                    $result = 'probleme au serveur.';
                    // $status = 500;
                    $status = 'danger';
                    $icon = 'fa-times';
                }
                // unset user_id from beneficiaire_service_user because the role is changed:
                $user->beneficiaires()->update(['beneficiaire_service_user.user_id' => null]);
            }
        } else {
            // just update the data of the user without changing his role ..
            if ($user->update()) {
                // $result = $user;
                // $status = 200;
                $result = 'Utilisateur modifié avec succés';
                $status = 'success';
                $icon = 'fa-check';
            } else {
                $result = 'probleme au serveur.';
                // $status = 500;
                $status = 'danger';
                $icon = 'fa-times';
            }
        }
        // return response()->json($result, $status);
        $request->session()->flash('msg', $result);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user != null) {
            if ($user->delete()) {
                // $result = $user;
                // $status = 200;
                $result = 'Utilisateur supprimé avec succés';
                $status = 'success';
                $icon = 'fa-check';
            } else {
                // $result = 'probleme au serveur.';
                // $status = 500;
                $status = 'danger';
                $icon = 'fa-times';    
            }
        } else {
            $result = "l'utilisateur n'existe pas.";
            // $status = 404;
            $status = 'danger';
            $icon = 'fa-times';
        }
        
        // return response()->json($result, $status);
        session()->flash('msg', $result);
        session()->flash('status', $status);
        session()->flash('icon', $icon);
        return back();
    }
    function search(Request $request)
    {
        $nomOrPrenomOrCIN = $request->query('criteria');
        $role = $request->query('role');
        $zone = $request->query('zone');
        if (!$nomOrPrenomOrCIN && !$role && !$zone) {
            return redirect()->route('users.index');
        } else {
            $users = User::where(function ($query) use ($nomOrPrenomOrCIN) {
                    $query->where('first_name', 'like', '%' . $nomOrPrenomOrCIN . '%')
                    ->orWhere('last_name', 'like', '%' . $nomOrPrenomOrCIN . '%')
                    ->orWhere('cin', 'like', '%' . $nomOrPrenomOrCIN . '%');
                })
                ->when($zone, function ($query, $zone) {
                    return $query->whereRelation('zone', 'id', $zone);
                })
                ->get();
            if ($role) {
                if ($role == 'admin') {
                    $users = $users->filter(function ($user, $key) {
                        return $user->admin;
                    });
                } elseif ($role == 'intervenant') {
                    $users = $users->filter(function ($user, $key) {
                        return $user->intervenant;
                    });
                } elseif ($role == 'social assistant') {
                    $users = $users->filter(function ($user, $key) {
                        return $user->social_assistant;
                    });
                } elseif ($role == 'medical assistant') {
                    $users = $users->filter(function ($user, $key) {
                        return $user->medical_assistant;
                    });
                } elseif ($role == 'juridique assistant') {
                    $users = $users->filter(function ($user, $key) {
                        return $user->juridique_assistant;
                    });
                }
            }
            // return response()->json($users);
            return view('superUser.showusers', compact('users'));
        }
    }

}
