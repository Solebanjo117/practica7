@extends('plazas.index')
@section('form')

    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ID Plaza</label>
      <input type="text" required class="form-control"
      value="{{old('idPlaza',$dato->idPlaza)}}" id="idPlaza" name="idPlaza" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Nombre de Plaza</label>
      <input type="text" value="{{old('nombrePlaza',$dato->nombrePlaza)}}"
       class="form-control" id="nombrePlaza" name="nombrePlaza">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>

  @endsection