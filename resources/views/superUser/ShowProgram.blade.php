@extends('layouts.app')

@section('title')
Liste des Programs
@endsection
@section('content_page')
    <!-- Show All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Tous Les Programs </h6>
                {{-- <a href="">Show All</a> --}}
            </div>
            <div class="table-responsive table-height">
                <table class="table text-start align-middle table-bordered table-hover mb-0" id="tableUser">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">N°</th>
                            <th>Nom du Programme</th>
                            <th>Type Du Programme</th>
                            <th colspan="2" class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_Program">
                    </tbody>
                </table>
                <!--List Place-->
                <!-- Modal -->
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_ListePlace">
                      <i class="fas fa-list"></i>
                  </button>
                <div class="modal" id="modal_ListePlace" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Liste Place</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyListe">
                                <div class="table-responsive table-heightPlace">
                                    <table class="table text-start align-middle table-bordered table-hover mb-5" id="tableUser">
                                        <thead>
                                            <tr class="text-dark">
                                                <th scope="col">N°</th>
                                                <th>Nom Place</th>   
                                                <th colspan="2" class="actions">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_place">
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                  <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                  <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                              <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>      
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>  
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                           </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                            <tr>
                                                <td>zzzzzzzz</td>
                                                <td>zzzzzzzz</td>
                                                <td class="actionEdit"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_EditPlace">
                                                    <i class="fas fa-edit"></i>
                                                </button></td>
                                                <td class="actionDelete"><button
                                                    class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                                                    data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                                                    <i class="fas fa-trash"></i>
                                                </button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!--Edit place-->
                <!-- Modal -->
                <div class="modal fade" id="modal_EditPlace" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier Place</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-bodyEdit">
                            <form class="form-user" action="" method="POST">
                                <div class="mb-3">
                                    <label for="nom-place" class="form-label">Nom Du place</label>
                                    <input type="text" name="nom-place" class="form-control" id="nom-place">
                                </div>
                                <div class="mb-3">
                                    <button id="btn-edit-place" class="btn btn-primary">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Programm-->
                <!--End Modal-->
                <!--End List Place-->
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_EditPrgrm">
                      <i class="fas fa-edit"></i>
                  </button>
                    <!--Edit Program-->
                    <!-- Modal -->
                    <div class="modal fade" id="modal_EditPrgrm" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modifier Programme</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                <form class="form-user" action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nom-program" class="form-label">Nom Du Programme</label>
                                        <input type="text" name="nom-program" class="form-control" id="nom-program">
                                    </div><div class="mb-3">
                                        <label for="type-program" class="form-label">Type Du Programme</label>
                                        <input type="text" name="type-program" class="form-control" id="type-program">
                                    </div>
                                    <div class="mb-3">
                                        <button id="btn-edit-program" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Edit Programm-->
                <!--Delete Program-->
                <!-- Modal -->
                <button
                      class="btn btn-sm btn-sm-square btn-primary m-2"type="button"
                      data-bs-toggle="modal" data-bs-target="#modal_DeleteProgram">
                      <i class="fas fa-trash"></i>
                  </button>
                <div class="modal fade" id="modal_DeleteProgram" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Confirmer Suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-bodyEdit">
                                    <div class="mb-3 mt-3">
                                        <button id="btn-delete-group" class="btn btn-secondary">Oui</button>
                                        <button class="btn btn-primary">Non</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
                <!--End Delete Program-->
            </div>
        </div>
    </div>
    <!-- Show All Users End -->
@endsection
@section('custom_scripts')
@endsection
