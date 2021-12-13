<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';


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
        <a href="<?=Url::toRoute('/news') ?>"><?=Yii::t('frontend', 'Назад')?></a>
    </div>
</div>