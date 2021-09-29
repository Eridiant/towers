<?php


namespace common\components;


use backend\modules\language\models\Language;
use yii\base\BootstrapInterface;

class LanguageSelector implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->language = Language::getCurrent()->key;
    }
}