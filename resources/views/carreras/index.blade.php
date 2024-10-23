@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'carreras.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('carreras.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'carreras.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('carreras.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('carreras.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('carreras.tabla',compact('datos','ruta_base'))
@endsection