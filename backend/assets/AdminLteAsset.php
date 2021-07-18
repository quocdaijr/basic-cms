<?php


namespace backend\assets;


use yii\web\AssetBundle;

class AdminLteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
//        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'adminlte/dist/css/adminlte.min.css',
    ];
    public $js = [
        'adminlte/dist/js/adminlte.js',
    ];
}