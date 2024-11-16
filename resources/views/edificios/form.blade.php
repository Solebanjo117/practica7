@extends('edificios.index')
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
      <label for="exampleInputEmail1" class="form-label" >Nombre edificio</label>
      <input type="text" required class="form-control" 
      value="{{old('nombre',$dato->nombre)}}" id="nombre" name="nombre" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >Nombre corto</label>
      <input type="text" required class="form-control" 
      value="{{old('nombreCorto',$dato->nombreCorto)}}" id="nombreCorto" name="nombreCorto" aria-describedby="emailHelp">
    </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection