<?php

namespace backend\modules\system;

use Yii;

/**
* system module definition class
*/
class Module extends \yii\base\Module
{
    /**
    * {@inheritdoc}
    */
    public $controllerNamespace = 'backend\modules\system\controllers';

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
