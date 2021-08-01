<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => ENV_DB_DSN,
            'username' => ENV_DB_USERNAME,
            'password' => ENV_DB_PASSWORD,
            'tablePrefix' => ENV_DB_TABLE_PREFIX,
            'charset' => ENV_DB_CHARSET,
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => ENV_MAILER_TRANSPORT,
        ],
    ],
];
