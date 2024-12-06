@extends('dashboard')  <!-- Usar la plantilla base que tengas -->

@section('contenido')
<div class="container">
    <h2>Alumnos con Archivos Subidos</h2>

    {{$alumnosConArchivos->links()}}

    @if($alumnosConArchivos->isEmpty())
        <p>No hay alumnos con archivos subidos.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnosConArchivos as $alumno)
                    <tr>
                        <td>{{ $alumno->noctrl }} - {{ $alumno->nombreAlumno }} {{ $alumno->apellidoPaterno }}</td>
                        <td>
                            <button class="btn btn-success" onclick="toggleFileDetails('file-details-{{ $alumno->noctrl }}')">Ver Archivos</button>
                        </td>
                    </tr>

                    <!-- Aquí se coloca el div para los archivos, inicialmente oculto -->
                    <tr id="file-details-{{ $alumno->noctrl }}" class="file-details" style="display:none;">
                        <td colspan="2">
                            <div class="container">
                                @foreach($alumno->archivos as $archivo)
                                    <div>
                                        <p><strong>{{ basename($archivo->pago_pdf) }} (Documento de Pago)</strong></p>
                                        <a href="{{ asset('storage/' . $archivo->pago_pdf) }}" target="_blank" class="btn btn-primary">Ver / Descargar</a>
                                    </div>
                                    <div>
                                        <p><strong>{{ basename($archivo->identificacion_pdf) }} (Identificación)</strong></p>
                                        <a href="{{ asset('storage/' . $archivo->identificacion_pdf) }}" target="_blank" class="btn btn-primary">Ver / Descargar</a>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    // Función para mostrar u ocultar el div con los detalles de los archivos
    function toggleFileDetails(fileId) {
        var fileDetailsDiv = document.getElementById(fileId);

        // Verificar si el div está visible o no, y alternar la visibilidad
        if (fileDetailsDiv.style.display === 'none') {
            fileDetailsDiv.style.display = 'table-row'; // Mostrar el div
        } else {
            fileDetailsDiv.style.display = 'none'; // Ocultar el div
        }
    }
</script>
@endsection
