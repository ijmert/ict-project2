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
            
            
              @import url(https://fonts.googleapis.com/css?family=Dosis:200,400,500,600);
html, body { height: 100%; }
body { background: #f2f2f2; }

.de .den, .de .dene, .de .denem, .de .deneme { position: absolute;  left: 50%; top: 50%; }
.de {
    position: relative;
    width: 240px;
    height: 240px;
    border-radius: 100%;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    background-color: transparent;
}
.den {
    position: relative;
    width: 210px;
    height: 210px;
    margin: -105px 0 0 -105px;
    border-radius: 100%;
    box-shadow: inset 0 2px 10px rgba(0, 0, 0, .5), 0 2px 20px rgba(255, 255, 255, 1);
    background: #df3341;
    background: -moz-linear-gradient(left, #df3341 0%, #d4f355 50%, #61c0ec 100%);
    background: -webkit-gradient(linear, left top, right top, color-stop(0%,#df3341), color-stop(50%,#d4f355), color-stop(100%,#61c0ec));
    background: -webkit-linear-gradient(left, #df3341 0%,#d4f355 50%,#61c0ec 100%);
    background: linear-gradient(to right, #df3341 0%,#d4f355 50%,#61c0ec 100%);
    position:relative;
}
.dene {
    width: 180px;
    height: 180px;
    margin: -90px 0 0 -90px;
    border-radius: 100%;
    box-shadow: inset 0 2px 2px rgba(255, 255, 255, .4), 0 3px 13px rgba(0, 0, 0, .85);
    background: #f2f6f5;
    background: -moz-linear-gradient(top, #f2f6f5 0%, #cbd5d6 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f2f6f5), color-stop(100%, #cbd5d6));
    background: -webkit-linear-gradient(top, #f2f6f5 0%, #cbd5d6 100%);
    background: -o-linear-gradient(top, #f2f6f5 0%, #cbd5d6 100%);
}
.denem {
    width: 160px;
    height: 160px;
    margin: -80px 0 0 -80px;
    border-radius: 100%;
    background: #cbd5d6;
    background: -moz-linear-gradient(top, #cbd5d6 0%, #f2f6f5 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #cbd5d6), color-stop(100%, #f2f6f5));
    background: -webkit-linear-gradient(top, #cbd5d6 0%, #f2f6f5 100%);
}

.deneme {
    padding: 3px 10px 0 10px;
    width: 120px;
    height: 137px;
    display: inline-block;
    margin: -70px 0 0 -70px;
    color: #555;
    text-shadow: 1px 1px 1px white;
    font-family: 'Dosis';
    font-size: 100px;
    font-weight: 400;
    text-align: center;
}
.deneme span { font-size: 30px; font-weight: 200; }
.deneme strong { position: absolute; right: 10px; top: 25px; font-size: 34px; }




.graph {
	margin-bottom:1em;
  font:normal 100%/150% arial,helvetica,sans-serif;
}

.graph caption {
	font:bold 150%/120% arial,helvetica,sans-serif;
	padding-bottom:0.33em;
}

.graph tbody th {
	text-align:right;
}

@supports (display:grid) {

	@media (min-width:32em) {

		.graph {
			display:block;
      width:100px;
      height:200px;
		}

		.graph caption {
			display:block;
		}


		.graph tbody {
			position:relative;
			display:grid;
			grid-template-columns:repeat(auto-fit, minmax(2em, 1fr));
			column-gap:2.5%;
			align-items:end;
			height:100%;
			margin:3em 0 1em 2.8em;
			padding:0 1em;
			border-bottom:2px solid rgba(0,0,0,0.5);
			background:repeating-linear-gradient(
				180deg,
				rgba(170,170,170,0.7) 0,
				rgba(170,170,170,0.7) 1px,
				transparent 1px,
				transparent 20%
			);
		}

		.graph tbody:before,
		.graph tbody:after {
			position:absolute;
			left:-3.2em;
			width:2.8em;
			text-align:right;
			font:bold 80%/120% arial,helvetica,sans-serif;
		}

		.graph tbody:before {
			content:"100%";
			top:-0.6em;
		}

		.graph tbody:after {
			content:"0%";
			bottom:-0.6em;
		}

		.graph tr {
			position:relative;
			display:block;
		}

		.graph tr:hover {
			z-index:999;
		}

		.graph th,
		.graph td {
			display:block;
			text-align:center;
		}

		.graph tbody th {
			position:absolute;
			top:-3em;
			left:0;
			font-weight:normal;
			text-align:center;
      white-space:nowrap;
			text-indent:0;
			transform:rotate(-45deg);
		}

		.graph tbody th:after {
			content:"";
		}

		.graph td {
			height:100%;
			background:#F63;
			border-radius:0.5em 0.5em 0 0;
			transition:background 0.5s;
		}

		.graph tr:hover td {
			opacity:0.7;
		}

		.graph td span {
			overflow:hidden;
			position:absolute;
			left:50%;
			top:50%;
			width:0;
			padding:0.5em 0;
			margin:-1em 0 0;
			font:normal 85%/120% arial,helvetica,sans-serif;
/* 			background:white; */
/* 			box-shadow:0 0 0.25em rgba(0,0,0,0.6); */
			font-weight:bold;
			opacity:0;
			transition:opacity 0.5s;
      color:white;
		}

		.toggleGraph:checked + table td span,
		.graph tr:hover td span {
			width:4em;
			margin-left:-2em; /* 1/2 the declared width */
			opacity:1;
		}



    


	} /* min-width:32em */

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

