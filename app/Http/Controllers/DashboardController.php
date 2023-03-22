<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\Couverture;
use App\Models\DrogueType;
use App\Models\Intervenant;
use App\Models\Programme;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function beneficiairesPerProgramme(Request $request, Programme $programme)
    {
        $nb_beneficiaires = $programme->loadSum(['places as result' => function ($query) use ($request) {
            $query->when($request->start_date, function ($query, $start_date) {
                return $query->where('programme_date', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('programme_date', '<=', $end_date);
            });
        }], 'programme_resultat')->result;
        return [
            'nb_beneficiaires' => $nb_beneficiaires,
        ];
    }
    public function beneficiairesPerIntervenant(Request $request, Intervenant $intervenant)
    {
        $nb_beneficiaires = $intervenant->user->loadCount(['registred_beneficiaires as nb_beneficiaires' => function ($query) use ($request) {
            $query->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            });
        }])->nb_beneficiaires;
        return [
            'nb_beneficiaires' => $nb_beneficiaires,
        ];
    }
    public function beneficiairesPerAge(Request $request)
    {
        $nb_beneficiaires_younger_than_15 = Beneficiaire::whereRaw('(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_between_15_and_18 = Beneficiaire::whereRaw('(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_older_than_18 = Beneficiaire::whereRaw('(YEAR(NOW()) - YEAR(`date_naissance`) > 18)')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_younger_than_15' => $nb_beneficiaires_younger_than_15,
            'nb_beneficiaires_between_15_and_18' => $nb_beneficiaires_between_15_and_18,
            'nb_beneficiaires_older_than_18' => $nb_beneficiaires_older_than_18,
        ];
    }
    public function beneficiairesPerGender(Request $request)
    {
        $nb_beneficiaires_homme = Beneficiaire::where('sexe', 'Homme')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_femme = Beneficiaire::where('sexe', 'Femme')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_homme' => $nb_beneficiaires_homme,
            'nb_beneficiaires_femme' => $nb_beneficiaires_femme,
        ];
    }
    public function beneficiairesPerCIN(Request $request)
    {
        $nb_beneficiaires_sans = Beneficiaire::whereDoesntHave('cas', function (Builder $query) {
            $query->where('cas_nom', 'CIN');
        })
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_avec = Beneficiaire::whereRelation('cas','cas_nom', 'CIN')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_avec' => $nb_beneficiaires_avec,
            'nb_beneficiaires_sans' => $nb_beneficiaires_sans,
        ];
    }
    public function beneficiairesPerLocalisation(Request $request)
    {
        $nb_beneficiaires_interne = Beneficiaire::where('localisation', 'interne')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_externe = Beneficiaire::where('localisation', 'externe')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_interne' => $nb_beneficiaires_interne,
            'nb_beneficiaires_externe' => $nb_beneficiaires_externe,
        ];
    }
    public function beneficiairesPerCouvertureMedicale(Request $request, Couverture $couverture)
    {
        $nb_beneficiaires = $couverture->loadCount(['beneficiaires' => function ($query) use ($request) {
            $query->when($request->start_date, function ($query, $start_date) {
                return $query->where('beneficiaires.created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('beneficiaires.created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            });
        }])->beneficiaires_count;
        return [
            'nb_beneficiaires' => $nb_beneficiaires,
        ];
    }
    public function beneficiairesPerSituationFamiliale(Request $request)
    {
        $nb_beneficiaires_celibataire = Beneficiaire::where('situation_familial', 'celibataire')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_marie = Beneficiaire::where('situation_familial', 'marie')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_divorce = Beneficiaire::where('situation_familial', 'divorce')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_veuf = Beneficiaire::where('situation_familial', 'veuf')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_celibataire' => $nb_beneficiaires_celibataire,
            'nb_beneficiaires_marie' => $nb_beneficiaires_marie,
            'nb_beneficiaires_divorce' => $nb_beneficiaires_divorce,
            'nb_beneficiaires_veuf' => $nb_beneficiaires_veuf,
        ];
    }
    public function beneficiairesPerScolarisation(Request $request)
    {
        $nb_beneficiaires_non_scolarise = Beneficiaire::where('niveau_scolaire', 'NON Scolarise')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_primaire = Beneficiaire::where('niveau_scolaire', 'Primaire')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_college = Beneficiaire::where('niveau_scolaire', 'College')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_lycee = Beneficiaire::where('niveau_scolaire', 'Lycee')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_bac = Beneficiaire::where('niveau_scolaire', 'bac')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_bac_plus = Beneficiaire::where('niveau_scolaire', 'bac+')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_non_scolarise' => $nb_beneficiaires_non_scolarise,
            'nb_beneficiaires_primaire' => $nb_beneficiaires_primaire,
            'nb_beneficiaires_college' => $nb_beneficiaires_college,
            'nb_beneficiaires_lycee' => $nb_beneficiaires_lycee,
            'nb_beneficiaires_bac' => $nb_beneficiaires_bac,
            'nb_beneficiaires_bac_plus' => $nb_beneficiaires_bac_plus,
        ];
    }
    public function beneficiairesPerVisitesMedicalesPresence(Request $request)
    {
        $nb_beneficiaires_presents = Beneficiaire::whereHas('medicale_visites', function (Builder $query) use ($request) {
            $query->where('visite_presence', 1)
                ->when($request->start_date, function ($query, $start_date) {
                    return $query->where('visite_date', '>=', $start_date);
                })
                ->when($request->end_date, function ($query, $end_date) {
                    return $query->where('visite_date', '<=', $end_date);
                });
        })
        ->when($request->intervenant, function ($query, $intervenant) {
            return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                $query->where('intervenants.id', $intervenant);
            });
        })
        ->when($request->age, function ($query, $age) {
            if ($age == '-15') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
            }elseif ($age == '15-18') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
            }elseif ($age == '+18') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
            }
            return isset($condition)? $query->whereRaw($condition) : $query;
        })
        ->when($request->gender, function ($query, $gender) {
            return $query->where('sexe', $gender);
        })
        ->when($request->localisation, function ($query, $localisation) {
            return $query->where('localisation', $localisation);
        })
        ->when($request->cin, function ($query, $cin) {
            if ($cin == 'sans') {
                return $query->whereDoesntHave('cas', function (Builder $query) {
                    $query->where('cas_nom', 'CIN');
                });
            } elseif ($cin == 'avec') {
                return $query->whereRelation('cas','cas_nom', 'CIN');
            }else{
                return $query;
            }
        })
        ->when($request->couvertures, function ($query, $couvertures) {
            return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
        })
        ->when($request->situation_familiale, function ($query, $situation_familiale) {
            return $query->where('situation_familial', $situation_familiale);
        })
        ->when($request->scolarite, function ($query, $scolarite) {
            return $query->where('niveau_scolaire', $scolarite);
        })
        ->when($request->cause_addiction, function ($query, $cause_addiction) {
            return $query->where('addiction_cause', $cause_addiction);
        })
        ->when($request->drogue_type, function ($query, $drogue_type) {
            return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
        })
        ->when($request->service, function ($query, $service) {
            return $query->whereRelation('services', 'services.id', $service);
        })
        ->count();
        $nb_beneficiaires_absents = Beneficiaire::whereHas('medicale_visites', function (Builder $query) use ($request) {
            $query->where('visite_presence', 0)
                ->when($request->start_date, function ($query, $start_date) {
                    return $query->where('visite_date', '>=', $start_date);
                })
                ->when($request->end_date, function ($query, $end_date) {
                    return $query->where('visite_date', '<=', $end_date);
                });
        })
        ->count();
        return [
            'nb_beneficiaires_presents' => $nb_beneficiaires_presents,
            'nb_beneficiaires_absents' => $nb_beneficiaires_absents,
        ];
    }
    public function beneficiairesPerVisitesSocialesPresence(Request $request)
    {
        $nb_beneficiaires_presents = Beneficiaire::whereHas('sociale_visites', function (Builder $query) use ($request) {
            $query->where('visite_presence', 1)
                ->when($request->start_date, function ($query, $start_date) {
                    return $query->where('visite_date', '>=', $start_date);
                })
                ->when($request->end_date, function ($query, $end_date) {
                    return $query->where('visite_date', '<=', $end_date);
                });
        })
        ->when($request->intervenant, function ($query, $intervenant) {
            return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                $query->where('intervenants.id', $intervenant);
            });
        })
        ->when($request->age, function ($query, $age) {
            if ($age == '-15') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
            }elseif ($age == '15-18') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
            }elseif ($age == '+18') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
            }
            return isset($condition)? $query->whereRaw($condition) : $query;
        })
        ->when($request->gender, function ($query, $gender) {
            return $query->where('sexe', $gender);
        })
        ->when($request->localisation, function ($query, $localisation) {
            return $query->where('localisation', $localisation);
        })
        ->when($request->cin, function ($query, $cin) {
            if ($cin == 'sans') {
                return $query->whereDoesntHave('cas', function (Builder $query) {
                    $query->where('cas_nom', 'CIN');
                });
            } elseif ($cin == 'avec') {
                return $query->whereRelation('cas','cas_nom', 'CIN');
            }else{
                return $query;
            }
        })
        ->when($request->couvertures, function ($query, $couvertures) {
            return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
        })
        ->when($request->situation_familiale, function ($query, $situation_familiale) {
            return $query->where('situation_familial', $situation_familiale);
        })
        ->when($request->scolarite, function ($query, $scolarite) {
            return $query->where('niveau_scolaire', $scolarite);
        })
        ->when($request->cause_addiction, function ($query, $cause_addiction) {
            return $query->where('addiction_cause', $cause_addiction);
        })
        ->when($request->drogue_type, function ($query, $drogue_type) {
            return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
        })
        ->when($request->service, function ($query, $service) {
            return $query->whereRelation('services', 'services.id', $service);
        })
        ->count();
        $nb_beneficiaires_absents = Beneficiaire::whereHas('sociale_visites', function (Builder $query) use ($request) {
            $query->where('visite_presence', 0)
                ->when($request->start_date, function ($query, $start_date) {
                    return $query->where('visite_date', '>=', $start_date);
                })
                ->when($request->end_date, function ($query, $end_date) {
                    return $query->where('visite_date', '<=', $end_date);
                });
        })
        ->when($request->intervenant, function ($query, $intervenant) {
            return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                $query->where('intervenants.id', $intervenant);
            });
        })
        ->when($request->age, function ($query, $age) {
            if ($age == '-15') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
            }elseif ($age == '15-18') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
            }elseif ($age == '+18') {
                $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
            }
            return isset($condition)? $query->whereRaw($condition) : $query;
        })
        ->when($request->gender, function ($query, $gender) {
            return $query->where('sexe', $gender);
        })
        ->when($request->localisation, function ($query, $localisation) {
            return $query->where('localisation', $localisation);
        })
        ->when($request->cin, function ($query, $cin) {
            if ($cin == 'sans') {
                return $query->whereDoesntHave('cas', function (Builder $query) {
                    $query->where('cas_nom', 'CIN');
                });
            } elseif ($cin == 'avec') {
                return $query->whereRelation('cas','cas_nom', 'CIN');
            }else{
                return $query;
            }
        })
        ->when($request->couvertures, function ($query, $couvertures) {
            return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
        })
        ->when($request->situation_familiale, function ($query, $situation_familiale) {
            return $query->where('situation_familial', $situation_familiale);
        })
        ->when($request->scolarite, function ($query, $scolarite) {
            return $query->where('niveau_scolaire', $scolarite);
        })
        ->when($request->cause_addiction, function ($query, $cause_addiction) {
            return $query->where('addiction_cause', $cause_addiction);
        })
        ->when($request->drogue_type, function ($query, $drogue_type) {
            return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
        })
        ->when($request->service, function ($query, $service) {
            return $query->whereRelation('services', 'services.id', $service);
        })
        ->count();
        return [
            'nb_beneficiaires_presents' => $nb_beneficiaires_presents,
            'nb_beneficiaires_absents' => $nb_beneficiaires_absents,
        ];
    }
    public function beneficiairesPerCauseAddiction(Request $request)
    {
        $nb_beneficiaires_famille = Beneficiaire::where('addiction_cause', 'Famille')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_amis = Beneficiaire::where('addiction_cause', 'Amis')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_entourage = Beneficiaire::where('addiction_cause', 'Entourage')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        $nb_beneficiaires_autres = Beneficiaire::where('addiction_cause', 'Autres')
            ->when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_famille' => $nb_beneficiaires_famille,
            'nb_beneficiaires_amis' => $nb_beneficiaires_amis,
            'nb_beneficiaires_entourage' => $nb_beneficiaires_entourage,
            'nb_beneficiaires_autres' => $nb_beneficiaires_autres,
        ];
    }
    public function beneficiairesPerTypeDrogue(Request $request, DrogueType $drogueType)
    {
        $nb_beneficiaires = $drogueType->loadCount(['beneficiaires' => function ($query) use ($request) {
            $query->when($request->start_date, function ($query, $start_date) {
                return $query->where('beneficiaires.created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('beneficiaires.created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            });
        }])->beneficiaires_count;
        return [
            'nb_beneficiaires' => $nb_beneficiaires,
        ];
    }
    public function beneficiairesPerService(Request $request, Service $service)
    {
        $nb_beneficiaires = $service->loadCount(['beneficiaires' => function ($query) use ($request) {
            $query->when($request->start_date, function ($query, $start_date) {
                return $query->where('beneficiaires.created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('beneficiaires.created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            });
        }])->beneficiaires_count;
        return [
            'nb_beneficiaires' => $nb_beneficiaires,
        ];
    }
    public function beneficiairesPerAll(Request $request)
    {
        $nb_beneficiaires = Beneficiaire::when($request->start_date, function ($query, $start_date) {
                return $query->where('created_at', '>=', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->where('created_at', '<=', $end_date);
            })
            ->when($request->intervenant, function ($query, $intervenant) {
                return $query->whereHas('user.intervenant', function (Builder $query) use ($intervenant) {
                    $query->where('intervenants.id', $intervenant);
                });
            })
            ->when($request->age, function ($query, $age) {
                if ($age == '-15') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) <= 15)';
                }elseif ($age == '15-18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 15) AND (YEAR(NOW()) - YEAR(`date_naissance`) <= 18)';
                }elseif ($age == '+18') {
                    $condition = '(YEAR(NOW()) - YEAR(`date_naissance`) > 18)';
                }
                return isset($condition)? $query->whereRaw($condition) : $query;
            })
            ->when($request->gender, function ($query, $gender) {
                return $query->where('sexe', $gender);
            })
            ->when($request->localisation, function ($query, $localisation) {
                return $query->where('localisation', $localisation);
            })
            ->when($request->cin, function ($query, $cin) {
                if ($cin == 'sans') {
                    return $query->whereDoesntHave('cas', function (Builder $query) {
                        $query->where('cas_nom', 'CIN');
                    });
                } elseif ($cin == 'avec') {
                    return $query->whereRelation('cas','cas_nom', 'CIN');
                }else{
                    return $query;
                }
            })
            ->when($request->couvertures, function ($query, $couvertures) {
                return $query->whereRelation('couvertures', 'couvertures.id', $couvertures);
            })
            ->when($request->situation_familiale, function ($query, $situation_familiale) {
                return $query->where('situation_familial', $situation_familiale);
            })
            ->when($request->scolarite, function ($query, $scolarite) {
                return $query->where('niveau_scolaire', $scolarite);
            })
            ->when($request->cause_addiction, function ($query, $cause_addiction) {
                return $query->where('addiction_cause', $cause_addiction);
            })
            ->when($request->drogue_type, function ($query, $drogue_type) {
                return $query->whereRelation('drogue_types', 'drogue_types.id', $drogue_type);
            })
            ->when($request->service, function ($query, $service) {
                return $query->whereRelation('services', 'services.id', $service);
            })
            ->count();
        return [
            'nb_beneficiaires_all' => $nb_beneficiaires,
        ];
    }
}
