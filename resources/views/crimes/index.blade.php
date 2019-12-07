@extends('layouts.app')
@section('name')
<div class="container">
    <div class="row">
        @foreach ($crimes as $crime)
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card">
                    <div class="card-header">
                        Lugar del crimen: {{$crime->establishment}} <br>
                        Fecha: {{$crime->date}}
                    </div>
                    <div class="card-body">
                        Tipo de arma: {{$crime->gun}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
