@extends('dashboard');
@section('contenido')
@session('status')
<div class="alert alert-primary" role="alert">
    {{session('status')}}
  </div>
@endsession
@if (Route::currentRouteName() == 'personals.create')
<!-- Mostrar contenido específico para la ruta .create -->
<form action="{{route('personals.store')}}" method="post" >
@elseif (Route::currentRouteName() == 'personals.edit')
<!-- Mostrar contenido específico para la ruta .edit -->
<form action="{{route('personals.update',$dato)}}" method="post">
  @method('PUT')
@endif
    @yield('form')
</form>
<a href="{{route('personals.create')}}" class="btn btn-outline-dark">Nuevo</a>
@include('personals.tabla',compact('datos','ruta_base'))
@endsection