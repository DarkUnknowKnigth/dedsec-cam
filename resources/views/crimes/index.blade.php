@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crimenes</h1>
    <div class="row">
        @foreach ($crimes as $crime)
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-header">
                        Fecha: {{$crime->date}}
                    </div>
                    <div class="card-body">
                        Lugar del crimen: {{$crime->establishment}} <br>
                        Tipo de arma: {{$crime->gun}}
                        Tipo : {{$crime->type->name}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
