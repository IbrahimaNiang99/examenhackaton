@extends('layouts.menu')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="text-center" >Formulaire d'ajout de professeur</h3>
                    <hr>
                    <form action="{{ route('ajout') }}" method="post">
                        @Csrf
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="prenom"><h4>Prénom</h4></label>
                                    <input type="text" name="prenom" placeholder="Entrez le prénom du prof..." class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="prenom"><h4>Nom</h4></label>
                                    <input type="text" name="nom" placeholder="Entrez le nom du prof..." class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prenom"><h4>Adresse email</h4></label>
                                    <input type="email" name="email" placeholder="Entrez l'email du prof..." class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prenom"><h4>Numéro téléphone</h4></label>
                                    <input type="text"  name="telephone" placeholder="Entrez le numéro de téléphone du prof..." class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="etat" value="1">
                        @if(session('messageError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Alert!</strong> {{ session('messageError') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-3 offset-5">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                                <button type="reset" class="btn btn-danger">Annuler</button>
                            </div>
                        </div>
                            
                    </form>

                </div>
             </div>
            </div>            
        </div>          
    </div>
@endsection

