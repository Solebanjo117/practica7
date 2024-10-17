@extends('alumnos.index')
@section('form')
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >Numero de control</label>
      <input type="text" required class="form-control" required
      value="{{old('noctrl',$dato->noctrl)}}" id="noctrl" name="noctrl" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nombre de Alumno</label>
      <input type="text" required value="{{old('nombreAlumno',$dato->nombreAlumno)}}"
       class="form-control" id="nombreAlumno" name="nombreAlumno">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nombre Paterno</label>
        <input type="text" required value="{{old('apellidoPaterno',$dato->apellidoPaterno)}}"
         class="form-control" id="apellidoPaterno" name="apellidoPaterno">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nombre Materno</label>
        <input type="text" value="{{old('apellidoMaterno',$dato->apellidoMaterno)}}"
         class="form-control" id="apellidoMaterno" name="apellidoMaterno">
      </div>
      <div class="mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <Select id="sexo" name="sexo">
            <option value="H" selected>Hombre</option>
            <option value="M" >Mujer</option>
        </Select>
      </div>


    <div class="mb-3">
      <label for="idCarrera">Carrera</label>
        <select name="idCarrera" id="idCarrera">
          @foreach ($carreras as $carrera)
              <option value="{{$carrera->idCarrera}}">{{$carrera->nombreCarrera}}</option>
          @endforeach
        </select>
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection