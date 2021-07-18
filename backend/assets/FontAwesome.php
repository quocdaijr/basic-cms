<?php


namespace backend\assets;


use yii\web\AssetBundle;

class FontAwesome extends AssetBundle
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