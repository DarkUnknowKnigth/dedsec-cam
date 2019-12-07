@extends('layouts.app')
@section('content')
@if(auth()->user()->role==2)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Registro de criminal</h3>
                <form action="{{route('criminals.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <input class="form-control" type="text" name="address" id="address" required>
                    </div>
                    <input type="text" name="latitude" id="latitude" hidden>
                    <input type="text" name="latitude" id="longitude" hidden>
                    <div class="form-group">
                        <label for="">Caracteristicas</label>
                        <input class="form-control" type="text" name="characteristics" id="characteristics" required>
                    </div>
                    <div class="form-group">
                        <label for="">Sexo</label>
                        <select name="sex" id="sex" class="form-control" required>
                            <option value="1">Hombre</option>
                            <option value="0">Mujer</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                document.getElementById('latitude').value = "No soportada";
                document.getElementById('longitude').value = "No soportada";
            }
        }
        function showPosition(position) {
            document.getElementById('latitude').value = position.coords.latitude ;
            document.getElementById('longitude').value = position.coords.longitude;
        }
    </script>
@else
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Si sufriste un asalto o tienes datos de delicuentes comunicate con nosotros</strong>
    </div>
    <script type="application/javascript">
      $(".alert").alert();
    </script>

@endif
@endsection
