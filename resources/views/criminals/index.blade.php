@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Criminales</h1>
        <div class="row">
            @foreach ($criminals as $c)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <img class="img-fluid" src="{{$c->imagePath}}" alt="">
                    <div class="card-header">
                        <p>
                            {{$c->name}}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <h3>Lugares de delitos</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Direccion</th>
                                        <th>GPS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($c->places as $p)
                                        <tr>{{$p->address}}</tr>
                                        <tr>{{$p->latitude}},{{$p->longitude}}</tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if(auth()->user()->role==2)
                            <a class="btn btn-warning" href="{{route('criminals.edit',$c)}}">Editar</a>
                            <a class="btn btn-primary" href="{{route('criminals.show',$c)}}">Ver</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
