<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('css')

    
  </head>
  <body>
    <div class="main-container d-flex">
      <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-1 d-flex justify-content-between">
          <h1 class="fs-4"> 
            <span class="bg-white text-dark rounded shadow px-2 me-2">Fiscalización</span>
          </h1>
          
          <hr class="h.color mx-2">
          <button class="btn btn-warning d-md-none d-block close-btn px-1 py-0 text-white-sm"><i class="fas fa-align-justify"></i></button>
        </div>
        <ul class="list-unstyled px-2">
          <hr class="h.color mx-3">
          <li class=""><a href="{{ route('home') }}" class="text-decoration-none px-3 py-3 d-block">
            <i class="fa-solid fa-house fa-2x"></i> Inicio </a> 

          </li>
          <li class=""><a href="{{ route('rComerciantes') }}" class="text-decoration-none px-3 py-3 d-block">
            <i class="fas fa-user-plus fa-2x"></i> Registar comerciante </a></li>
          <li class=""><a href="{{ route('lLocales') }}" class="text-decoration-none px-3 py-3 d-block">
            <i class="fa-solid fa-map-location fa-2x"></i></i> Locales  </a></li>
          <li class=""><a href="{{ route('payment.list') }}" class="text-decoration-none px-3 py-3 d-block">
            <i class="fa-solid fa-file-invoice-dollar fa-2x"></i> Pagos </a></li>
          <li class=""><a href="{{ route('lComerciantes') }}" class="text-decoration-none px-3 py-3 d-block">
            <i class="fa-solid fa-users fa-2x"></i> Lista de comerciantes </a></li>

          <li class=""><a href="#" class="text-decoration-none px-3 py-3 d-block">
            <i class="fa-solid fa-user-large-slash fa-2x"></i> Apercibimientos de comerciantes </a></li>
          <li class=""><a href="#" class="text-decoration-none px-3 py-3 d-block">
            <i class="fas fa-book fa-2x"></i> Historial de locales </a></li>
          <li class=""><a href="{{ route('inspectores') }}" class="text-decoration-none px-3 py-3 d-block">
            <i class="fa-solid fa-user-secret fa-2x"></i> Inspectores </a></li>
          <li class=""><a href="{{ route('lTianguis') }}" class="text-decoration-none px-3 py-3 d-block">
            <i class="fa-solid fa-mountain-city fa-2x"></i> Tianguis </a></li>

        </ul>
        <hr class="h.color mx-3">
        <ul class="list-unstyled px-2 ">
          <li class=""><a href="{{ route('montos') }}" class="text-decoration-none px-3 py-2 d-block">
              <i class="fa-solid fa-coins fa-2x"></i> Monto Fiscal </a>
            </li>
        </ul>
        <hr class="h.color mx-3">
        <ul class="list-unstyled px-2 ">
          <li class=""><a href="{{ route('logout') }}" class="text-decoration-none px-3 py-2 d-block" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" 
             {{ __('Logout') }} >
            <i class="fas fa-sign-out-alt fa-2x"></i> Salir </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div> 

      <div class="content">
      
        <div id="app">
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            
              <div class="container-fluid">
                @yield('title') 
                <div class="d-flex justify-content-between d-md-none d-block">
                  <button class="btn px-1 py-0 open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                  
                  
                </div>
                 
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"   
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>
  
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav me-auto">
  
                      </ul>
  
                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ms-auto">
                          <!-- Authentication Links -->
                          @guest
                              @if (Route::has('login'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                  </li>
                              @endif
  
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }}
                                  </a>
  
                                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route ('cambiarContrasena') }}">
                                        <i class="fa-solid fa-key"></i>Cambiar contraseña
                                      </a>
                                      
                                      <a class="dropdown-item"  href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                       <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                          {{ __('Logout') }}
                                          
                                      </a>
                                      
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                                  
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>
  
          <main class="py-4">
              @yield('content')
              
          </main>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
    <script>
      $(".sidebar ul li").on('click', function(){
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
      });
      $('.open-btn').on('click',function(){
        $('.sidebar').addClass('active');
      });
      $('.close-btn').on('click',function(){
        $('.sidebar').removeClass('active');
      });
    </script>
    @yield('js')
  </body>
</html>