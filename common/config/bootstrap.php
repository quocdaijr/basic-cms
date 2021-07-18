<?php
require_once __DIR__ . '/../helpers.php';

Yii::setAlias('@root', dirname(__DIR__, 2));
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
