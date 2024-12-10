@extends('dashboard')

@section('contenido')
<div class="container">
    <h2>Subir Archivos</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ url('archivos') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="alumno_id">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-control" onchange="verificar()">
                <option value="">Selecciona alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->noctrl }}"> {{ $alumno->noctrl }} - {{ $alumno->nombreAlumno }} {{ $alumno->apellidoPaterno }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="pago_pdf">Archivo de Pago (PDF)</label>
            <input type="file" name="pago_pdf" id="pago_pdf" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="identificacion_pdf">Archivo de Identificación (PDF)</label>
            <input type="file" name="identificacion_pdf" id="identificacion_pdf" class="form-control" required>
        </div>

        <button type="submit" id="boton" class="btn btn-primary">Subir Archivos</button>
    </form>
</div>
<script>
function verificar(){
  /*  var alumno_id = document.getElementById("alumno_id").value;
    let boton = document.getElementById("boton");
    axios.get(`api/archivos/${alumno_id}`).then(function (response) {
    if(response.data.length > 0){
        boton.disabled = true;
        alert("El alumno ya tiene archivos subidos");
        }else{
            boton.disabled = false;
        }
})
.catch(function (error) {
    console.error('Error:', error);
});*/
}
</script>
@endsection
