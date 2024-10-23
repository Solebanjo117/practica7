@extends('periodos.index')
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
      <label for="exampleInputEmail1" class="form-label" >ID Periodo</label>
      <input type="text" required class="form-control" required
      value="{{old('idPeriodo',$dato->idPeriodo)}}" id="idPeriodo" name="idPeriodo" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Periodo</label>
      <input type="text" required value="{{old('periodo',$dato->periodo)}}"
       class="form-control" id="periodo" name="periodo">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Descripcion corta</label>
      <input type="text" maxlength="10" required value="{{old('descCorta',$dato->descCorta)}}"
       class="form-control" id="descCorta" name="descCorta">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Fecha de inicio</label>
        <input type="date" required value="{{old('fechaIni',$dato->fechaIni)}}"
         class="form-control" id="fechaIni" name="fechaIni">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Fecha de fin</label>
        <input type="date" required value="{{old('fechaFin',$dato->fechaFin)}}"
         class="form-control" id="fechaFin" name="fechaFin">
      </div>
   
    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection