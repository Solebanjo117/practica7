@extends('dashboard')
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'periodos.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('periodos.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'periodos.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('periodos.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('periodos.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('periodos.tabla',compact('datos','ruta_base'))
@endsection