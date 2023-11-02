@extends('layouts.menu')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Liste des Utilisateurs</h2>
            </div>
            <div class="col-md-2 float-right">
                <button class="btn btn-success" data-toggle="modal" data-target=".modal-ajout-medecin">Nouvel utilisateur</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste de tous les utilisateurs</h4>
                  @if(session('messageSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Réussi!</strong> {{ session('messageSuccess') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messageError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Echec!</strong> {{ session('messageError') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th> 
                                <th>Prénom & Nom</th> 
                                <th>Email</th> 
                                <th>Téléphone</th> 
                                <th>Profil</th> 
                                <th>Etat</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                         <tbody>
                         @foreach($users as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->telephone}}</td>
                                <td>{{$u->profil}}</td>
                                <td>{{$u->etat}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning">
                                        <i class="mdi mdi-pencil-box text-white"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="card-body">
  <form method="post" action="{{ route('ajoututilisateur') }}">
  @csrf
    <div class="modal fade modal-ajout-medecin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="myLargeModalLabel">Formulaire d'ajout d'utilisateur</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label">Prénom</label>
                  <input type="text"  class="form-control" name="prenom" placeholder="Prénom...">
                </div>
                @error('prenom')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" >Nom</label>
                  <input type="text" required class="form-control" name="nom" placeholder="Nom...">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="floating-label" >Adresse email</label>
                  <input type="email"  class="form-control" name="email" placeholder="Adresse email...">
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label">Téléphone</label>
                  <input required="true" type="text" class="form-control" name="telephone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label">Profil</label>
                  <select name="profil" class="form-control">
                    <option selected>select</option>
                    <option value="apprenant">Apprenant</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="floating-label">Mot de passe</label>
                  <input required="true" type="text" class="form-control" name="password">
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
            <input type="hidden" value="1" name="etat">
            <hr>
          <div class="text-center">
            <button type="submit" name="ajouter" class="btn btn-success">Ajouter</button>
            <button type="reset" class="btn btn-danger">Annuler</button>
          </div>
          </div>
        
        </div>
      </div>
    </div>
  </form>
</div>
@endsection


