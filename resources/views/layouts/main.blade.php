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
    font-size: 80px;
    font-weight: 400;
    text-align: center;
}
.deneme span { font-size: 30px; font-weight: 200; }
.deneme strong { position: absolute; right: 10px;  font-size: 20px; }




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
      height:270px;
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
			font-weight:bold;
			opacity:0;
			transition:opacity 0.5s;
      color:white;
		}

		.toggleGraph:checked + table td span,
		.graph tr:hover td span {
			width:4em;
			margin-left:-2em; 
			opacity:1;
		}
	} 
} 
        /*circle cart */
        .flex-wrapper {
  display: flex;
  flex-flow: row nowrap;
}

.single-chart {
  justify-content: space-around ;
}

.circular-chart {
  display: block;
  margin: 10px auto;
  max-width: 100%;
  max-height: 250px;
}

.circle-bg {
  fill: none;
  stroke: #eee;
  stroke-width: 3.8;
}

.circle {
  fill: none;
  stroke-width: 2.8;
  stroke-linecap: round;
  animation: progress 1s ease-out forwards;
  stroke: red;
}

@keyframes progress {
  0% {
    stroke-dasharray: 0 100;
  }
}


.percentage {
  fill: #666;
  font-family: sans-serif;
  font-size: 0.3em;
  text-anchor: middle;
}
/*termometer*/
progress{
		transform: rotate(-90deg);
		display: block;
		width: 100%;
        height: 25px
	}
	.dott {
  		height: 25px;
		width: 25px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		margin-top: 68px;
		margin-left: 67px;
	}
	/*thermometer */
    .thermometerBody {
	color: white;
	font: 1em/1.5 system-ui, -apple-system, sans-serif;
}
.thermometer, .thermometer__tube {
	position: relative;
}
.thermometer {
	background-image: linear-gradient(-135deg,hsl(223,10%,85%),hsl(223,10%,65%));
	border-radius: 2em;
	box-shadow:
		0.2em 0 0.1em hsl(223,10%,45%) inset,
		0 -0.2em 0.1em hsl(223,10%,45%) inset,
		-0.1em 0 0 hsl(223,10%,80%) inset,
		0 0.1em 0 hsl(223,10%,80%) inset;
	margin: auto;
	width: 10em;
	height: 300px;
}
.thermometer:before, .thermometer__inner, .thermometer__ring, .thermometer__tube:before {
	position: absolute;
}
.thermometer:before, .thermometer__inner {
	left: 1em;
}
.thermometer:before, .thermometer__tube:before {
	content: "";
	display: block;
}
.thermometer:before {
	background-image: linear-gradient(hsl(223,10%,90%),hsl(223,10%,80%));
	border-radius: 1.2em;
	box-shadow:
		-0.1em 0.1em 0.1em hsl(223,10%,55%) inset,
		0.2em -0.2em 0.4em hsl(223,10%,100%) inset,
		-0.3em 0.2em 0.4em hsl(223,10%,55%) inset,
		0.1em -0.1em 0.1em hsl(223,10%,70%),
		0.5em -0.5em 0.3em hsl(223,10%,65%),
		0 0 0.4em 0.4em hsl(223,10%,100%);
	top: 1em;
	width: calc(100% - 2em);
	height: calc(100% - 2em);
}
.thermometer__inner {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	align-content: flex-start;
	top: 0.9em;
	text-align: center;
	width: calc(100% - 2em);
	height: calc(100% - 4em);
}
.thermometer__c, .thermometer__f {
	background-image:
		linear-gradient(hsl(0,0%,0%) 0.1em,hsla(0,0%,0%,0) 0.1em),
		linear-gradient(hsl(0,0%,0%) 0.1em,hsla(0,0%,0%,0) 0.1em);
	background-repeat: repeat-y;
	flex-basis: calc(50% - 0.75em);
	margin-bottom: 0.125em;
}
.thermometer__c {
	background-position: 100% 0;
	background-size: 0.8em 1em, 0.5em 0.2em;
	padding-right: 0.5em;
	padding-top: 1.25em;
	height: 230px;
}
.thermometer__c .thermometer__label {
	height: 2em;
}
.thermometer__f {
	background-size: 0.8em 1.125em, 0.5em 0.225em;
	padding-top: 1.5em;
	padding-left: 0.25em;
	height: 230px;
}
.thermometer__f .thermometer__label {
	height: 2.25em;
}
.thermometer__mercury {
	background-color: hsl(355,85%,40%);
	box-shadow:
		-0.1em 0.1em 0.25em hsla(355,85%,40%,0.7),
		0.05em 0 0 hsla(0,0%,100%,0.5) inset;
	width: 100%;
	transform: scaleY(0);
	transform-origin: 50% 100%;
	transition: transform 0.3s ease-in-out;
}
.thermometer__ring {
	border-radius: 50% 50% 0 0;
	box-shadow: 0 0.05em 0 0.05em hsla(223,10%,30%,0.4) inset;
	top: 0.6em;
	left: calc(50% - 0.3em);
	width: 0.6em;
	height: 0.2em;
}
.thermometer__ring + .thermometer__ring {
	border-radius: 0 0 50% 50%;
	box-shadow: 0 -0.05em 0 0.05em hsla(223,10%,30%,0.4) inset;
	top: 20.2em;
}
.thermometer__title {
	flex-basis: 50%;
}
.thermometer__tube, .thermometer__tube:before {
	border-radius: 0.3em 0.3em 0 0;
}
.thermometer__tube {
	box-shadow:
		-0.1em 0.1em 0.25em hsla(0,0%,0%,0.3),
		0.05em 0 0 hsla(0,0%,100%,0.5) inset,
		0.1em 0 0.1em hsla(0,0%,0%,0.2) inset;
	flex-basis: 0.3em;
	background-color: red;
	display: flex;
	margin-top: auto;

}
.thermometer__bulb {
	background-image: radial-gradient(100% 100% at 65% 35%,hsl(355,85%,55%) 12%,hsl(355,85%,40%) 13%,hsl(355,85%,30%));
	border-radius: 50%;
	box-shadow:
		0 -0.25em 0.25em hsla(0,85%,20%,0.7),
		-0.35em 0.35em 0.5em hsl(355,20%,50%),
		0 0 0 0.1em hsl(223,10%,60%),
		0 0 0 0.15em hsl(223,10%,90%),
		0 0 0 0.2em hsl(223,10%,30%),
		0 0 0 0.05em hsl(355,85%,30%) inset,
		-0.1em 0.1em 0 hsl(355,85%,43%) inset;
	margin: auto;
	width: 2em;
	height: 2em;
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

