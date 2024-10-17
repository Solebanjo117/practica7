@extends('puestos.index')
@section('form')

    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ID Puesto</label>
      <input type="text" required class="form-control"
      value="{{old('idPuesto',$dato->idPuesto)}}" id="idPuesto" name="idPuesto" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nombre de Puesto</label>
      <input type="text" value="{{old('nombre',$dato->nombre)}}"
       class="form-control" id="nombre" name="nombre">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tipo de Puesto</label>
        <input type="text" value="{{old('tipo',$dato->tipo)}}"
         class="form-control" id="tipo" name="tipo">
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>

  @endsection