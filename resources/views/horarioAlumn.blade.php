<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Horario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Alta de Horario</h1>

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

    <script src="https://cdn.jsde
