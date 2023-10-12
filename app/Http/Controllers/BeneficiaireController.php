<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeneficiaireRequest;
use App\Models\Beneficiaire;
use App\Models\Cas;
use App\Models\Couverture;
use App\Models\DrogueType;
use App\Models\Service;
use App\Models\SocialeVisite;
use App\Models\SuicideCause;
use App\Models\ViolenceType;
use App\Models\Zone;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BeneficiaireController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Beneficiaire::class, 'beneficiaire');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        if (Auth::user()->admin || Auth::user()->social_assistant) {
            $beneficiaires = Beneficiaire::orderBy('nb_dosier', 'desc')->paginate(10);
        }else{
            $beneficiaires = Auth::user()->registred_beneficiaires()->orderBy('nb_dosier', 'desc')->paginate(10);
        }
        return view('interTerrain.listing', compact('beneficiaires', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couvertures = Couverture::all();
        $drogue_types = DrogueType::all();
        $services = Service::all();
        $services->loadMissing('role');
        $violence_types = ViolenceType::all();
        return view('interTerrain.inscription', compact(
            'couvertures',
            'drogue_types',
            'services',
            'violence_types',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficiaireRequest $request)
    {
        $exists = Beneficiaire::where(
            [
                ['nom', $request->nom],
                ['prenom', $request->prenom],
                ['cin', $request->cin],
                ['date_naissance', $request->date_naissance],
            ]
        )
        ->first();
        if ($exists) {
            $result = null;
            $msg = 'Bénéficiaire dèjá existe.';
            $status = 409;
        } else {   
            $beneficiaire = new Beneficiaire;
            $code = "";
            do {
                global $code;
                $code = "";
                for ($i=0; $i < 6; $i++) { 
                    $code .= strval(rand(0, 9));
                }
            } while (Beneficiaire::where('code', $code)->first());
            $beneficiaire->code = $code;
            $beneficiaire->nb_dosier = $request->nb_dossier;
            $beneficiaire->prenom = $request->prenom;
            $beneficiaire->nom = $request->nom;
            $beneficiaire->date_naissance = $request->date_naissance;
            $beneficiaire->adresse = $request->adresse;
            $beneficiaire->sexe = $request->sexe;
            $beneficiaire->cin = $request->cin;
            $beneficiaire->telephone = $request->telephone;
            $beneficiaire->created_at = $request->created_at;
            // $beneficiaire->type_travail = $request->type_travail;
            $beneficiaire->niveau_scolaire = $request->niveau_scolaire;
            $beneficiaire->situation_familial = $request->situation_familial;
            $beneficiaire->orphelin = $request->orphelin;
            $beneficiaire->profession = $request->profession;
            $beneficiaire->zone_habitation = $request->zone_habitation;
            $beneficiaire->localisation = $request->localisation;
            $beneficiaire->famille_informee = $request->famille_informee;
            $beneficiaire->famille_integre = $request->famille_integre;
            $beneficiaire->addiction_cause = $request->addiction_cause;
            $beneficiaire->age_debut_addiction = $request->age_debut_addiction;
            $beneficiaire->duree_addiction = $request->duree_addiction;
            $beneficiaire->unite_addiction = $request->unite_addiction;
            $beneficiaire->ts = $request->ts;
            if (Auth::user()->registred_beneficiaires()->save($beneficiaire)) {
                // give an appointment
                if ($request->has('social_visite_date')) {
                    $social_visite = new SocialeVisite;
                    $social_visite->visite_date = $request->social_visite_date;
                    $beneficiaire->sociale_visites()->save($social_visite);
                }
                $result = $beneficiaire;
                $msg = 'Bénéficiaire ajouté avec success.';
                $status = 200;
            } else {
                $result = null;
                $status = 500;
                $msg = 'probleme au serveur.';
            }
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
                'status' => $status,
                'validate' => (Auth::user()->social_assistant ? Auth::id() : null),
            ],
            $status
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiaire $beneficiaire)
    {
        return $this->edit($beneficiaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiaire $beneficiaire)
    {
        $couvertures = Couverture::all();
        $drogue_types = DrogueType::all();
        $services = Service::all();
        $violence_types = ViolenceType::all();
        $zones = Zone::all();
        $cases = Cas::all();
        return view('interTerrain.modifier', compact(
            'beneficiaire',
            'couvertures',
            'drogue_types',
            'services',
            'violence_types',
            'zones',
            'cases',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BeneficiaireRequest $request
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function update(BeneficiaireRequest $request, Beneficiaire $beneficiaire)
    {
        $exists = Beneficiaire::where(
            [
                ['nom', $request->nom],
                ['prenom', $request->prenom],
                ['cin', $request->cin],
                ['date_naissance', $request->date_naissance],
                ['id', '<>', $beneficiaire->id],
            ]
        )
        ->first();
        if ($exists) {
            $result = null;
            $msg = 'Bénéficiaire dèjá existe.';
            $status = 409;
        }else {
            $beneficiaire->nb_dosier = $request->nb_dossier;
            $beneficiaire->prenom = $request->prenom;
            $beneficiaire->nom = $request->nom;
            $beneficiaire->date_naissance = $request->date_naissance;
            $beneficiaire->adresse = $request->adresse;
            $beneficiaire->sexe = $request->sexe;
            $beneficiaire->cin = $request->cin;
            $beneficiaire->telephone = $request->telephone;
            // $beneficiaire->type_travail = $request->type_travail;
            $beneficiaire->created_at = $request->created_at;
            $beneficiaire->niveau_scolaire = ($request->has('niveau_scolaire'))? $request->niveau_scolaire : $beneficiaire->niveau_scolaire;
            $beneficiaire->situation_familial = ($request->has('situation_familial'))? $request->situation_familial : $beneficiaire->situation_familial;
            $beneficiaire->orphelin = ($request->has('orphelin'))? $request->orphelin : $beneficiaire->orphelin;
            $beneficiaire->profession = ($request->has('profession'))? $request->profession : $beneficiaire->profession;
            $beneficiaire->zone_habitation = ($request->has('zone_habitation'))? $request->zone_habitation: $beneficiaire->zone_habitation;
            $beneficiaire->localisation = ($request->has('localisation'))? $request->localisation : $beneficiaire->localisation;
            $beneficiaire->famille_informee = ($request->has('famille_informee'))? $request->famille_informee : $beneficiaire->famille_informee;
            $beneficiaire->famille_integre = ($request->has('famille_integre'))? $request->famille_integre : $beneficiaire->famille_integre;
            $beneficiaire->addiction_cause = ($request->has('addiction_cause'))? $request->addiction_cause : $beneficiaire->addiction_cause;
            $beneficiaire->age_debut_addiction = ($request->has('age_debut_addiction'))? $request->age_debut_addiction : $beneficiaire->age_debut_addiction;
            $beneficiaire->duree_addiction = ($request->has('duree_addiction'))? $request->duree_addiction : $beneficiaire->duree_addiction;
            $beneficiaire->unite_addiction = $request->unite_addiction;
            $beneficiaire->ts = ($request->has('ts'))? $request->ts : $beneficiaire->ts;
            // update the appointment
            if ($request->has('social_visite_date')) {
                $social_visite = $beneficiaire->sociale_visites->first();
                if ($social_visite) {
                    $social_visite->visite_date = $request->social_visite_date;
                    $social_visite->save();
                } else {
                    $social_visite = new SocialeVisite;
                    $social_visite->visite_date = $request->social_visite_date;
                    $beneficiaire->sociale_visites()->save($social_visite);
                }
            }
            if ($beneficiaire->update()) {
                $result = $beneficiaire;
                $msg = 'Bénéficiaire modifié avec success.';
                $status = 200;
            } else {
                $result = null;
                $status = 500;
                $msg = 'probleme au serveur.';
            }
        }
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
                'status' => $status,
                'validate' => (Auth::user()->social_assistant ? Auth::id() : null),
            ],
            $status
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiaire $beneficiaire)
    {
        if ($beneficiaire->delete()) {
            // $result = $beneficiaire;
            // $status = 200;
            $result = 'Utilisateur supprimé avec succés';
            $status = 'success';
            $icon = 'fa-check';
        } else {
            $result = 'probleme au serveur.';
            // $status = 500;
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
        $nomOrPrenomOrCINOrCode = $request->query('criteria');
        $service = $request->query('service');
        $mois = $request->query('mois');
        $annee = $request->query('year');
        $integration = $request->query('integrated');
        if (!$nomOrPrenomOrCINOrCode && !$service && !$mois && !$annee && !$integration) {
            return redirect()->route('beneficiaires.index');
        } else {
            $beneficiaires = Beneficiaire::where(function ($query) use ($nomOrPrenomOrCINOrCode) {
                    $query->where('prenom', 'like', '%' . $nomOrPrenomOrCINOrCode . '%')
                    ->orWhere('nom', 'like', '%' . $nomOrPrenomOrCINOrCode . '%')
                    ->orWhere('cin', 'like', '%' . $nomOrPrenomOrCINOrCode . '%')
                    ->orWhere('code', 'like', '%' . $nomOrPrenomOrCINOrCode . '%');
                })
                ->when($service, function ($query, $service) {
                    $query = $query->whereRelation('services', 'service_id', $service);
                    if (!Auth::user()->admin && !Auth::user()->social_assistant) {
                        $query->whereRelation('users', 'user_id', Auth::id());
                    }
                    return $query;
                })
                ->when($integration, function ($query, $integration) {
                    return $query->where('integration_status', $integration);
                })
                ->when($mois, function ($query, $mois) {
                    return $query->whereMonth('created_at', $mois);
                })
                ->when($annee, function ($query, $annee) {
                    return $query->whereYear('created_at', $annee);
                })
                // ->dd();
                ->paginate(10)
                ->withQueryString();
            // return response()->json($users);
            return view('interTerrain.listing', compact('beneficiaires'));
        }
    }
}
