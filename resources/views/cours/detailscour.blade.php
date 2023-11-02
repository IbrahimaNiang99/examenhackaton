@extends('layouts.menu')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h2>Détails du cours de : {{ $cour->matiere }}</h2>
            </div>
        </div>
    </div>

    <div class="card mb-3 mt-4" style="height: 35%; width:100%">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="{{ $cour->photo }}" style="height: 60%; width:90%"  class="img-fluid rounded-start" alt="photo">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h2>{{ $cour->matiere }}</h2>
                <h4 class="mt-3">Durée : {{$cour->duree}} </h4>
                <h4 class="card-text mt-3">{{ $cour->description }}.</h4>
                <button class="btn btn-success mt-3" >{{$cour->prof->prenom}} {{$cour->prof->nom}}</button>
            </div>
            </div>
        </div>
    </div>

@endsection
