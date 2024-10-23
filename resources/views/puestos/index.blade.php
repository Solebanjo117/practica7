@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'puestos.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('puestos.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'puestos.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('puestos.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('puestos.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('tabla',compact('datos','columnas','columnas_omitidas','ruta_base'))
@endsection