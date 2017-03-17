<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modman app keys
    |--------------------------------------------------------------------------
    |
    | Keys used to request Modman allowed Modules
    */

    'systems' =>  [
        'barbieri_management' => [
            'key' => 'M33',
            'modules' =>  [
                'cadastro_funcionario' => [
                    'key' => 'M33',
                    'functionalities' => [
                        'create_employee' => [
                            'key' => 'F113'
                        ],
                        'edit_employee' => [
                            'key' => 'F123'
                        ],
                        'alter_employee_registration' => [
                            'key' => 'F133'
                        ],
                    ]
                ]
            ]
        ]
    ],

];
