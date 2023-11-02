@extends('layouts.menu')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Liste des Apprenants</h2>
            </div>
            
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste de tous les apprenants</h4>
                  @if(session('messageSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Succes!</strong> {{ session('messageSuccess') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                Détails
                                </th> 
                                <th>Prénom & Nom</th> 
                                <th>Email</th> 
                                <th>Téléphone</th> 
                                <th>Profil</th> 
                                <th>Etat</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                         <tbody>
                         @foreach($apprenant as $u)
                            <tr>
                                <td>
                                <a  class="btn btn-sm btn-info">
                                        <i class="mdi mdi-eye text-white"></i>
                                    </a>
                                </td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->telephone}}</td>
                                <td>{{$u->profil}}</td>
                                <td>{{$u->etat}}</td>
                                <td>
                                    <a href="{{ route('editapprenant',['id'=>$u->id]) }}" class="btn btn-sm btn-warning">
                                        <i class="mdi mdi-pencil-box text-white"></i>
                                    </a>
                                    <a href="{{ route ('deleteapprenant',['id'=> $u->id]) }}" onclick="return confirm('Voulez-vous vraiment supprimer cet apprenant ?')"  class="btn btn-sm btn-danger">
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


