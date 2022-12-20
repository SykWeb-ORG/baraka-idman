<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeneficiaireRequest;
use App\Models\Beneficiaire;
use App\Models\Couverture;
use App\Models\DrogueType;
use App\Models\Service;
use App\Models\SocialeVisite;
use App\Models\SuicideCause;
use App\Models\ViolenceType;
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
        $beneficiaires = Beneficiaire::all();
        return view('interTerrain.listing', compact('beneficiaires'));
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
        $beneficiaire = new Beneficiaire;
        $beneficiaire->code = Hash::make('ccc');
        $beneficiaire->prenom = $request->prenom;
        $beneficiaire->nom = $request->nom;
        $beneficiaire->adresse = $request->adresse;
        $beneficiaire->sexe = $request->sexe;
        $beneficiaire->cin = $request->cin;
        $beneficiaire->telephone = $request->telephone;
        $beneficiaire->type_travail = $request->type_travail;
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
        $beneficiaire->ts = $request->ts;
        // if (Auth::user()->intervenant->beneficiaires()->save($beneficiaire)) {
        //     $result = $beneficiaire;
        //     $status = 200;
        // } else {
        //     $result = 'probleme au serveur.';
        //     $status = 500;
        // }
        // return response()->json($result, $status);
        if (Auth::user()->intervenant->beneficiaires()->save($beneficiaire)) {
            // couvertures attachement
            $beneficiaire->couvertures()->attach($request->couvertures);
            // drogue types attachement
            $indexes = [];
            $drogue_types = [];
            foreach ($request->drogue_types as $drogue_type) {
                $index_and_drogue_type = Str::of($drogue_type)->explode(',');
                $index_to_add = $index_and_drogue_type->get(1);
                $indexes[$index_to_add] = $index_to_add;
                $drogue_types[] = $index_and_drogue_type->get(0);
            }
            $frequences = [];
            for ($i=0; $i < count($request->frequences); $i++) {
                if (!Arr::exists($indexes, strval($i))) {
                    continue;
                }
                $frequences[] = ($request->frequences[$i])? $request->frequences[$i] : 0;
            }
            for ($i=0; $i < count($drogue_types); $i++) {
                $frequence = ['frequence' => $frequences[$i]];
                $beneficiaire->drogue_types()->attach($drogue_types[$i], $frequence);
            }
            // violence types attachement
            $beneficiaire->violence_types()->attach($request->violence_types);
            // suicide causes attachement
            if ($request->suicide_causes != '') {
                $suicide_cause = new SuicideCause;
                $suicide_cause->cause = $request->suicide_causes;
                $beneficiaire->suicide_causes()->save($suicide_cause);
            }
            // services attachement
            $beneficiaire->services()->attach($request->services);
            // give an appointment
            $social_visite = new SocialeVisite;
            $social_visite->visite_date = $request->social_visite_date;
            $beneficiaire->sociale_visites()->save($social_visite);
            // $result = $beneficiaire;
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
        // return response()->json($result, $status);
        $request->session()->flash('msg', $result);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
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
        return view('interTerrain.modifier', compact(
            'beneficiaire',
            'couvertures',
            'drogue_types',
            'services',
            'violence_types',
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
        $beneficiaire->prenom = $request->prenom;
        $beneficiaire->nom = $request->nom;
        $beneficiaire->adresse = $request->adresse;
        $beneficiaire->sexe = $request->sexe;
        $beneficiaire->cin = $request->cin;
        $beneficiaire->telephone = $request->telephone;
        $beneficiaire->type_travail = $request->type_travail;
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
        $beneficiaire->ts = $request->ts;
        if ($beneficiaire->update()) {
            // couvertures attachement
            $beneficiaire->couvertures()->detach();
            $beneficiaire->couvertures()->attach($request->couvertures);
            // drogue types attachement
            if ($request->has('drogue_types')) {
                $beneficiaire->drogue_types()->detach();
                $indexes = [];
                $drogue_types = [];
                foreach ($request->drogue_types as $drogue_type) {
                    $index_and_drogue_type = Str::of($drogue_type)->explode(',');
                    $index_to_add = $index_and_drogue_type->get(1);
                    $indexes[$index_to_add] = $index_to_add;
                    $drogue_types[] = $index_and_drogue_type->get(0);
                }
                $frequences = [];
                for ($i=0; $i < count($request->frequences); $i++) {
                    if (!Arr::exists($indexes, strval($i))) {
                        continue;
                    }
                    $frequences[] = ($request->frequences[$i])? $request->frequences[$i] : 0;
                }
                for ($i=0; $i < count($drogue_types); $i++) {
                    $frequence = ['frequence' => $frequences[$i]];
                    $beneficiaire->drogue_types()->attach($drogue_types[$i], $frequence);
                }
            }
            // violence types attachement
            $beneficiaire->violence_types()->attach($request->violence_types);
            // suicide causes attachement
            $beneficiaire->suicide_causes()->delete();
            if ($request->suicide_causes != '') {
                $suicide_cause = new SuicideCause;
                $suicide_cause->cause = $request->suicide_causes;
                $beneficiaire->suicide_causes()->save($suicide_cause);
            }
            // services attachement
            $beneficiaire->services()->detach();
            $beneficiaire->services()->attach($request->services);
            // update the appointment
            if ($request->has('social_visite_date')) {
                $social_visite = SocialeVisite::find(1);
                if ($social_visite) {
                    $social_visite->visite_date = $request->social_visite_date;
                    $social_visite->save();
                }
            }
            // $result = $beneficiaire;
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
        // return response()->json($result, $status);
        $request->session()->flash('msg', $result);
        $request->session()->flash('status', $status);
        $request->session()->flash('icon', $icon);
        return back();
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
}
