@extends('layouts.menu')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Détails du professeur {{ $prof->prenom }} {{ $prof->nom }}</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row">
                       @foreach($cours as $c)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                    <img style="width: 100%; height:50%" src="https://media.istockphoto.com/id/1317473369/fr/photo/programmation-dune-nouvelle-application.jpg?b=1&s=612x612&w=0&k=20&c=eNsKs4ITlpCxnEMAqM6y8E9j8GNeKcUwTgrcQZiaBSY=" class="card-img-top" alt="...">
                                    <div class="card-body"> 
                                        <h5 class="card-title">{{ $c->matiere }}</h5>
                                        <p class="card-text">Durée: {{ $c->duree }}</p>
                                        @if($c->etat == 1)
                                            <a href="#" class="btn btn-success">Activé</a>
                                        @endif
                                        @if($c->etat == 0)
                                            <a href="#" class="btn btn-danger">Désactivé</a>
                                        @endif
                                    </div>
                                </div>
                        </div>
                       @endforeach
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
   
@endsection


