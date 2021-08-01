<?php


namespace admin\assets;


use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@npm/font-awesome';
    /**
     * @var array
     */
    public $css = [
        'css/all.min.css'
    ];
}