<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Asegúrate de incluir las rutas necesarias
    'allowed_methods' => ['*'], // Permitir todos los métodos (GET, POST, PUT, DELETE)
    'allowed_origins' => ['*'], // Permitir solicitudes desde cualquier origen
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Permitir todos los encabezados
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
