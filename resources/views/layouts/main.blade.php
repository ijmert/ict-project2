<!DOCTYPE html>

                                    
<html lang = "nl">
    <head>
        <title>Sensor Monitoring Tool</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .containerTable{
                display: flex;
                justify-content: center;
                align-items: center;
            }

                    .labelTest{
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                display: block;
                text-align: center;
                margin: 30px;
                background-color: red;
                color: white;
                font-size: 30px;
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar-profiel" style="background-color: red;">
            <h1>Sensor Monitoring Tool</h1>
            <span  class="dot">
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: red;">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Initialen
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="{{route ('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" {{ __('Logout') }}>
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Gebruiker gegevens</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </span>
        </nav>
        <main style="width: 100%">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

