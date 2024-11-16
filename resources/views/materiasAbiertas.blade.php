@extends('dashboard')
@section('contenido')
    <div class="row">
        <h3>Apertura de materias</h3>
    </div>
    <form action="{{route('materiasA.store')}}">
        <div class="col">
            <label for="">
                Periodos
                <select name="idPeriodo" id="idPeriodo">
                    @foreach ($periodos as $periodo)
                    <option value="{{$periodo->idPeriodo}}">{{$periodo->periodo}}</option>
                    @endforeach
                </select>
            </label>
            <br>
           <label for="">Carreras
            <select name="idCarrera" id="idCarrera" onchange="this.form.submit()">
                @foreach ($carreras as $carrera)
                <option value="{{ $carrera->idCarrera }}" {{ old('idCarrera') == $carrera->idCarrera ? 'selected' : '' }}>{{ $carrera->nombreCarrera }}</option>
     
                @endforeach
            </select>
           </label>
        </div>
        <div class="row">
            <div class="col">
                <button type="button"  >
                    Sem1
                    </button><br>
                    <input type="checkbox" name="m1" id="m1" >Materia1 <br>
                    <input type="checkbox" name="m2" id="m2">Materia2 <br>
                    <input type="checkbox" name="m3" id="m3">Materia3 <br>
                    <input type="checkbox" name="m4" id="m4">Materia4 <br>
    
    
            </div>
            <div class="col">
                <button type="button"  >
                    Sem2
                    </button><br>
                    <input type="checkbox" name="m1" id="m1">Materia1 <br>
                    <input type="checkbox" name="m2" id="m2">Materia2 <br>
                    <input type="checkbox" name="m3" id="m3">Materia3 <br>
                    <input type="checkbox" name="m4" id="m4">Materia4 <br>
    
    
            </div>
            <div class="col">
                <button type="button"  >
                    Sem3
                    </button><br>
                    <input type="checkbox" name="m1" id="m1">Materia1 <br>
                    <input type="checkbox" name="m2" id="m2">Materia2 <br>
                    <input type="checkbox" name="m3" id="m3">Materia3 <br>
                    <input type="checkbox" name="m4" id="m4">Materia4 <br>
    
    
            </div>
        </div>
    </form>
@endsection