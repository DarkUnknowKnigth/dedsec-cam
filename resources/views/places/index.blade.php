@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($places as $place)
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    {{$place->address}}
                </div>
                <div class="card-body">
                    {{$place->latitude}}
                    {{$place->longitude}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
