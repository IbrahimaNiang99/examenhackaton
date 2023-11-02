@extends('layouts.menu')

@section('content')

<div class="container-fluid">
    <div class="row mt4">
        <div class="col-md-8">
            
        </div>
    </div>
    <div class="row mt-4">
    <div class="col-md-8">
        <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button">Search</button>
                      </div>
                    </div>
                  </div>

        <h2 class="mt-4">Popular courses</h2>

        @foreach($cours as $c)
        <div class="row mt-3">
            <div class="col-md-12 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ $c->photo }}" style="height: 90px; width:90px"  class="img-fluid rounded-start" alt="photo">
                            </div>
                            <div class="col-md-8">
                                <h2>{{ $c->matiere }}</h2>
                                {{$c->description}}
                            </div>
                            <div class="col-md-2 text-center">
                                <h4>{{ $c->duree }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <div class="col-md-2 offset-2">
    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle form-control" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
    </div>
    </div>
</div>

@endsection
