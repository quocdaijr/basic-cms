<?php

namespace backend\modules\user;

use Yii;

/**
* user module definition class
*/
class Module extends \yii\base\Module
{
    /**
    * {@inheritdoc}
    */
    public $controllerNamespace = 'backend\modules\user\controllers';

    /**
    * {@inheritdoc}
    */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/config.php');
        // custom initialization code goes here
    }
}
