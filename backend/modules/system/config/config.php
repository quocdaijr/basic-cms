<?php
use common\constants\BaseConstant;

return [
    'components' => [
    
        'systemService' => [
            'class' => '\backend\modules\system\components\services\SystemServiceProvider',
            'type' => BaseConstant::METHOD_DB
        ],
        
        'systemRepository' => [
            'class' => '\backend\modules\system\components\repositories\SystemRepositoryProvider',
            'type' => BaseConstant::METHOD_DB
        ]
    
    ]
];

