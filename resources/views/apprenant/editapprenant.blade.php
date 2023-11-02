@extends('layouts.menu')

@section('content')
    <div class="container-fluid">
        
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Formulaire de modification d'apprenant</h2>
                    </div>
                </div>
            </div>
               <div class="card-body">
                <form action="{{ route('updateapprenant') }}" method="post">
                    @Csrf
                    <input type="hidden" name="id" value="{{ $app->id }}">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="floating-label">Prénom & Nom de l'apprenant</label>
                            <input type="text"  class="form-control" name="name" value="{{ $app->name }}">
                            </div>
                           
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="floating-label" >Adresse email</label>
                            <input type="email"  class="form-control" name="email" value="{{ $app->email }}">
                            </div>
                        </div>
                        
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="floating-label">Téléphone</label>
                            <input required="true" type="text" value="{{ $app->telephone }}" class="form-control" name="telephone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="floating-label">Profil</label>
                            <input type="text" disabled value="{{ $app->profil }}" class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <!-- <div class="col-md-10">
                            <div class="form-group">
                            <label class="floating-label">Mot de passe</label>
                            <input required="true" type="text" class="form-control" name="password">
                            </div>
                        </div> -->
                        <div class="col-md-2">
                            <div class="form-group">
                            <label class="floating-label">Etat</label>
                            <input required="true" type="text" class="form-control" name="etat" value="{{ $app->etat }}">
                            </div>
                        </div>
                        </div>
                        <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="floating-label">Mot de passe</label>
                            <input required="true" type="text" class="form-control" name="password">
                            </div>
                        </div>
                        </div> -->
                        @if(session('messageError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Alert!</strong> {{ session('messageError') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </div>
                </form>
               </div>
            </div>
        </div>
    </div>
@endsection

