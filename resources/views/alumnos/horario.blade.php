@extends('dashboard') <!-- Usar la plantilla base que tengas -->

@section('contenido')
<div class="container">
    <h2>Seleccionar Horario</h2>
    <h3 id="cita"></h3>
    <!-- Barra de búsqueda para filtrar alumnos -->
    <div class="form-group">
        <label for="alumno">Buscar Alumno</label>
        <input type="text" id="searchAlumno" class="form-control" placeholder="Buscar por nombre o matrícula" onkeyup="filterAlumnos()">
    </div>
    
    <!-- Select para elegir alumno -->
    <div class="form-group">
        <label for="alumno_id">Alumno</label>
        <select name="alumno_id" onchange="verificarCita(this)" id="alumno_id" class="form-control">
            <option value="">Selecciona un Alumno</option>
            @foreach($alumnos as $alumno)
                <option  value="{{ $alumno->noctrl }}">{{ $alumno->noctrl }} - {{ $alumno->nombreAlumno }} {{ $alumno->apellidoPaterno }} || Dia: <b>{{ $alumno->cita[0]->fecha_cita }}</b> </option>
            @endforeach
        </select>
    </div>
    
    <!-- Select para elegir el turno -->
    <div class="form-group">
        <label for="turno">Turno</label>
        <select name="turno" id="turno" class="form-control">
            <option value="">Selecciona un turno</option>
            <option value="mañana">Mañana</option>
            <option value="tarde">Tarde</option>
        </select>
    </div>
    
    <!-- Tabla de materias por semestre -->
    <div class="form-group">
        <label for="materias">Materias Disponibles</label>
        <table class="table" id="materias_table" >
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Semestre</th>
                    <th>Creditos</th>

                    <th>Grupo</th>
                    <th>Lunes</th>
                    <th>Martes</th>

                    <th>Miercoles</th>

                    <th>Jueves</th>
                    <th>Viernes</th>
                    <th>Insertar</th>

                </tr>
            </thead>
            <tbody id="materias_body">
                <!-- Las materias se cargarán dinámicamente aquí -->
            </tbody>
        </table>
    </div>
    <div class="alert alert-danger" id="creditosError" style="visibility: hidden">
        El total de créditos seleccionados supera el límite permitido (24).
    </div>

    <!-- Botón para confirmar la inscripción -->
    <button type="button" class="btn btn-primary" id="boton" style="visibility: hidden" onclick="inscribirAlumno()">Inscribir</button>
</div>
<br><br>

