@extends('dashboard')
@section('contenido')
<div class="row">
    <div class="col-10">
        <h3>Apertuda de Materias</h3>
    </div>
    <div class="col-2">
        {{-- {!!dd(request()->all())!!} --}}
        {{session("periodo_id")}}
        {{session('carrera_id')}}
        <form action="{{route('materiasA.index')}}" method="get">
            <select name="idPeriodo" id="idperiodo" onchange="this.form.submit()">
                <option value="-1">Seleccione el periodo</option>
                @foreach ($periodos as $periodo )
                <option value="{{$periodo->idPeriodo}}" @if($periodo->idPeriodo == session('periodo_id'))
                    {{ "selected" }}
                    @endif
                    >{{$periodo->idPeriodo}} {{ $periodo->periodo }}</option>
                @endforeach

            </select><br>
            <select name="idCarrera" id="idcarrera" onchange="this.form.submit()">
                <option value="-1">Seleccione la carrera</option>
                @foreach ($carreras as $carr )
                <option value="{{$carr->idCarrera}}" @if($carr->idCarrera == session('carrera_id'))
                    {{ "selected" }}
                    @endif
                    >{{$carr->idCarrera}} {{$carr->nombreCarrera }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <form action="{{route('materiasA.store')}}" method="post">
            @csrf
            <input type="hidden" name="eliminar" id="eliminar" value="NOELIMINAR">
            <button>Sem 1</button><br>
            @if($carrera->count() and session('periodo_id') != "-1")
            @foreach ( $carrera[0]->reticulas[0]->materias as $materia )
           
            <input type="checkbox" 
                    name="m{{$materia->idMateria}}" 
                    value="{{$materia->idMateria}}" 
                    onchange="enviar(this)"
                    @if ( $ma->firstWhere('idMateria',$materia['idMateria']))
                        {{"checked"}}
                    @endif>
            {{$materia->idMateria}}
            {{$materia->nombreMateria}}<br>
            @endforeach
            @endif
        </form>
    </div>
</div>
<script>

    function enviar(chbox){
        if (!chbox.checked){
            document.getElementById('eliminar').value = chbox.value;
        }
        chbox.form.submit();    
        }
</script>
@endsection