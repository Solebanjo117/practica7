@extends('dashboard')
@section('contenido')
<h3>Asignacion grupo</h3>
<div class="container">
   <form action="{{route('grupos.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-3">
            <label for="">Fecha:
                <input type="date" id="fecha" name="fecha" value="{{date('d/m/Y')}}">
            </label>
            <label for="">Grupo: <input type="text" value="{{ old('grupo', session('grupo')?->nombreGrupo ?? '') }}" id="grupo" name="grupo">
            </label>
        </div>
        <div class="col-3">
            <label for="">Max alumnos:
                <input type="number" id="max_alumnos"  value="{{ old('max_alumnos', session('grupo')?->maxAlumnos ?? '') }}" name="max_alumnos">
            </label>
        </div>
        <div class="col-3">
            <label for="">Descripcion: <br>
                <input type="text" id="desc" value="{{ old('desc', session('grupo')?->descripcionGrupo ?? '') }}" name="desc">
            </label>
        </div>
        <div class="col-2" >
            <select name="idPeriodo" id="">
                <option value="-1">Sel. Periodo</option>
                @foreach ($periodos as $periodo)
                <option @selected(session('grupo')?->idPeriodo == $periodo->idPeriodo)
                 value="{{$periodo->idPeriodo}}">{{$periodo->periodo}}</option>
                @endforeach
            </select>
            <select name="idCarrera" id="">
                <option value="-1">Sel. Carrera</option>
                @foreach ($carreras as $carrera)
                <option 
                value="{{$carrera->idCarrera}}">{{$carrera->nombreCarrera}}</option>
                @endforeach
            </select>
        </div>
        
    </div>
   
    <br>
    <div class="row">
        <button type="submit" class="btn btn-primary" id="btnAsignar">Asignar horario 
    </div>
   
    @error('idPeriodo')
    <br>
    <div class="alert alert-success" role="alert">
        Selecciona un periodo
      </div>
    @enderror
    @session('status')
    <br>
    <div class="alert alert-success" role="alert">
        {{session('status')}}
      </div>
    @endsession
</form>
<form action="{{route('asignarGrupo.store')}}" method="post">
    @csrf
@session('grupo')
<br>
<div class="row">
    <button type="submit"  class="btn btn-success" id="btnAsignar">Terminar con el horario</button>
</div>
@endsession
    <hr><hr>
    <div class="row">
        <div class="col">
            <select name="sem" id="semestre" onchange="cambiar()">
                @for ($i = 1; $i <= 9; $i++)
                <option @selected(session('semestre') == $i) value="{{$i}}">Semestre {{$i}}</option>
            @endfor
                
            </select>
            <ul class="list-group">
                @session('materias')
                    @foreach (session('materias') as $item)
                        <li><input type="radio" name="1" id="" value="{{$item->idMateria}}">{{$item->materia->nombreMateria}}</li>
                    @endforeach
                @endsession
            </ul>
        </div>
        <div class="col">
            <select name="sem" id="depto" onchange="cambiar()">
               
               @foreach ($deptos as $item)

                   <option @selected(session('depto')?->idDepto == $item->idDepto)
                    value="{{$item->idDepto}}">{{$item->nombreDepto}}</option>
               @endforeach

        </select>
        <input type="radio" name="ing" id="">Ing chaves soto
        <input type="radio" name="flor" id="">Ing Flor maria
        <input type="radio" name="aqui" id="">Ing Aquiles
        </div>
        <div class="col">
            <select name="" id="edificio" onchange="cambiar()">
                @foreach ($edificios as $item)
                    <option  @selected(session('edificio')?->id == $item->id)
                    value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select>
            <input type="radio" name="ing" id="">Salon k1
        <input type="radio" name="flor" id="">salon k2
        <input type="radio" name="aqui" id="">salon k3
        </div>
        <div class="col-4">
            
            <table class="table table-primary" >
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>L</th>
                        <th>M</th>
                        <th>X</th>
                        <th>J</th>
                        <th>V</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Generar filas dinámicamente -->
                    <script>
                        const startHour = 8;
                        const endHour = 20; // hasta las 20 (8 PM)
                        for (let i = startHour; i < endHour; i++) {
                            document.write(`
                                <tr>
                                    <td>${i}-${i + 1}</td>
                                    <td><input type="checkbox" /></td>
                                    <td><input type="checkbox" /></td>
                                    <td><input type="checkbox" /></td>
                                    <td><input type="checkbox" /></td>
                                    <td><input type="checkbox" /></td>
                                </tr>
                            `);
                        }
                    </script>
                </tbody>
            </table>
            
        </div>
    </div>
</form>
<br>
</div>
<script>
    function cambiar(){
        let semestre = document.getElementById('semestre').value;
        let edificio = document.getElementById('edificio').value;
        let depto = document.getElementById('depto').value;
        var routeBase = "{{ route('asignarGrupo.show', [':semestreId', 'id1', 'id2']) }}";
        var url = routeBase.replace(':semestreId', semestre).replace('id1',depto).replace('id2',edificio);
        window.location.href = url;
    }
</script>
@endsection