@extends('layouts.app')

@section('title')
    Dashboard
@endsection
@section('content_page')
    <div class="container-fluid pt-4 px-4">
        <h4 class="mb-3">Dashboard</h4>
        <div class="filtre">
            <h5 for="" class="form-label">Filtre:</h5>
            <button type="submit" class="btn btn-sm btn-sm-square btn-primary m-2" data-bs-toggle="modal"
                data-bs-target="#modal_filtre"><i class="fas fa-ellipsis-v"></i></button>
            <!-- Modal -->
            <div class="modal fade" id="modal_filtre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Filtres</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-bodyF">
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Programme</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">Prg1</option>
                                    <option value="">Prg2</option>
                                    <option value="">Prg3</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Age</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">-15</option>
                                    <option value="">15-18</option>
                                    <option value="">+18</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Intervenant</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">-15</option>
                                    <option value="">15-18</option>
                                    <option value="">+18</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Genre</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">-15</option>
                                    <option value="">15-18</option>
                                    <option value="">+18</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Localisation</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">-15</option>
                                    <option value="">15-18</option>
                                    <option value="">+18</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Programme</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">-15</option>
                                    <option value="">15-18</option>
                                    <option value="">+18</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Programme</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">-15</option>
                                    <option value="">15-18</option>
                                    <option value="">+18</option>
                                </select>
                            </div>
                            <div class="filtre_item">
                                <label for="" class="form-label">Filtre Par Programme</label>
                                <select name="" id="" class="filter_select">
                                    <option value="">-15</option>
                                    <option value="">15-18</option>
                                    <option value="">+18</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button class="btn btn-primary">Filtrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="periode">
            <label for="social-appointment" class="form-label">Date Du Début</label>
            <input type="date" name="social_visite_date" class="date-periode" id="" value=""
                required>
            <label for="social-appointment" class="form-label">Date de la Fin</label>
            <input type="date" name="social_visite_date" class="date-periode" id="" value=""
                required>
            <div class="mb-3 d-flex justify-content-center">
                <button class="btn btn-primary">Séléctionner date</button>
            </div>
        </div>
        <div class="statistics-both">
            {{-- Statistiques selon les programmes --}}
            <div class="mb-4">
                <h6 class="mb-3">Statistiques selon les programmes</h6>
                <div class="table-responsive table-height">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Programme</th>
                                <th>Béneficiaire</th>
                                <th>Pourcentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Statistiques selon les intervenants --}}
            <div class="mb-4">
                <h6 class="mb-3">Statistiques selon les intervenants</h6>
                <div class="table-responsive table-height">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Intervenant</th>
                                <th>Béneficiaire</th>
                                <th>Pourcentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                            <tr>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                                <td>fdfdfd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="statistics-both">
            {{-- Statistiques selon l'âge --}}
            <div class="mb-4">
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
            <div class="mb-4">
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
            <div class="mb-4">
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
        <div class="mb-4">
            <h6 class="mb-3">Statistiques selon la localisation</h6>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Localisation</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Statistiques selon la couverture médicale --}}
        <div class="mb-4">
            <h6 class="mb-3">Statistiques selon la couverture médicale</h6>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Couverture Médicale</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>RAMED</td>
                            <td>12</td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td>CNSS</td>
                            <td>12</td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td>CNOPS</td>
                            <td>12</td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td>AMO</td>
                            <td>12</td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td>Sans</td>
                            <td>12</td>
                            <td>20%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Statistiques selon la situation familiale --}}
        <div class="mb-4">
            <h6 class="mb-3">Statistiques selon la situation familiale</h6>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Situation familiale</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="statistics-both">
            {{-- Statistiques selon CIN --}}
            <!-- BEGIN: Stastics based on gender -->
            {{-- Statistiques selon la scolarité --}}
            <div class="mb-4">
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
            <div class="mb-4">
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
            <div class="mb-4">
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
        <div class="mb-4">
            <h6 class="mb-3">Statistiques selon la cause d'addiction</h6>
            <div class="cardCauseBox">
                <div class="cardCause">
                    <div>
                        <div class="numbers">15</div>
                        <div class="cardName">Famille</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-house-damage"></i>
                    </div>
                </div>
                <div class="cardCause">
                    <div>
                        <div class="numbers">15</div>
                        <div class="cardName">Entourage</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="cardCause">
                    <div>
                        <div class="numbers">15</div>
                        <div class="cardName">Amis</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-user-friends"></i>
                    </div>
                </div>
                <div class="cardCause">
                    <div>
                        <div class="numbers">15</div>
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
        <div class="mb-4">
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
        <div class="mb-4">
            <h6 class="mb-3">Statistiques selon le service</h6>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Service</th>
                            <th>Béneficiaire</th>
                            <th>Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('custom_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script src="{{ asset('js/my_chart.js') }}"></script>
@endsection
