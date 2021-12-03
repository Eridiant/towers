<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Галлерея');

?>

<?= $this->render($rend) ?>

<div class="hotel">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="hotel-bg">
            <picture>
                <img src="/images/dist/gallery/hotel-bg.jpg">
            </picture>
        </div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="hotel-desc">
                <p class=""><?=Yii::t('frontend', 'Скоро')?></p>
                <h2><?=Yii::t('frontend', 'Отель Хилтон')?></h2>
                <p>
                    <?=Yii::t('frontend', 'Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке направлений прогрессивного развития. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании систем массового участия.')?>
                </p>
                <!-- <a href="#" class="btn btn-gray">
                    <span><?//=Yii::t('frontend', 'подробнее')?></span>
                </a> -->
            </div>
        </div>
    </div>
</div>