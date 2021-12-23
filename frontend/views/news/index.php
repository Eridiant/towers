<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Новости');

?>

<div class="news">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="breadcrumbs">
            <a href="/"><?=Yii::t('frontend', 'Главная')?></a>
            <p><?=Yii::t('frontend', 'Новости')?></p>
        </div>
        <h1><?=Yii::t('frontend', 'Читать больше')?></h1>
        <div class="news-wrapper">
            <?php foreach ($model as $model): ?>
                <div class="news-news">
                    <div class="news-img">
                        <?php if ($model->image): ?>
                            <?= Html::img("@web/uploads/{$model->image}", ['alt' => $model->title_ru])?>
                        <?php else: ?>
                            <img src="http://dummyimage.com/150x60/a6a6ff">
                        <?php endif; ?>
                    </div>
                    <h2><?= $model->$title; ?></h2>
                    <div class="news-excerpt">
                        <div class="news-excerpt-text">
                            <?= $model->$code; ?>
                        </div>
                        <a class="news-link" href="<?= Url::toRoute("news/{$model->slug}"); ?>">Подробнее</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="news-next"><?=Yii::t('frontend', 'Показать больше')?></div>
    </div>
</div>
<video width="320" height="240" autoplay controls>
    <source src="%StreamURL%" type="video/mp4">
    <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" /> 
        <param name="flashvars" value='config={"clip": {"url": "%StreamURL%", "autoPlay":true, "autoBuffering":true}}' /> 
        <p><a href="%StreamURL%">view with external app</a></p> 
    </object>
</video>