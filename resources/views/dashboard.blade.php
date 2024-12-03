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
                                    <a class="dropdown-item" href="{{route('periodos.index')}}">Periodos </a>
                                    <a class="dropdown-item" href="{{route('plazas.index')}}">Plazas </a>
                                    <a class="dropdown-item" href="{{route('puestos.index')}}">Puestos  </a>
                                    <a class="dropdown-item" href="{{route('personals.index')}}">Personal  </a>
                                    <a class="dropdown-item" href="{{route('deptos.index')}}">Deptos </a>
                                    <a class="dropdown-item" href="{{route('carreras.index')}}">Carreras</a>
                                    <a class="dropdown-item" href="{{route('materias.index')}}">Materias </a>
                                    <a class="dropdown-item" href="{{route('alumnos.index')}}">Alumnos </a>
                                <a class="dropdown-item" href="{{route('reticulas.index')}}">Retículas</a>
                                <a class="dropdown-item" href="{{route('personalplazas.index')}}">Personal Plazas</a>
                                <a class="dropdown-item" href="{{route('edificios.index')}}">Edificios</a>
                                <a class="dropdown-item" href="{{route('lugares.index')}}">Lugares</a>
                                <a class="dropdown-item" href="{{route('horarioAlumn')}}">Alumno </a>
                                <a class="dropdown-item" href="{{route('materiasA.index')}}">Asignar Materia</a>
                                <a class="dropdown-item" href="{{route('asignarGrupo.index')}}">Asignar grupo</a>
                                
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
                                        <a class="dropdown-item" href="{{route('docentes.index')}}">Docentes</a>
                                        <a class="dropdown-item" href="{{route('alumnos.index')}}">Alumnos</a>
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
                           @if (Route::currentRouteName()!= 'dashboard')
                           <li>
                            <div class="input-group rounded">
                                <form   id="searchForm" method="get">
                                    <input type="search" name="id" id="searchInput" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="submit" hidden>Buscar</button>
                                </form>
                                <span class="input-group-text border-0" id="search-addon">
                                  <i class="fas fa-search"></i>
                                </span>
                              </div>
                        </li>
                           @endif
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
        <div class="col-8" >
           
        @yield('contenido')  
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
<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita el envío automático del formulario

        // Obtiene el valor del input
        const id = document.getElementById('searchInput').value;
        if (id) {
          var baseRoute ="{{explode('.', Route::currentRouteName())[0]}}";
            // Redirige a la URL dinámica de la ruta 'reticulas.show' con el ID
            const url = `/${baseRoute}/${id}`;
            window.location.href = url;
        }
    });
</script>
</html>