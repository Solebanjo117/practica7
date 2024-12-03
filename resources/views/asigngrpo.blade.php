@extends('dashboard')
@section('contenido')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    li{
        list-style: none;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
  console.log('El DOM ha cargado');
  mostrar(); // Llamar a tu método
});
    function cambiar(){
        let semestre = document.getElementById('semestre').value;
        let edificio = document.getElementById('edificio').value;
        let depto = document.getElementById('depto').value;
        let carrera = document.getElementById('idCarrera').value;
        var routeBase = "{{ route('asignarGrupo.show', [':semestreId', 'id1', 'id2','id3']) }}";
        var url = routeBase.replace(':semestreId', semestre).replace('id1',depto).replace('id2',edificio)
        .replace('id3',carrera);
        window.location.href = url;
    }
    function mostrar(){
        let hasCarrera = "{{ session('grupo') }}";
        hasCarrera = hasCarrera!=''?true:false;
        let periodo = document.getElementById('idPeriodo').value;
        let carrera = document.getElementById('idCarrera').value;
        let formulario = document.getElementById('formu');
        formulario.style.visibility =(periodo != '-1' && carrera != '-1' && hasCarrera)?'visible':'hidden';
    }
    function manejarCambio(checkbox){
        let grupo = document.getElementById('grupo').value;
        let radiopersonal = document.querySelector('input[name="radiopersonal"]:checked').value;
        let radiolugar = document.querySelector('input[name="radiolugar"]:checked').value;
        let radiomateria = document.querySelector('input[name="radiomateria"]:checked').value; //MATERIA VA A GRUPO, AQUI NO
        let valor = checkbox.value;
        console.log(radiopersonal);
        console.log(radiolugar);
        console.log(radiomateria);
        console.log(valor);
        console.log(grupo);

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const miRuta = checkbox.checked 
            ? "{{ route('asignarGrupo.store') }}" 
            : "{{ route('asignarGrupo.destroy', ':id') }}".replace(':id', valor);
        const metodo = checkbox.checked ? 'POST' : 'DELETE';
           // Realizar la solicitud
           fetch(miRuta, {
            method: metodo,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ id: valor, radiopersonal: radiopersonal, radiolugar:radiolugar
                ,radiomateria: radiomateria,nombreGrupo:grupo
             }) // Enviar datos si es necesario
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Respuesta del servidor:', data);
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        });
    }
    function mostrarTabla() {
        

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let tabla = document.getElementById('tabla');
    const lugarActual = document.querySelector('input[name="radiolugar"]:checked')?.value; // ID del lugar seleccionado
    let radiopersonal = document.querySelector('input[name="radiopersonal"]:checked');
    let radiolugar = document.querySelector('input[name="radiolugar"]:checked');
    let radiomateria = document.querySelector('input[name="radiomateria"]:checked');
    let idGrupo = document.getElementById('grupo').value;
    fetch(`/grupos/${lugarActual}`, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-TOKEN": csrfToken
        }
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Error al obtener horarios: " + response.status);
            }
            return response.json();
        })
        .then((horarios) => {
    const checkboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
    checkboxes.forEach(checkbox => {
           checkbox.checked=false;
           checkbox.disabled=false;
        });
    // Generar valores del formato "DíaHora" y aplicar lógica
    horarios.mensaje.forEach((horario) => {
        
        const valorHorario = horario.hora[0] == 0 ? horario.dia + horario.hora[1] : horario.dia + horario.hora[0] + horario.hora[1];
 // Agregar atributos personalizados a los checkboxes
        checkboxes.forEach(checkbox => {
            if (checkbox.value === valorHorario) {
                checkbox.checked = true;
            }
            if (checkbox.value === valorHorario && horario.grupo.nombreGrupo!= idGrupo) {
                checkbox.disabled = true;
            }
        });
    });

    // Deshabilitar cualquier checkbox marcado que no esté en el grupo actual
    
})

        .catch((error) => {
            console.error("Error:", error);
        });

    if (radiopersonal && radiolugar && radiomateria) {
        tabla.style.visibility = 'visible';
    } else {
        tabla.style.visibility = 'hidden';
    }
}

    function cambiarMaestro(){
        let id = document.querySelector('input[name="radiopersonal"]:checked').value;
        let idGrupo = document.getElementById('grupo').value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        const datos = {
    idGrupo: idGrupo,
    campo2: 'Nuevo Valor 2'
                        };


        fetch(`grupos/${id}`, {
    method: 'PUT', // O PATCH
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken // Token CSRF si es necesario
    },
    body: JSON.stringify(datos) // Convierte los datos a JSON
        })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.json();
    }).then(data => {
        console.log('Respuesta del servidor:', data);
    }).catch(error => {
        console.error('Error en la solicitud:', error);
    });
    }
</script>
<h3>Asignacion grupo</h3>

