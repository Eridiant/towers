<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/',
        // 'css/',
        'css/jquery.fancybox.min.css',
        'css/main.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/swiper-bundle.min.js',
        'js/jquery.fancybox.min.js',
        'js/app.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
    public function init()
    {
        parent::init();
        // resetting BootstrapAsset to not load own css files
        \Yii::$app->assetManager->bundles['yii\\bootstrap4\\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
    }
}
