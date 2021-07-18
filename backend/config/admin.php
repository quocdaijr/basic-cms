<?php
return [
    'modules' => [
        'admin' => [
            'class' => 'admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id',
                    'usernameField' => 'username',
                ]
            ],
            'mainLayout' => '@backend/views/layouts/main.php',
            'layout' => 'left-menu',
//            'menus' => [
//                'assignment' => [
//                    'label' => 'Cấp Quyền User' // change label
//                ],
//                'rule' => null, // disable menu route
//                'user' => null, // disable menu route
//            ]
        ]
    ],
    'as access' => [
        'class' => 'admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*'
        ]
    ],
    'params'         => [
        'mdm.admin.configs' => [
            'menuTable' => '{{%menu}}',
            'strict' => false
        ],
    ]
];