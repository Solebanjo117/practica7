@extends('dashboard');
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'reticulas.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('reticulas.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'reticulas.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('reticulas.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('reticulas.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('reticulas.tabla',compact('datos','ruta_base'))
@endsection