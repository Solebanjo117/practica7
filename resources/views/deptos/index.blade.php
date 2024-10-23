@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'deptos.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('deptos.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'deptos.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('deptos.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('deptos.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('deptos.tabla',compact('datos','ruta_base'))
@endsection