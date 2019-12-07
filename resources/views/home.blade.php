@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="card">
        <div class="card-header card-tit" id="cam-1">
                <i class="fas fa-video"></i>
            <h5 class="card-title">Cam 1 - | Sistema de vigilancia</h5>
        </div>
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-6 col-sd-12">
                    <h2>
                        <p class="p-5" id="label-container"></p>
                    </h2>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <canvas id="webcam-container"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-4">

                    <button type="button" class="boton btn btn-danger form-control" onclick="document.getElementById('form').submit()">
                        <i class="fas fa-exclamation-triangle">   </i>
                        Alerta
                    </button>
                </div>
                <div class="col-4">
                    <button type="button" class="boton btn btn-secondary form-control">
                            <i class="fas fa-times"></i>
                        Falso
                    </button>
                </div>
                <div class="col-4">
                    <button class="boton btn btn-primary form-control" type="button" onclick="init()">
                            <i class="far fa-play-circle"></i>


                        Start</button>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{route('crimes.store')}}" id="form" method="POST">
    <input type="text" name="establishment" value="OXXO" hidden>
    <input type="date" name="date" value="07-12-012" hidden>
    <input type="text" name="gun" value="Navaja" hidden>
    <input type="text" name="vehicle" value="0" hidden>
    <input type="text" name="type_id" value="1" hidden>
    <input type="text" name="address" value="Meet Up Center, " hidden>
    <input type="text" name="latitude" value="0.4" hidden>
    <input type="text" name="longitude" value="0.3" hidden>
    @csrf
</form>
<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/@teachablemachine/pose@0.8/dist/teachablemachine-pose.min.js"></script>
<script type="application/javascript" src="{{asset('js/learning.js')}}"></script>
@endsection
