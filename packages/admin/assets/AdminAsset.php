<?php


namespace admin\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $sourcePath = '@admin/assets';
    public $css = [
        'css/main.css',
    ];
    public $js = [
    ];
    public $depends = [
        'admin\assets\FontAwesomeAsset',
        'admin\assets\AdminLteAsset',
    ];
}