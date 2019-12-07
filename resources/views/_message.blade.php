@if(session('message'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Mensaje</h4>
                <p class="mb-0">
                    {{session('message')}}
                </p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(count($errors->all()))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Mensaje</h4>
                <p class="mb-0">
                    {{$errors->first()}}
                </p>
                </div>
            </div>
        </div>
    </div>
@endif

