@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                Lugares riesgosos
                <form action="{{route('places.store')}}">
                    <div class="form-group">
                        <label for="">
                            Direccion
                        </label>
                        <input type="text" name="address">
                    </div>
                    <div class="form-group">
                       <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
