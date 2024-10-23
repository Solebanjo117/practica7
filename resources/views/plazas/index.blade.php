@extends('dashboard')
@section('contenido')
@session('status')

<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'plazas.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('plazas.store')}}" method="post" style="width: 26rem;">
@elseif (Route::currentRouteName() == 'plazas.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('plazas.update',$dato)}}" method="post" style="width: 26rem;">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('plazas.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('tabla',compact('datos','columnas','columnas_omitidas','ruta_base'))
@endsection