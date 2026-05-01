<?php

return [
    /* Cada usuario tendrá unas incidencias asociadas */
    'admin' => [
        [ 'id' => '1',
        'titulo' => "Baches en las carreteras",
        'fecha' => '1/5/2026',
        'reportador' => 'admin',
        'detalle' => 'Hay unos baches en el suelo',
        'ubicacion' => 'C/Ronda n100 ', 
        'estado' => "resuelta",
        'foto' => 'storage/incidencias/baches.jpeg'],
    ],
    'pepito' => [
        [ 'id' => '2',
        'titulo' => "Semaforos rotos",
        'fecha' => '1/5/2026',
        'reportador' => 'Pepito',
        'detalle' => 'Semaforos rotos',
        'ubicacion' => 'C/Ronda n100 ', 
        'estado' => "pendiente",
        'foto' => 'storage/incidencias/semaforos.jpeg'],
    ]
];
