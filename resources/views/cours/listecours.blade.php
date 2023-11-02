@extends('layouts.menu')

@section('content')

    @if(auth()->user()->profil == 'admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Liste des cours</h2>
            </div>
        </div>
        <div class="row mt-4">   
            <div class="col-lg-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste de tous les cours</h4>
                  <hr>
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
                        <strong>Erreur!</strong> {{ session('messageError') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Détails</th> 
                                <th>Matiere</th> 
                                <th>Professeur</th> 
                                <th>Durée</th> 
                                <th>Etat</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                         <tbody>
                         @foreach($cours as $c)
                            <tr>
                                <td>
                                    <a href="{{ route('detailscour',['id'=> $c->id]) }}" class="btn btn-sm btn-info">
                                        <i class="mdi mdi-eye text-white"></i>
                                    </a>
                                </td>
                                <td>{{$c->matiere}}</td>
                                <td>{{$c->prof->prenom}} {{$c->prof->nom}}</td>
                                <td>{{$c->duree}}</td>
                                <td>{{$c->etat}}</td>
                                <td>
                                    <a href="{{ route('updatecours',['id'=> $c->id]) }}" data-toggle="modal" data-target="#editModal{{ $c->id }}" class="btn btn-sm btn-warning">
                                        <i class="mdi mdi-pencil-box text-white"></i>
                                    </a>
                                    <a href="{{ route ('deletecours',['id'=> $c->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce cours ?')" class="btn btn-sm btn-danger">
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
            
            <div class="col-lg-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulaire d'ajout de cours</h4>
                  <form action="{{ route('ajoutCour') }}" method="POST"  enctype="multipart/form-data">
                    @Csrf
                       
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matiere">Matière</label>
                                <input type="text" name="matiere" class="form-control" placeholder="Entrez la matière...">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="floating-label">Professeur</label>
                            <select name="id_prof" class="form-control">
                                <option  selected>selectionner un prof...</option>
                                @foreach($profs as $p)
                                    <option value="{{$p->id}}">{{ $p->prenom }}{{ $p->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="matiere">Durée</label>
                                <input type="text" name="duree" class="form-control" placeholder="Durée du cours...">
                                <input type="hidden" name="etat" value="1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="photo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""  placeholder="Importer une Image">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Importer</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" id="" cols="70" rows="5"></textarea>
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
                        <div class="col-md-12">
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
    @endif

    @if(auth()->user()->profil == 'apprenant')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Liste des cours</h2>
            </div>
        </div>
        <div class="row mt-4">   
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste de tous les cours</h4>
                  <hr>  
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Détails</th> 
                                <th>Matiere</th> 
                                <th>Professeur</th> 
                                <th>Durée</th> 
                                <th>Etat</th>
                            </tr>
                        </thead>
                         <tbody>
                         @foreach($cours as $c)
                            <tr>
                                <td>
                                    <a href="{{ route('detailscour',['id'=> $c->id]) }}" class="btn btn-sm btn-info">
                                        <i class="mdi mdi-eye text-white"></i>
                                    </a>
                                </td>
                                <td>{{$c->matiere}}</td>
                                <td>{{$c->prof->prenom}} {{$c->prof->nom}}</td>
                                <td>{{$c->duree}}</td>
                                <td>{{$c->etat}}</td>
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
    @endif


    <!-- ----------Modal -->


@foreach($cours as $c)
    <!-- Modal de modification -->
    <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Formulaire de modification de cours</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de modification -->
                    <form action="{{ route('updatecours', ['id' => $c->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="matiere">Matière</label>
                            <input type="text" name="matiere" class="form-control" value="{{ $c->matiere }}">
                        </div>
                        <div class="form-group">
                            <label class="id_prof">Professeur</label>
                            <select required name="id_prof" class="form-control">
                                <option  selected>selectionner un prof...</option>
                                @foreach($profs as $p)
                                    <option value="{{$p->id}}">{{ $p->prenom }}{{ $p->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duree">Durée</label>
                            <input type="text" name="duree" class="form-control" value="{{ $c->duree }}">
                        </div>
                        <div class="form-group">
                            <label for="etat">État</label>
                            <input type="text" name="etat" class="form-control" value="{{ $c->etat }}">
                        </div>
                        <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection


