@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'edificios.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('edificios.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'edificios.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('edificios.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('edificios.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('edificios.tabla',compact('datos','ruta_base'))
@endsection