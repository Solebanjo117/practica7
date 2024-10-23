@extends('deptos.index')
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
      <label for="exampleInputEmail1" class="form-label" >ID Departamento</label>
      <input type="text" required class="form-control" required
      value="{{old('idDepto',$dato->idDepto)}}" id="idDepto" name="idDepto" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nombre de Departamento</label>
      <input type="text" required value="{{old('nombreDepto',$dato->nombreDepto)}}"
       class="form-control" id="nombreDepto" name="nombreDepto">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nombre Corto</label>
        <input type="text" required value="{{old('nombreCorto',$dato->nombreCorto)}}"
         class="form-control" id="nombreCorto" name="nombreCorto">
      </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection