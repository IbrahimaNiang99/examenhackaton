@extends('layouts.menu')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="text-center" >Formulaire de modification de professeur</h3>
                    <hr>
                    <form action="{{ route('updateprof') }}" method="post">
                        @Csrf
                        <input type="hidden" name="id" value="{{ $prof->id }}">

                        <div class="row" style="margin-top: 50px;">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="prenom"><h4>Prénom</h4></label>
                                    <input type="text" name="prenom" value="{{ $prof->prenom }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="prenom"><h4>Nom</h4></label>
                                    <input type="text" name="nom" value="{{ $prof->nom }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prenom"><h4>Adresse email</h4></label>
                                    <input type="email" name="email" value="{{ $prof->email }}"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="prenom"><h4>Numéro téléphone</h4></label>
                                    <input type="text"  name="telephone" class="form-control" value="{{ $prof->telephone }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="prenom"><h4>Etat</h4></label>
                                    <input type="text"  name="etat" class="form-control" value="{{ $prof->etat }}">
                                </div>
                            </div>
                        </div>
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
                            <div class="col-md-3 offset-4">
                                <button type="submit" class="btn btn-success form-control">Modifier</button>
                            </div>
                        </div>
                            
                    </form>

                </div>
             </div>
            </div>            
        </div>          
    </div>
@endsection

