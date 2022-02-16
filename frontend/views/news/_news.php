<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>


<?php foreach ($model as $model): ?>
    <div class="news-news">
        <div class="news-img">
            <?php if ($model->image): ?>
                <?= Html::img("@web/uploads/{$model->image}", ['alt' => $model->title_ru])?>
            <?php endif; ?>
        </div>
        <h2><?= $model->$title; ?></h2>
        <div class="news-excerpt">
            <div class="news-excerpt-text">
                <?php $model->$code = trim(preg_replace('/\s+/i', ' ', strip_tags($model->$code))); ?>
                <?= $model->$code; ?>
            </div>
            <a class="news-link" href="<?= Url::toRoute("news/{$model->slug}"); ?>"><?=Yii::t('frontend', 'Подробнее')?></a>
        </div>
    </div>
<?php endforeach; ?>
