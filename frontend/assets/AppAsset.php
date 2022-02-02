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
        'css/swiper-bundle.min.css',
        // 'css/jquery.fancybox.min.css',
        'css/app.min.css',
        // 'css/site.css',
        // 'css/for_del.css',
    ];
    public $js = [
        'js/swiper-bundle.min.js',
        // 'js/jquery.fancybox.min.js',
        'js/app.min.js',
        'js/del.js',
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
