<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' =>[
                '@common/migrations/db',
                '@backend/modules/category/migrations'
            ],
            'migrationTable' => '{{%system_db_migration}}'
        ],
        'admin-migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@admin/migrations',
        ],
        'rbac-migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/migrations/rbac/',
            'migrationTable' => '{{%system_rbac_migration}}',
        ],
        'audit-migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'db' => 'db_audit',
            'migrationNamespaces' => [
                'bedezign\yii2\audit\migrations',
            ],
        ],
    ],
    'modules' => [],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
