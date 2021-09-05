<?php
return [
    'components' => [
        'db_audit' => [
            'class' => 'yii\db\Connection',
            'dsn' => ENV_DB_AUDIT_DSN,
            'username' => ENV_DB_AUDIT_USERNAME,
            'password' => ENV_DB_AUDIT_PASSWORD,
            'tablePrefix' => ENV_DB_AUDIT_TABLE_PREFIX,
            'charset' => ENV_DB_AUDIT_CHARSET,
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
    ],
    'modules' => [
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',
            'db' => 'db_audit',
            'layout' => '@backend/views/layouts/main.php',
            'accessIps' => ["*"],
            'ignoreActions' => [
                " ",
                "*/debug",
                "*/audit",
                "debug/*",
                "audit/*",
                "*/debug/*",
                "*/audit/*",
                "*/admin",
                "*/index",
                "*/view",
                "*/narrative-event/sumary",
                "*/narrative-event/ajax-event",
                "sign-in/login",
                "site/captcha",
                "site/error",
                "site/socket-port",
                "site/check-user"
            ],
            'accessRoles' => ['administrator'],
            'accessUsers' => null,
            'userIdentifierCallback' => ['admin\models\User', 'userIdentifierCallbackForAudit'],
            'userFilterCallback' => ['admin\models\User', 'filterByUserIdentifierCallbackForAudit'],
        ]
    ]
];