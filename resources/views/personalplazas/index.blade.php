@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'personalplazas.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('personalplazas.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'personalplazas.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('personalplazas.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('personalplazas.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('personalplazas.tabla',compact('datos','ruta_base'))
@endsection