<script>
    function verificarCita(valor){
       let cita= document.getElementById('cita');
        let fechaActual = new Date();
       fechaActual.setDate(fechaActual.getDate()+2);
        let fechaFormateada = fechaActual.toLocaleDateString('en-CA'); 

        let selectedOption = valor.options[valor.selectedIndex];
        let palabra ='Dia:';
        let texto = selectedOption.text;
        let index= texto.indexOf(palabra);
        texto =texto.slice(index + palabra.length).trim();
        cita.innerHTML='Cita: '+texto;
       if(fechaFormateada!=texto){
        alert('Hoy no es la fecha de tu cita, tu cita es el dia: '+texto);
        location.reload();
       }
    }
    // Función para filtrar los alumnos en el select
    function filterAlumnos() {
        let input = document.getElementById('searchAlumno');
        let filter = input.value.toLowerCase();
        let select = document.getElementById('alumno_id');
        let options = select.getElementsByTagName('option');

        for (let i = 0; i < options.length; i++) {
            let text = options[i].textContent || options[i].innerText;
            if (text.toLowerCase().indexOf(filter) > -1) {
                options[i].style.display = "";
            } else {
                options[i].style.display = "none";
            }
        }
    }
    document.getElementById('alumno_id').addEventListener('change', function() {
        let turno = this.value;
        let alumno_id = document.getElementById('alumno_id').value;

        if (turno && alumno_id) {
            boton.style.visibility='visible';
            fetchMaterias(turno, alumno_id);
        }else{
            boton.style.visibility='hidden';
        }
    });

    // Función para cargar las materias disponibles basadas en el turno
    document.getElementById('turno').addEventListener('change', function() {
        let turno = this.value;
        let alumno_id = document.getElementById('alumno_id').value;

        if (turno && alumno_id) {
            boton.style.visibility='visible';
            fetchMaterias(turno, alumno_id);
        }else{
            boton.style.visibility='hidden';
        }
    });

    // Función para obtener las materias disponibles desde el servidor
    function fetchMaterias(turno, alumno_id) {
        fetch(`/api/materias-disponibles/${turno}/${alumno_id}`)
            .then(response => response.json())
            .then(data => {
                let materiasBody = document.getElementById('materias_body');
materiasBody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos registros

// Iterar sobre los grupos
data.forEach(grupo => {
    // Crear una fila para cada materia
    let row = document.createElement('tr');
    
    // Crear celdas de la fila para la materia, semestre, y nombre del grupo
    row.innerHTML = `
        <td>${grupo.materia.nombreMateria}</td>
        <td>${grupo.materia.semestre}</td>
        <td>${grupo.materia.creditos}</td>
        <td>${grupo.nombreGrupo}</td>
    `;
    
    // Crear una columna para cada día (L, M, X, J, V) y asignar el horario correspondiente
    let dias = ['L', 'M', 'X', 'J', 'V']; // Días abreviados
    // Creamos un objeto para almacenar los horarios por día
    let horariosPorDia = {
        'L': [],
        'M': [],
        'X': [],
        'J': [],
        'V': []
    };
    
    // Iteramos sobre los horarios del grupo
    grupo.horarios.forEach(horario => {
        // Agrupamos los horarios por día
        horariosPorDia[horario.dia].push(horario.hora); // Añadimos la hora al día correspondiente
    });

    // Ahora, por cada día de la semana, concatenamos los horarios
    dias.forEach(dia => {
        let horariosDelDia = horariosPorDia[dia];
        
        if (horariosDelDia.length > 0) {
            // Si hay varios horarios para el mismo día, formamos el rango
            let horaInicio = horariosDelDia[0];  // Primer horario
            let horaFin = horariosDelDia[horariosDelDia.length - 1];  // Último horario
            let rango = `${horaInicio} - ${horaFin}`;  // Formamos el rango de horas
            row.innerHTML += `<td>${rango}</td>`;
        } else {
            // Si no hay horarios para ese día, dejamos la celda vacía
            row.innerHTML += `<td></td>`;
        }
    });
    console.log(grupo.idGrupo);
    row.innerHTML+=  `<td><input type="checkbox" data-creditos="${grupo.materia.creditos}" value="${grupo.idGrupo}" class="grupo-checkbox"></td>`;
    // Agregar la fila a la tabla
    materiasBody.appendChild(row);
});


            })
            .catch(error => {
                console.error('Error fetching materias:', error);
            });
    }

function inscribirAlumno() {
        let alumno_id = document.getElementById('alumno_id').value;
        let selectedGrupos = [];
        let maxCreditos=24;
        let creditos = 0;

        // Obtener los grupos seleccionados
        document.querySelectorAll('.grupo-checkbox:checked').forEach(checkbox => {
            selectedGrupos.push(checkbox.value);
            creditos += Number(checkbox.dataset.creditos);
        });
        if(creditos>maxCreditos){
            creditosError.style.visibility = 'visible';
            return;
        }
        if (selectedGrupos.length > 0 && alumno_id) {
            // Enviar los grupos seleccionados al servidor
           axios.post('api/inscribir-alumno',{
            alumno_id: alumno_id,
            grupos: selectedGrupos
           }).then(response=>{
            if (response.data.success) {
                alert(`Inscripción exitosa para el alumno: ${response.data.alumno}`);
                console.log('Grupos inscritos:', response.data.grupos_inscritos);
                location.reload();
            } else {
                alert('Hubo un problema al inscribir al alumno: ' + response.data.message);
            }
           }).catch(error => {
            // Manejar el error
            console.error('Error:', error);
            alert('Hubo un error al intentar inscribir al alumno');
        });
    }
    }
</script>

@endsection
