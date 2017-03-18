<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Modman base api URL
    |--------------------------------------------------------------------------
    */
    'api_base_url' => '',

    /*
    |--------------------------------------------------------------------------
    | Modman app configuration
    |--------------------------------------------------------------------------
    |
    | Keys used to request Modman allowed Modules
    */

    'systems' =>  [
        'barbieri_management' => [
            'key' => 'S35',
            'modules' =>  [
                'employee' => [
                    'key' => 'M43',
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
