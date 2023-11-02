@extends('layouts.menu')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Liste des professeurs</h2>
            </div>
            <div class="col-md-2 float-right">
                <a href="{{ route('formulaireAjoutprof') }}" class="btn btn-success">  Ajouter professeur </a>
            </div>
        </div>
        <div class="row mt-4">
            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste de tous les professeurs</h4>
                  
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
                        <strong>Erreur !</strong> {{ session('messageError') }}
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
                                <th>id</th> 
                                <th>Prénom</th> 
                                <th>Nom</th> 
                                <th>Email</th> 
                                <th>Téléphone</th> 
                                <th>Etat</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                         <tbody>
                         @foreach($profs as $p)
                            <tr>
                                <td>
                                    <a href="{{ route('detailsprof',['id'=> $p->id]) }}" class="btn btn-sm btn-info">
                                        <i class="mdi mdi-eye text-white"></i> 
                                    </a>
                                </td>
                                <td>{{$p->id}}</td>
                                <td>{{$p->prenom}}</td>
                                <td>{{$p->nom}}</td>
                                <td>{{$p->email}}</td>
                                <td>{{$p->telephone}}</td>
                                <td>
                                    @if($p->etat == 1)
                                        <a href="{{ route('changeretatprof',['id'=> $p->id]) }}" onclick="return confirm('Voulez-vous vraiment désactiver ce professeur ?')" class="btn btn-sm btn-success">
                                            <i class="mdi mdi-check-circle text-white"> Actif</i> 
                                        </a>
                                    @endif
                                    @if($p->etat == 0)
                                        <a href="{{ route('changeretatprof',['id'=> $p->id]) }}" onclick="return confirm('Voulez-vous vraiment activer ce professeur ?')" class="btn btn-sm btn-danger">
                                            <i class="mdi mdi-close-circle text-white"> Inactif</i> 
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editprof', ['id'=> $p->id]) }}" class="btn btn-sm btn-warning">
                                        <i class="mdi mdi-pencil-box text-white"></i>
                                    </a>
                                    <a href="{{ route ('deleteprof',['id'=> $p->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce professeur ?')" class="btn btn-sm btn-danger">
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
   
@endsection


