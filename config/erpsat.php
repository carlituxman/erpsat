<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuración ERPsat
    |--------------------------------------------------------------------------
    |
    |
    */

    'version'   => '0.1',
    'app'       => 'ERPsat',

    'menu' => array(

        'web'  => [

            array(
                "nom" => "ERPsat", "url" => "#home", "rol" => [0], "icon" => "fa-building-o",
                    "opciones" => [
                        // ["nom" => "Socios Activos", "url" => route('admin.empresas.list',1), "rol" => [1,2], "icon" => "fa-list"],
                        // ["nom" => "-", "url" => "-", "rol" => [1,2]],
                        // ["nom" => "Nueva...", "url" => route('admin.empresas.nueva'), "rol" => [1,2], "icon" => "fa-building"],
                    ]
            ),
        ],

        'left'  => [

            array(
                "nom" => "CRM", "url" => "#menu-empresa", "rol" => [1,2], "icon" => "fa-building-o",
                    "opciones" => [
                        // ["nom" => "Socios Activos", "url" => route('admin.empresas.list',1), "rol" => [1,2], "icon" => "fa-list"],
                        // ["nom" => "-", "url" => "-", "rol" => [1,2]],
                        // ["nom" => "Nueva...", "url" => route('admin.empresas.nueva'), "rol" => [1,2], "icon" => "fa-building"],
                    ]
            ),
        ]
    ),

];