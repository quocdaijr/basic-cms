<?php
use common\constants\BaseConstant;

return [
    'components' => [
    
        'userService' => [
            'class' => '\backend\modules\user\components\services\UserServiceProvider',
            'type' => BaseConstant::METHOD_DB
        ],
        
        'userRepository' => [
            'class' => '\backend\modules\user\components\repositories\UserRepositoryProvider',
            'type' => BaseConstant::METHOD_DB
        ]
    
    ]
];

