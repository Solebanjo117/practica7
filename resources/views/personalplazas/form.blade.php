@extends('personalplazas.index')
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
      <label for="exampleInputEmail1" class="form-label" >tipo nombramiento</label>
      <input type="number" required class="form-control" 
      value="{{old('tipoNombramiento',$dato->tipoNombramiento)}}" id="tipoNombramiento" name="tipoNombramiento" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Plaza</label>
      <select name="idPlaza" id="">
        @foreach ($plazas as $plaza)
        <option value="{{$plaza->idPlaza}}">{{$plaza->nombrePlaza}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Personal</label>
        <select name="idPersonal" id="">
          @foreach ($personales as $personal)
          <option value="{{$personal->noTrabajador}}">{{$personal->nombres}}</option>
          @endforeach
        </select>
      </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
<br><br>
  @endsection