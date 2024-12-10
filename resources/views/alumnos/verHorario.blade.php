@extends('dashboard')  <!-- Usar la plantilla base que tengas -->

@section('contenido')
<!-- Incluir jsPDF desde un CDN -->


<div class="container">
    <h2>Ver Horario del Alumno</h2>

    <!-- Barra de búsqueda para filtrar alumnos -->
    <div class="form-group">
        <label for="searchAlumno">Buscar Alumno</label>
        <input type="text" id="searchAlumno" class="form-control" placeholder="Buscar por nombre o matrícula" onkeyup="filterAlumnos()">
    </div>
    
    <!-- Select para elegir alumno -->
    <div class="form-group">
        <label for="alumno_id">Alumno</label>
        <select name="alumno_id" id="alumno_id" class="form-control">
            <option value="">Selecciona un Alumno</option>
            @foreach($alumnos as $alumno)
                <option value="{{ $alumno->noctrl }}">{{ $alumno->noctrl }} - {{ $alumno->nombreAlumno }} {{ $alumno->apellidoPaterno }}</option>
            @endforeach
        </select>
    </div>

    <!-- Botón para ver el horario -->
    <button type="button" class="btn btn-primary" id="verHorarioBtn" onclick="verHorario()">Ver Horario</button>
    <br>
 <!-- Botón para generar el PDF y mostrarlo -->
 <button type="button" class="btn btn-secondary" id="generarPDFBtn" onclick="generarPDF()" style="visibility: hidden;">Generar PDF</button>
    <!-- Sección para mostrar el horario -->
    <div id="horarioAlumno" style="display: none;">
        <h4>Horario del Alumno</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Semestre</th>
                    <th>Grupo</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            </thead>
            <tbody id="horarioBody">
                <!-- El horario del alumno se cargará aquí -->
            </tbody>
        </table>
    </div>
    <br><br>
</div>
<!-- Incluir jsPDF desde el CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<!-- Incluir autoTable desde el CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

<script>
    
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

    // Función para mostrar el horario del alumno
    function verHorario() {
    let alumnoId = document.getElementById('alumno_id').value;

    if (!alumnoId) {
        alert('Por favor selecciona un alumno');
        return;
    }

    // Aquí va el código para obtener el horario del alumno desde el servidor
    // Usamos fetch para obtener el horario del alumno
    fetch(`/api/horario-alumno/${alumnoId}`)
        .then(response => response.json())
        .then(data => {
            let horarioBody = document.getElementById('horarioBody');
            let horarioAlumno = document.getElementById('horarioAlumno');
            horarioBody.innerHTML = '';  // Limpiar la tabla antes de agregar los nuevos registros

            if (data.length === 0) {
                horarioBody.innerHTML = '<tr><td colspan="9">No hay horarios disponibles para este alumno.</td></tr>';
            } else {
                // Iterar sobre los grupos y mostrar el horario
                data.forEach(grupo => {
                    let row = document.createElement('tr');

                    // Crear las celdas para mostrar la materia, semestre y grupo
                    row.innerHTML = `
                        <td>${grupo.materia.nombreMateria}</td>
                        <td>${grupo.materia.semestre}</td>
                        <td>${grupo.nombreGrupo}</td>
                    `;

                    // Días de la semana (L, M, X, J, V)
                    let dias = ['L', 'M', 'X', 'J', 'V'];
                    let horariosPorDia = {
                        'L': [],
                        'M': [],
                        'X': [],
                        'J': [],
                        'V': []
                    };

                    // Iterar sobre los horarios del grupo y agruparlos por día
                    grupo.horarios.forEach(horario => {
                        horariosPorDia[horario.dia].push({hora: horario.hora, lugar: horario.lugar});
                    });

                    // Añadimos los horarios de cada día a la fila
                    dias.forEach(dia => {
                        let horariosDelDia = horariosPorDia[dia];
                        if (horariosDelDia.length > 0) {
                            // Si hay varios horarios para el mismo día, formamos un rango
                            let horaInicio = horariosDelDia[0].hora;
                            let horaFin = horariosDelDia[horariosDelDia.length - 1].hora;
                            // Asignamos el lugar para el primer horario del día
                            let lugar = horariosDelDia[0].lugar || 'No asignado';  // Verifica si el lugar está presente
                            let rango = `${horaInicio} - ${horaFin} | Lugar: ${lugar}`;
                            row.innerHTML += `<td>${rango}</td>`;
                        } else {
                            row.innerHTML += `<td></td>`;
                        }
                    });

                    // Agregar la fila con los horarios a la tabla
                    horarioBody.appendChild(row);
                });
            }

            // Mostrar la sección del horario
            horarioAlumno.style.display = 'block';
            document.getElementById('generarPDFBtn').style.visibility = 'visible';  // Mostrar el botón de generar PDF
        })
        .catch(error => {
            console.error('Error al obtener el horario:', error);
            alert('Hubo un error al obtener el horario del alumno');
        });
}
const { jsPDF } = window.jspdf; // Desestructuración para acceder a jsPDF
function generarPDF() {
    


    let doc = new jsPDF();

    let horarioTable = document.getElementById('horarioBody');
    let rows = horarioTable.getElementsByTagName('tr');
    let finalY = 20;

    // Iterar sobre cada fila de la tabla para agregarla al PDF
    for (let row of rows) {
        let cols = row.getElementsByTagName('td');
        let line = [];
        for (let col of cols) {
            line.push(col.innerText);
        }

        // Escribir una fila en el PDF
        doc.text(line.join(' | '), 10, finalY);
        finalY += 10;  // Ajustar la altura de la siguiente fila
    }

    // Agregar un título y ajustar la posición de la primera línea
    doc.text('Horario del Alumno', 10, 10);
    doc.autoTable({ html: '#horarioTable', startY: finalY });  // Usar autoTable si prefieres mostrar la tabla en el PDF

    // Imprimir el PDF
    doc.autoPrint();
    doc.output('dataurlnewwindow');
}





</script>
@endsection
