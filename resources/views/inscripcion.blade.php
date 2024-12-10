@extends('dashboard')

@section('contenido')
<div class="container">
    <h2>Inscripción/Reinscripción de Alumno</h2>

    <!-- Mostrar mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Formulario de Inscripción -->
    <form action="{{ route('inscripcion') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="alumno_id">Alumno</label>
            <select name="alumno_id" class="form-control" required>
                <option value="">Selecciona un Alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->noctrl }}">{{ $alumno->noctrl }} - {{ $alumno->nombreAlumno }} {{ $alumno->apellidoPaterno }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="periodo_id">Periodo</label>
            <select name="periodo_id" class="form-control" required>
                <option value="">Selecciona un Periodo</option>
                @foreach($periodos as $periodo)
                    <option value="{{ $periodo->idPeriodo }}">{{ $periodo->periodo }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</div>
@endsection
