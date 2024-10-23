@extends('reticulas.index')
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
      <label for="exampleInputEmail1" class="form-label" >ID Reticula</label>
      <input type="text" required class="form-control" required
      value="{{old('idReticula',$dato->idReticula)}}" id="idReticula" name="idReticula" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Descripcion</label>
        <input type="text" required value="{{old('descripcion',$dato->descripcion)}}"
         class="form-control" id="descripcion" name="descripcion">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Fecha en vigor</label>
        <input type="date" required value="{{old('fechaEnVigor',$dato->fechaEnVigor)}}"
         class="form-control" id="fechaEnVigor" name="fechaEnVigor">
      </div>
<label for="
">
Carrera
<select name="idCarrera" id="idCarrera">
  
    @foreach ($carreras as $carrera)
    
    <option value="{{$carrera->idCarrera}}">{{$carrera->nombreCarrera}}</option>
@endforeach
</select></label>
    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection