@extends('dashboard');
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'alumnos.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('alumnos.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'alumnos.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('alumnos.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('alumnos.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('tabla',compact('datos','columnas','columnas_omitidas','ruta_base'))
@endsection