<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu 1</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  background-color: #f8f9fa; /* Color de fondo opcional */
  padding: 10px 0; /* Ajusta el espaciado del footer según sea necesario */
}
li{
    list-style: none;
}
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <div
            class="col-1"
        >
        </div>
        <div
            class="col-10"
        >
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Inicio</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Acerca de </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contáctanos</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link " href="#">Ayuda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Ir a menu2</a>
                  </li>
                </ul>
                <a class="btn btn-outline-success" href="{{route('login')}}" >Login</a>
                <a class="btn btn-outline-danger" href="{{route('register')}}" >Register</a>
              </div>
            </div>
          </nav>
        </div>
        <div class="col-1">
        </div>
    </div>
    <div class="row-4"  >
        <center>
        <div class="col-4" >
           
        <h2>Bienvenido</h2>    
    </center>
    </div>
</div>

    <footer  >
        <center> <div class="col">
        <ul>
            <li><a href="https://www.php.net/">PHP</a></li>
            <li><a href="https://laravel.com/">LARAVEL</a></li>
            <li><a href="https://developer.mozilla.org/es/docs/Learn/Getting_started_with_the_web/HTML_basics">HTML</a></li>
            <li><a href="https://www.w3schools.com/css/">CSS</a></li>
            <li><a href="https://www.w3schools.com/js/">JS</a></li>
            
        </ul>
        </div>  
        </center>
    
    </footer>
  </div>
  
    
</body>
</html>