<br>
<br>
{{$datos->links()}}
<!-- 'datos','columnas','columnas_omitidas','ruta_base'
    datos: Los registros a mostrar
    columnas: Los nombres de las columnas a mostrar
    columnas_omitidas: Los nombres de las columnas a omitir
    ruta_base: La ruta dinamica para el update y delete
-->

<div
    class="table-responsive"
>
    <table
        class="table table-striped table-hover table-borderless table-primary align-middle"
    >
        <thead class="table-light">
            <caption>
                Periodos
            </caption>
            <tr>
               <th>ID Periodo</th>
               <th>Periodo</th>
               <th>Descripcion corta</th>
               <th>Fecha inicio</th>
               <th>Fecha fin</th>
            <th>Editar</th>
            <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
         @foreach ($datos as $fila)
         
         <tr class="table-primary"> 
         <td>{{ $fila->idPeriodo}}</td>
         <td>{{ $fila->periodo }}</td>
         <td>{{ $fila->descCorta }}</td>
         <td>{{ $fila->fechaIni }}</td>
         <td>{{ $fila->fechaFin }}</td> 
         <td><a class="btn btn-outline-primary" href="{{route($ruta_base.'.edit',$fila)}}">Editar</a></td>
       <td>
        <form action="{{route($ruta_base.'.destroy',$fila)}}" onsubmit="return confirm('Estás seguro de eliminar el registro?')" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger" type="submit">Eliminar</button>
        </form>
    </td>
         </tr>
     
         @endforeach
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
</div>
