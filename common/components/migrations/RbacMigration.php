<?php


namespace common\components\migrations;


use yii\db\Migration;
use yii\rbac\BaseManager;
use yii\rbac\DbManager;
use yii\rbac\PhpManager;

class RbacMigration extends Migration
{
    /**
     * @var DbManager | PhpManager | BaseManager
    */
    public $auth = 'authManager';

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->auth = \Yii::$app->get('authManager');
    }
}