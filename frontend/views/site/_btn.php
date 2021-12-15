<?php

use yii\helpers\Url;

$currentLang = Yii::$app->request->cookies->getValue('_locale', 'en-US');
$lg = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $currentLang])->one()->code;

?>

<a href="/presentation/Calligraphy_Towers_Presentation_<?= $lg; ?>.pdf" class="btn btn-blue" download>
    <span><?=Yii::t('frontend', 'Скачать презентацию')?></span>
    <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
</a>