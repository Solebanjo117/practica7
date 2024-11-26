@extends('dashboard')
@section('contenido')


    <div class="container mt-5">
        <h1 class="text-center mb-4">Alta de Horario</h1>

        <!-- Buscador de Alumnos -->
        <div class="row mb-4">
            <div class="col-md-12">
                <label for="buscador-alumno" class="form-label"><strong>Buscar Alumno por Número de Control</strong></label>
                <div class="input-group">
                    <input type="text" id="buscador-alumno" class="form-control" placeholder="Ingrese el número de control">
                    <button class="btn btn-secondary" type="button">Buscar</button>
                </div>
            </div>
        </div>

        <!-- Formulario -->
        <form action="#" method="POST">
            <!-- Simulación de protección CSRF -->
            <input type="hidden" name="_token" value="fictitious_csrf_token">

            <div class="row">
                <!-- Selección de Materias -->
                <div class="col-md-6">
                    <h4>Selecciona las Materias</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input type="checkbox" name="materias[]" value="1" id="materia_1">
                            <label for="materia_1">Matemáticas</label>
                        </li>
                        <li class="list-group-item">
                            <input type="checkbox" name="materias[]" value="2" id="materia_2">
                            <label for="materia_2">Historia</label>
                        </li>
                        <li class="list-group-item">
                            <input type="checkbox" name="materias[]" value="3" id="materia_3">
                            <label for="materia_3">Física</label>
                        </li>
                    </ul>
                </div>

                <!-- Selección de Horarios -->
                <div class="col-md-6">
                    <h4>Selecciona los Horarios</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input type="checkbox" name="horarios[]" value="101" id="horario_101">
                            <label for="horario_101">Matemáticas - Lunes 08:00 - 09:00</label>
                        </li>
                        <li class="list-group-item">
                            <input type="checkbox" name="horarios[]" value="102" id="horario_102">
                            <label for="horario_102">Historia - Martes 09:00 - 10:00</label>
                        </li>
                        <li class="list-group-item">
                            <input type="checkbox" name="horarios[]" value="103" id="horario_103">
                            <label for="horario_103">Física - Miércoles 10:00 - 11:00</label>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Botón de Enviar -->
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar Horario</button>
                </div>
            </div>
        </form>
    </div>

  



@endsection