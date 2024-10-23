@extends('carreras.index')
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
      <label for="exampleInputEmail1" class="form-label" >ID Carrera</label>
      <input type="text" required class="form-control" required
      value="{{old('idCarrera',$dato->idCarrera)}}" id="idCarrera" name="idCarrera" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nombre de Carrera</label>
      <input type="text" required value="{{old('nombreCarrera',$dato->nombreCarrera)}}"
       class="form-control" id="nombreCarrera" name="nombreCarrera">
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
<label for="
">
Departamento
<select name="idDepto" id="idDepto">
  
    @foreach ($deptos as $depto)
    
    <option value="{{$depto->idDepto}}">{{$depto->nombreDepto}}</option>
@endforeach
</select></label>
    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection