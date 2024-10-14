<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu 2</title>
    <style>
        footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  background-color: #f8f9fa; /* Color de fondo opcional */
  padding: 10px 0; /* Ajusta el espaciado del footer según sea necesario */
}
</style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-2"
            >
            </div>
            <div
                class="col-8"
            >
               <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
               >
                <div class="container">
                    
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Catalogos </a
                                >
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Periodos </a>
                                    <a class="dropdown-item" href="#">Plazas </a>
                                    <a class="dropdown-item" href="#">Puestos  </a>
                                    <a class="dropdown-item" href="#">Personal  </a>
                                    <a class="dropdown-item" href="#">Deptos </a>
                                    <a class="dropdown-item" href="#">Carreras</a>
                                    <a class="dropdown-item" href="#">Materias </a>
                                    <a class="dropdown-item" href="#">Alumnos </a>
                                <a class="dropdown-item" href="#">Retículas</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Horarios </a
                                >
                                <div class="dropdown-menu" aria-labelledby="dropdownId" >
                                    <div class="d-flex">
                                        <a class="dropdown-item" href="#">Docentes</a>
                                        <a class="dropdown-item" href="#">Alumnos</a>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Proyectos Individuales </a
                                >
                                <div class="dropdown-menu" aria-labelledby="dropdownId" >
                                    <div class="d-flex">
                                    <a class="dropdown-item" href="#">Capacitación</a>
                                    <a class="dropdown-item" href="#">AlumAsesorías Doc.</a>
                                    <a class="dropdown-item" href="#">Proyectos</a>
                                    <a class="dropdown-item" href="#">Material Didáctico </a>
                                    <a class="dropdown-item" href="#">Docencia e Inv.</a>
                                    <a class="dropdown-item" href="#">Asesoría Proyectos Ext.</a>
                                    <a class="dropdown-item" href="#">Asesoría a S.S. </a>
                                </div>
                            </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="#">Instrumentación </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Tutorías </a>
                            </li>
                           <li class="nav-item">
                            
                                <select
                                    class="form-select"
                                >
                                    <option selected>Periodo</option>
                                    <option value="">Ene-Jun 24</option>
                                    <option value="">Ago-Dic-24</option>
                                    <option value="">Ene-Jun 25</option>
                                </select>
                           
                           </li>
                            
                            <li class="nav-item">
                               <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="nav-link" type="submit">Logout </button>
                               </form>
                            </li>
                        </ul>
                       
                    </div>
                </div>
               </nav>
               
            </div>
            <div
            class="col-2"
        >
          
        </div>
            
        </div>
        <div class="row-4"  >
        <center>
        <div class="col-4" >
           
        <h2>Inicio</h2>    
    </center>
    </div>
</div>

    <footer  >
        <center> <div class="col">
        @auth
        <span> {{Auth::user()->email}} | {{Auth::user()->name}}

            </span>  
        @endauth
        </div>  
        </center>
    
    </footer>
    </div>
    
</body>
</html>