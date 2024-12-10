@extends('materias.index')
@section('form')
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
   {{$error}}
  </div>
@endforeach
@endif
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >ID Materia</label>
      <input type="text" required class="form-control" required
      value="{{old('idMateria',$dato->idMateria)}}" id="idMateria" name="idMateria" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nombre de Materia</label>
      <input type="text" required value="{{old('nombreMateria',$dato->nombreMateria)}}"
       class="form-control" id="nombreMateria" name="nombreMateria">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nivel</label>
      <Select name="nivel" required>
        <option value="L">Licenciatura</option>
        <option value="D">Doctorado</option>
        <option value="M">Maestria</option>
      </Select>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nombre Mediano</label>
        <input type="text" required value="{{old('nombreMediano',$dato->nombreMediano)}}"
         class="form-control" id="nombreMediano" name="nombreMediano">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nombre Corto</label>
        <input type="text" required value="{{old('nombreCorto',$dato->nombreCorto)}}"
         class="form-control" id="nombreCorto" name="nombreCorto">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Modalidad</label>
        <Select name="modalidad">
          <option value="V">Virtual</option>
          <option value="P" selected>Presencial</option>
          <option value="M">Mixta</option>
        </Select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Creditos</label>
        <input type="number" name="creditos" id="" value="{{old('creditos',$dato->creditos)}}" max="8">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Semestre</label>
        <input type="number" name="semestre" id="" value="{{old('semestre',$dato->semestre)}}" max="8">
      </div>

<label for="
">
Reticula
<select name="idReticula" id="idReticula" required>
  
    @foreach ($reticulas as $reticula)
    
    <option value="{{$reticula->idReticula}}">{{$reticula->descripcion}}</option>
@endforeach
</select></label>
    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection