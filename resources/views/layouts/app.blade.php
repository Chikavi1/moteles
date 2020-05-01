<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script>
             $(document).ready(function(){
            $('.sidenav').sidenav();
             $('.parallax').parallax();
          });
        </script>
        <style>
            nav{
                background: white;

                box-shadow: none !important;
            }
            .color-principal{
                color:#5e247b !important;
            }
            .button-search-principal{
                background: #5e247b;
                color:white;
            }
            ul li  a {
                color:#5e247b !important;
                font-weight: bold;
            }
            .bold{
                font-weight: bold;
            }
            .padding-1{
               padding: .7em !important;
            }
            .padding-search{
               padding: 1.2em !important;

            }
            .block{
                width: 75%;
            }
            .border-radius{
                border-radius: 1em !important;
            }
            .block-100{
              width: 100%;
            }
        </style>

</head>


<body>      
  <div id="app">
    <example-component></example-component>
      <nav>
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo center color-principal bold">5 letras</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger color-principal "><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="collapsible.html" >Iniciar</a></li>
            <li><a href="mobile.html" >Registrate</a></li>
          </ul>
        </div>
      </nav>
    

      <ul class="sidenav" id="mobile-demo">
        <li><a href="collapsible.html">Iniciar</a></li>
        <li><a href="mobile.html">Registrate</a></li>
      </ul>




        <main>
            @yield('content')
        </main>

  </div>
        
</body>
</html>
