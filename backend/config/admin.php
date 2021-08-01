<?php
return [
    'aliases' => [
        '@admin' => '@vendor/quocdaijr/admin',
    ],
    'components' => [
        'user' => [
            'identityClass' => 'admin\models\User',
            'loginUrl' => '/admin/sign-in/login',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%rbac_auth_item}}',
            'itemChildTable' => '{{%rbac_auth_item_child}}',
            'assignmentTable' => '{{%rbac_auth_assignment}}',
            'ruleTable' => '{{%rbac_auth_rule}}',
        ]
    ],
    'modules' => [
        'admin' => [
            'class' => 'admin\Module'
        ]
    ],
    'as access' => [
        'class' => 'admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*'
        ]
    ],
    'params' => [
        'admin.configs' => [
            'menuTable' => '{{%menu}}',
            'strict' => false
        ],
        'user.passwordResetTokenExpire' => 3600,
        'user.passwordMinLength' => 8,
    ]
];