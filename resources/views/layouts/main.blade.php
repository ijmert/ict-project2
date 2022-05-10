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
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: red;">
                      MV
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a class="dropdown-item" href="{{route ('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" {{ __('Logout') }}>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
            </span>
        </nav> 
        <main style="width: 100%">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

