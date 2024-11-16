@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'lugares.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('lugares.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'lugares.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('lugares.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('lugares.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('lugares.tabla',compact('datos','ruta_base'))
@endsection