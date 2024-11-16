@extends('personals.index')
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
      <label for="exampleInputEmail1" class="form-label" >Numero Trabajador</label>
      <input type="text" required class="form-control" required
      value="{{old('noTrabajador',$dato->noTrabajador)}}" id="noTrabajador" name="noTrabajador" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">RFC</label>
        <input type="text" required value="{{old('RFC',$dato->RFC)}}"
         class="form-control" id="RFC" name="RFC">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nombres</label>
        <input type="text" required value="{{old('nombres',$dato->nombres)}}"
         class="form-control" id="nombres" name="nombres">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Apellido Paterno</label>
        <input type="text" required value="{{old('apellidoPaterno',$dato->apellidoPaterno)}}"
         class="form-control" id="apellidoPaterno" name="apellidoPaterno">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Apellido Materno</label>
        <input type="text"  value="{{old('apellidoMaterno',$dato->apellidoMaterno)}}"
         class="form-control" id="apellidoMaterno" name="apellidoMaterno">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Licenciatura</label>
        <input type="text"  value="{{old('licenciatura',$dato->licenciatura)}}"
         class="form-control" id="licenciatura" name="licenciatura">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Fecha de ingreso SEP</label>
        <input type="date"  value="{{old('fechaIngSep',$dato->fechaIngSep)}}"
         class="form-control" id="fechaIngSep" name="fechaIngSep">
         <label for="exampleInputPassword1" class="form-label">Fecha de ingreso institucion</label>
         <input type="date"  value="{{old('fechaIngIns',$dato->fechaIngIns)}}"
          class="form-control" id="fechaIngIns" name="fechaIngIns">
      </div>


<label for="
">
Departamento
<select name="idDepto" id="idDepto">
  
    @foreach ($deptos as $depto)
    
    <option value="{{$depto->idDepto}}">{{$depto->nombreDepto}}</option>
@endforeach
</select></label>

<label for="
">
Puesto
<select name="idPuesto" id="idPuesto">
  
    @foreach ($puestos as $puesto)
    
    <option value="{{$puesto->idPuesto}}">{{$puesto->nombre}}</option>
@endforeach
</select></label>
    <br><br>
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection