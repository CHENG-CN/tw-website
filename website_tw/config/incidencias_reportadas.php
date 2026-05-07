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
        'estado' => "Pendiente",
        'foto' => 'storage/incidencias/baches.jpeg',
        'info_img' => "Baches",
        ],
        

        [
            'id' => '3',
            'titulo' => 'Farolas rotas',
            'fecha' => '4/5/2026',
            'reportador' => 'admin',
            'detalle' => 'Farolas rotas en plaza españa',
            'ubicacion' => 'Parque Almunia',
            'estado' => "En proceso", //cambiarlo por sin validar
            'foto' => 'storage/incidencias/farolas.jpeg',
            'info_img' => "Farola",
        ],
    ],
    
    'pepito' => [
        [ 'id' => '2',
        'titulo' => "Semaforos rotos",
        'fecha' => '1/5/2026',
        'reportador' => 'Pepito',
        'detalle' => 'Semaforos rotos',
        'ubicacion' => 'C/Ronda n100 ', 
        'estado' => "Solucionado",
        'foto' => 'storage/incidencias/semaforos.jpeg',
        'info_img' => "Semaforos",],

        [ 'id' => '4',
        'titulo' => "Baches en carretera",
        'fecha' => '1/5/2026',
        'reportador' => 'Pepito',
        'detalle' => 'Se han encontrado baches en el suelo',
        'ubicacion' => 'Plaza de toros n20 ', 
        #'estado' => "Sin validar",
        'foto' => 'storage/incidencias/baches.jpeg',
        'info_img' => "Descripción imagen",
        ]
    ],

];
