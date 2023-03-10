<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $model->$title;
$this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'Новости. Новостройки в Батуми')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('frontend', 'Калиграфи Тауерс. Апартаменты у моря в центре батуми. Прибыльная недвижимость у моря')]);

?>

<div class="nws">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="nws-img">
            <?php if ($model->image): ?>
                <?= Html::img("@web/uploads/{$model->image}", ['alt' => $model->title_ru])?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container" style="max-width: 1200px; margin-left: auto; margin-right: auto">
        <h1><?= $model->$title; ?></h1>
        <div class="nws-text"><?= $model->$code; ?></div>
        <a href="<?=Url::toRoute(Yii::$app->params['curLangUrl'] . '/news') ?>" class="nws-btn btn btn-blue">
            <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
            <span><?=Yii::t('frontend', 'Назад')?></span>
        </a>
    </div>
</div>