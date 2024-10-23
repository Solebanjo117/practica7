@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'materias.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('materias.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'materias.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('materias.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('materias.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('materias.tabla',compact('datos','ruta_base'))
@endsection