<div class="container">
   <form action="{{route('grupos.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-3">
            <label for="">Fecha:
                <input type="date" id="fecha" name="fecha" value="{{date('d/m/Y')}}">
            </label>
            <label for="">Grupo: <input 
                @session('grupo')
                    readonly
                @endsession
                 type="text"  value="{{ old('grupo', session('grupo')?->nombreGrupo ?? '') }}" id="grupo" name="grupo">
            </label>
        </div>
        <div class="col-3">
            <label for="">Max alumnos:
                <input type="number" 
                @session('grupo')
                readonly
            @endsession
                id="max_alumnos"  value="{{ old('max_alumnos', session('grupo')?->maxAlumnos ?? '') }}" name="max_alumnos">
            </label>
        </div>
        <div class="col-3">
            <label for="">Descripcion: <br>
                <input type="text" id="desc" 
                @session('grupo')
                readonly
            @endsession
                 value="{{ old('desc', session('grupo')?->descripcionGrupo ?? '') }}" name="desc">
            </label>
        </div>
        <div class="col-2" >
            <select name="idPeriodo" id="idPeriodo" onchange="mostrar()">
                <option value="-1">Sel. Periodo</option>
                @foreach ($periodos as $periodo)
                <option @selected(session('grupo')?->idPeriodo == $periodo->idPeriodo)
                 value="{{$periodo->idPeriodo}}">{{$periodo->periodo}}</option>
                @endforeach
            </select>
            <select name="idCarrera" id="idCarrera" onchange="mostrar();cambiar()">
                <option value="-1">Sel. Carrera</option>
                @foreach ($carreras as $carrera)
                <option @selected(session('idCarrera') == $carrera->idCarrera)
                value="{{$carrera->idCarrera}}">{{$carrera->nombreCarrera}}</option>
                @endforeach
            </select>
        </div>
        
    </div>
   
    <br>
    <div class="row">
        <button type="submit" class="btn btn-primary" id="btnAsignar">Asignar horario 
    </div>
    @error('grupo')
    <br>
    <div class="alert alert-success" role="alert">
        Selecciona un nombre de grupo mayor a dos caracteres
      </div>
    @enderror
   @error('max_alumnos')
   <br>
   <div class="alert alert-success" role="alert">
       Selecciona una cantidad de alumnos mayor a 15
     </div>
   @enderror
    @error('idPeriodo')
    <br>
    <div class="alert alert-success" role="alert">
        Selecciona un periodo
      </div>
    @enderror
    @session('status')
    <br>
    <div class="alert alert-success" role="alert">
        {{session('status')}}
      </div>
    @endsession
</form>
<form action="{{route('asignarGrupo.create')}}" method="get">
    @csrf
    @session('grupo')
    <br>
    <div class="row">
        <button type="submit"  class="btn btn-success" id="btnAsignar">Terminar con el horario</button>
    </div>
    @endsession
</form>
<form action="{{route('asignarGrupo.store')}}" method="post" id="formu">
    @csrf
    
    <hr><hr>
    <div class="row">
        <div class="col">
            <select name="sem" id="semestre" onchange="cambiar()">
                @for ($i = 1; $i <= 9; $i++)
                <option @selected(session('semestre') == $i) value="{{$i}}">Semestre {{$i}}</option>
            @endfor
                
            </select>
            <ul class="list-group">
                @session('materias')
                    @foreach (session('materias') as $item)
                        <li><input onclick="mostrarTabla()" type="radio" name="radiomateria" id="" value="{{$item->idMateria}}">{{$item->materia->nombreMateria}}</li>
                    @endforeach
                @endsession
            </ul>
        </div>
        <div class="col">
            <select name="sem" id="depto" onchange="cambiar()">
               
               @foreach ($deptos as $item)

                   <option @selected(session('depto')?->idDepto == $item->idDepto)
                    value="{{$item->idDepto}}">{{$item->nombreDepto}}</option>
               @endforeach

        </select>
        @session('depto')
                    @foreach (session('depto')->personals as $item)
                        <li><input @checked(session('grupo')?->noTrabajador == $item->noTrabajador) 
                            onclick="mostrarTabla(); cambiarMaestro()" type="radio" name="radiopersonal" id="" value="{{$item->noTrabajador}}">{{$item->nombres}}</li>
                    @endforeach
                @endsession
        
        
        </div>
        <div class="col">
            <select name="" id="edificio" onchange="cambiar()">
                @foreach ($edificios as $item)
                    <option  @selected(session('edificio')?->id == $item->id)
                    value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select>
            @session('depto')
                    @foreach (session('edificio')->lugares as $item)
                        <li><input onclick="mostrarTabla()" type="radio" name="radiolugar" id="" value="{{$item->id}}"> {{" ".$item->nombre}}</li>
                    @endforeach
                @endsession
        </div>
        <div class="col-4">
            
            <table class="table table-primary" id="tabla" style="visibility: hidden">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>L</th>
                        <th>M</th>
                        <th>X</th>
                        <th>J</th>
                        <th>V</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Generar filas dinámicamente -->
                    <script>
                        const startHour = 8;
                        const endHour = 20; // hasta las 20 (8 PM)
                        for (let i = startHour; i < endHour; i++) {
                            document.write(`
                                <tr>
                                    <td>${i}-${i + 1}</td>
                                    <td><input type="checkbox" value='L${i}' onchange='manejarCambio(this)'/></td>
                                    <td><input type="checkbox" value='M${i}' onchange='manejarCambio(this)' /></td>
                                    <td><input type="checkbox" value='X${i}' onchange='manejarCambio(this)'/></td>
                                    <td><input type="checkbox" value='J${i}' onchange='manejarCambio(this)'/></td>
                                    <td><input type="checkbox" value='V${i}' onchange='manejarCambio(this)'/></td>
                                </tr>
                            `);
                        }
                    </script>
                </tbody>
            </table>
            
        </div>
    </div>
</form>
<br>
</div>

@endsection