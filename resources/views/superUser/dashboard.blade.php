@extends('layouts.app')

@section('title')
    Dashboard
@endsection
@section('content_page')
    <div class="center-body loader">
        <div class="loader-circle-48"></div>
    </div>
    <div class="container-fluid pt-4 px-4 dash">
        <h4 class="mb-3">Dashboard</h4>
        <div class="filtre">
            <h5 for="" class="form-label">Filtre:</h5>
            <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle="modal"
                data-bs-target="#modal_filtre"><i class="fas fa-ellipsis-v"></i></button>
            <!-- Modal -->
            <div class="modal fade" id="modal_filtre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Filtres</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-bodyF">
                            <div class="filtre_item">
                                <label for="start-date" class="form-label">Date Du Début</label>
                                <input type="date" name="start_date" class="date-periode" id="start-date" value=""
                                    required>
                            </div>
                            <div class="filtre_item">
                                <label for="end-date" class="form-label">Date de la Fin</label>
                                <input type="date" name="end_date" class="date-periode" id="end-date" value=""
                                    required>
                            </div>
                            {{-- <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Programme</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">Prg1</option>
                                    <option value="">Prg2</option>
                                    <option value="">Prg3</option>
                                </select>
                            </div> --}}
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Age</label>
                                <select name="" id="age" class="filter_select">
                                    <option value="">---</option>
                                    <option value="-15">-15</option>
                                    <option value="15-18">15-18</option>
                                    <option value="+18">+18</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="intervenants" class="form-label">Filtre Par Intervenant</label>
                                <select name="" id="intervenants" class="filter_select">
                                    <option value="">---</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="gender" class="form-label">Filtre Par Genre</label>
                                <select name="" id="gender" class="filter_select">
                                    <option value="">---</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="localisation" class="form-label">Filtre Par Localisation</label>
                                <select name="" id="localisation" class="filter_select">
                                    <option value="">---</option>
                                    <option value="interne">A l'intérieur de la clôture</option>
                                    <option value="externe">A l'extérieur de la clôture</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="cin" class="form-label">Filtre Par CIN</label>
                                <select name="" id="cin" class="filter_select">
                                    <option value="">---</option>
                                    <option value="avec">Avec</option>
                                    <option value="sans">Sans</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="couvertures" class="form-label">Filtre Par Couvertures</label>
                                <select name="" id="couvertures" class="filter_select">
                                    <option value="">---</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="situation-familiale" class="form-label">Filtre Par Situation Familiale</label>
                                <select name="" id="situation-familiale" class="filter_select">
                                    <option value="">---</option>
                                    <option value="celibataire">Célibataire</option>
                                    <option value="marie">Marié</option>
                                    <option value="divorce">Divorcé</option>
                                    <option value="veuf">Veuf</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="scolarite" class="form-label">Filtre Par Scolarisation</label>
                                <select name="" id="scolarite" class="filter_select">
                                    <option value="">---</option>
                                    <option value="NON Scolarise">Non Scolarisé</option>
                                    <option value="Primaire">Primaire</option>
                                    <option value="College">Collège</option>
                                    <option value="Lycee">Lycée</option>
                                    <option value="bac">Bac</option>
                                    <option value="bac+">Bac+</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="cause-addiction" class="form-label">Filtre Par Scolarisation</label>
                                <select name="" id="cause-addiction" class="filter_select">
                                    <option value="">---</option>
                                    <option value="Famille">Famille</option>
                                    <option value="Amis">Amis</option>
                                    <option value="Entourage">Entourage</option>
                                    <option value="Autres">Autres</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="drogue-types" class="form-label">Filtre Par Types de drogue</label>
                                <select name="" id="drogue-types" class="filter_select">
                                    <option value="">---</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="services" class="form-label">Filtre Par Services</label>
                                <select name="" id="services" class="filter_select">
                                    <option value="">---</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button id="btn-filter" class="btn btn-primary">Filtrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="periode">
            <label for="start-date" class="form-label">Date Du Début</label>
            <input type="date" name="start_date" class="date-periode" id="start-date" value=""
                required>
            <label for="end-date" class="form-label">Date de la Fin</label>
            <input type="date" name="end_date" class="date-periode" id="end-date" value=""
                required>
            <div class="mb-3 d-flex justify-content-center">
                <button id="btn-date-filter" class="btn btn-primary">Séléctionner date</button>
            </div>
        </div> --}}
        <div class="statistics-both">
            {{-- Statistiques selon les programmes --}}
            <div class="mb-4" id="programme_stats">
                <h6 class="mb-3">Statistiques selon les programmes</h6>
                <div class="table-responsive table-height table-dash">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Programme</th>
                                <th>Béneficiaire</th>
                                <th>Pourcentage</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_programme">
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Statistiques selon les intervenants --}}
            <div class="mb-4" id="intervenant_stats">
                <h6 class="mb-3">Statistiques selon les intervenants</h6>
                <div class="table-responsive table-height table-dash">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Intervenant</th>
                                <th>Béneficiaire</th>
                                <th>Pourcentage</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_intervenant">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="statistics-both">
            {{-- Statistiques selon l'âge --}}
            <div class="mb-4" id="age_stats">
                <h6 class="mb-3">Statistiques selon l'âge</h6>
                <select name="" id="" onchange="chartType(this.value)" class="filter_select">
                    <option value="polarArea">PolarArea</option>
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                    <option value="doughnut">Doughnut</option>
                    <option value="pie">Pie</option>
                </select>
                <!-- BEGIN: Stastics based on age-->
                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChartAge"></canvas>
                    </div>
                </div>
                <!-- END: Stastics based on age -->
            </div>
            {{-- Statistiques selon le genre --}}
            <!-- BEGIN: Stastics based on gender -->
            <div class="mb-4" id="gender_stats">
                <h6 class="mb-3">Statistiques selon le genre</h6>
                <select name="" id="" onchange="chartGType(this.value)" class="filter_select">
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                    <option value="doughnut">Doughnut</option>
                    <option value="polarArea">PolarArea</option>
                    <option value="pie">Pie</option>
                </select>
                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChartGender"></canvas>
                    </div>
                </div>
            </div>
            <!-- END: Stastics based on gender -->
            <div class="mb-4" id="cin_stats">
                <h6 class="mb-3">Statistiques selon CIN</h6>
                <select name="" id="" onchange="chartCINType(this.value)" class="filter_select">
                    <option value="polarArea">PolarArea</option>
                    <option value="bar">Bar</option>
                    <option value="line">Line</option>
                    <option value="doughnut">Doughnut</option>
                    <option value="pie">Pie</option>
                </select>
                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChartCIN"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{-- Statistiques selon la localisation --}}
        <div class="mb-4" id="localisation_stats">
            <h6 class="mb-3">Statistiques selon la localisation</h6>
            <div class="table-responsive table-height table-dash">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Localisation</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_localisation">
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Statistiques selon la couverture médicale --}}
        <div class="mb-4" id="couverture_stats">
            <h6 class="mb-3">Statistiques selon la couverture médicale</h6>
            <div class="table-responsive table-height table-dash">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Couverture Médicale</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_couverture">
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Statistiques selon la situation familiale --}}
        <div class="mb-4" id="situation_stats">
            <h6 class="mb-3">Statistiques selon la situation familiale</h6>
            <div class="table-responsive table-height table-dash">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Situation familiale</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_situation">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="statistics-both">
            {{-- Statistiques selon CIN --}}
            <!-- BEGIN: Stastics based on gender -->
            {{-- Statistiques selon la scolarité --}}
            <div class="mb-4" id="scolarisation_stats">
                <h6 class="mb-3">Statistiques selon la Scolarité</h6>
                <select name="" id="" onchange="chartScolType(this.value)" class="filter_select">
                    <option value="pie">Pie</option>
                    <option value="line">Line</option>
                    <option value="doughnut">Doughnut</option>
                    <option value="polarArea">PolarArea</option>
                    <option value="bar">Bar</option>
                </select>
                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChartScol"></canvas>
                    </div>
                </div>
            </div>
            <!-- END: Stastics based on gender -->
            {{-- Statistiques selon Présence --}}
            <div class="mb-4" id="medicale_rdv_stats">
                <h6 class="mb-3 w-50">Statistiques selon la présence au rendez-vous Médical</h6>
                <select name="" id="" onchange="chartpresenceMedType(this.value)" class="filter_select">
                    <option value="pie">Pie</option>
                    <option value="line">Line</option>
                    <option value="doughnut">Doughnut</option>
                    <option value="polarArea">PolarArea</option>
                    <option value="bar">Bar</option>
                </select>
                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChartpresenceMed"></canvas>
                    </div>
                </div>
            </div>
            <div class="mb-4" id="sociale_rdv_stats">
                <h6 class="mb-3">Statistiques selon la présence au rendez-vous Social</h6>
                <select name="" id="" onchange="chartpresenceSocialType(this.value)"
                    class="filter_select">
                    <option value="pie">Pie</option>
                    <option value="line">Line</option>
                    <option value="doughnut">Doughnut</option>
                    <option value="polarArea">PolarArea</option>
                    <option value="bar">Bar</option>
                </select>
                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChartpresenceSocial"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4" id="cause_addiction_stats">
            <h6 class="mb-3">Statistiques selon la cause d'addiction</h6>
            <div class="cardCauseBox">
                <div class="cardCause">
                    <div>
                        <div class="numbers" id="nb_beneficiaires_famille">15</div>
                        <div class="cardName">Famille</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-house-damage"></i>
                    </div>
                </div>
                <div class="cardCause">
                    <div>
                        <div class="numbers" id="nb_beneficiaires_amis">15</div>
                        <div class="cardName">Entourage</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="cardCause">
                    <div>
                        <div class="numbers" id="nb_beneficiaires_entourage">15</div>
                        <div class="cardName">Amis</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user-friends"></i>
                    </div>
                </div>
                <div class="cardCause">
                    <div>
                        <div class="numbers" id="nb_beneficiaires_autres">15</div>
                        <div class="cardName">Autres</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-folder-plus"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- Statistiques selon Type de Drogue --}}
        <!-- BEGIN: Stastics based on gender -->
        <div class="mb-4" id="drogue_type_stats">
            <h6 class="mb-3">Statistiques selon Type de Drogue</h6>
            <select name="" id="" onchange="chartDRGType(this.value)" class="filter_select">
                <option value="bar">Bar</option>
                <option value="line">Line</option>
                <option value="doughnut">Doughnut</option>
                <option value="polarArea">PolarArea</option>
                <option value="pie">Pie</option>
            </select>
            <div class="graphBox">
                <div class="box">
                    <canvas id="myChartTypedrg"></canvas>
                </div>
            </div>
        </div>
        <!-- END: Stastics based on gender -->
        {{-- Statistiques selon le service --}}
        <div class="mb-4" id="service_stats">
            <h6 class="mb-3">Statistiques selon le service</h6>
            <div class="table-responsive table-height table-dash">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Service</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_service">
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END: Stastics based on service -->
        <div class="mb-4 d-none" id="all-stats">
            <h6 class="mb-3">Statistiques selon Tous</h6>
            <div class="cardCauseBox">
                <div class="cardCause">
                    <div>
                        <div class="numbers" id="nb_beneficiaires_all">15</div>
                        <div class="cardName">Nb beneficiaires</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
                <div class="cardCause">
                    <div>
                        <div class="numbers" id="percentage_beneficiaires_all">15</div>
                        <div class="cardName">%</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script src="{{ asset('js/my_chart.js') }}"></script>
    <script src="{{ asset('jsApi/dashboard/index.js') }}"></script>
@endsection
