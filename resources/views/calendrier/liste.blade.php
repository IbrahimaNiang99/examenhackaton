@extends('layouts.menu')

@section('content')

   @if(auth()->user()->profil == 'admin')
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Calendrier des cours </h2>
            </div>
            
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Calendrier de tous les cours</h4>
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
                                <th>Jour</th>
                                <th>Heure de début</th>
                                <th>Heure de fin</th>
                                <th>Nom du cours</th>
                                <th>Professeur</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cals as $course)
                            <tr>
                                <td>{{ $course->jour }}</td>
                                <td>{{ $course->heuredebut }}</td>
                                <td>{{ $course->heurefin }}</td>
                                <td>{{ $course->cours }}</td>
                                <td>{{ $course->professeur }}</td>
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
                  <h4 class="card-title">Formulaire d'ajout</h4>
                  <form action="{{ route('ajoutCalendar') }}" method="post">
                    @Csrf
                       
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matiere">Jour</label>
                                <select required name="jour" class="form-control">
                                    <option  selected>selectionner un jour...</option>
                                    <option value="Lundi">Lundi</option>
                                    <option value="Mardi">Mardi</option>
                                    <option value="Mercredi">Mercredi</option>
                                    <option value="Jeudi">Jeudi</option>
                                    <option value="Vendredi">Vendredi</option>
                                    <option value="Samedi">Samedi</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="floating-label">Heure début</label>
                            <input type="time" class="form-control" name="heuredebut">
                        </div>
                        <div class="col-md-6">
                            <label class="floating-label">Heure fin</label>
                            <input type="time" class="form-control" name="heurefin">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matiere">Cours</label>
                                <select required name="cours" class="form-control">
                                    <option  selected>selectionner un cour...</option>
                                    @foreach($cours as $c)
                                        <option value="{{ $c->matiere }}">{{ $c->matiere }}</option>
                                    @endforeach
                                    
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matiere">Professeur</label>
                                <select required name="professeur" class="form-control">
                                    <option  selected>selectionner un professeur...</option>
                                    @foreach($profs as $prof)
                                        <option value="{{ $prof->prenom.' '.$prof->prenom }}">{{ $prof->prenom.' '.$prof->prenom }}</option>
                                    @endforeach
                            </select>
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
                <h2>Calendrier des cours </h2>
            </div>
            
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Calendrier de tous les cours</h4>
                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Jour</th>
                                <th>Heure de début</th>
                                <th>Heure de fin</th>
                                <th>Nom du cours</th>
                                <th>Professeur</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cals as $course)
                            <tr>
                                <td>{{ $course->jour }}</td>
                                <td>{{ $course->heuredebut }}</td>
                                <td>{{ $course->heurefin }}</td>
                                <td>{{ $course->cours }}</td>
                                <td>{{ $course->professeur }}</td>
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

@endsection


