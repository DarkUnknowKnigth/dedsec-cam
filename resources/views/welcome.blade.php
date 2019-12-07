    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Laravel</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <link rel="stylesheet" href="{{asset('css/app.css')}}">


            <!-- Styles -->
            <style>
                * {
                    text-decoration: none;
                }
                html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Nunito', sans-serif;
                    font-weight: 200;
                    /* height: 100vh; */
                    /* margin: 0; */
                    /* margin-top: -8px; */


                }


                .welcome-nav-container .navbar {
                    display: flex;
                    background-color: #e1e3e6;
                    justify-content: space-between;
                    /* background-color: #326da8; */
                    box-shadow: 0px 10px 20px -25px rgba(0, 0, 0, 0.75);
                }

                .welcome-nav-container .navbar-collapse{
                    display: flex;
                    justify-content: flex-end;
                }
                .welcome-nav-container a,
                .welcome-nav-container .navbar-brand {
                    font-size: 1.5rem;
                    margin: 0.5rem 0.5rem;
                    /* color: white; */
                }
                .welcome-nav-container .navbar-brand:hover {
                    color: white;
                }

                .name-system-container {
                    margin-top: 3rem;
                    font-size: 3rem;
                    text-align: center;
                }

                .links{
                    margin: 3rem auto;
                    display: flex;
                    flex-direction: column;

                }

                .links a {
                    flex : 0 0 40%;
                    text-align: center;
                }

                .links a:hover {
                    text-decoration: none;
                }

                .links b{
                    font-size: 1rem;
                    margin-right: 0.5rem;
                }


            </style>
        </head>
        <body>
            <div class="welcome-nav-container">
                <nav class="navbar navbar-expand-lg navbar-light ">

                    <a class="navbar-brand" href="#">Security</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ">
                            @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a  class="nav-link" href="{{ url('/home') }}">Home</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a  class="nav-link"  href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a  class="nav-link"  href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                            @endauth
                        </ul>
                    </div>
                </nav>
                @endif

                <div class="content">
                    <div class="name-system-container">
                            Servicio de Seguridad y Analisis y Prevencion de Posibles Riesgos a la Ciudadania en Micro y Pequeños Negocios
                    </div>

                    <div class="links">
                        <a href="https://github.com/DarkUnknowKnigth">  <b>GitHub : </b> Daniel Morales Ocampo</a>
                        <a href="https://github.com/escandihub">  <b>GitHub : </b> Escandon Sanchez</a>
                        <a href="https://github.com/enriquedelacruz4"> <b>GitHub: </b>Enrique De La Cruz</a>

                    </div>
                </div>
            </div>
        </body>
    </html>
