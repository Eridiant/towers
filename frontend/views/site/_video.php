<?php

use yii\helpers\Url;

?>

<div class="gallery">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="gallery-wrapper">
            <div class="gallery-inf">
                <div class="gallery-inner">
                    <div class="breadcrumbs">
                        <a href="/"><?=Yii::t('frontend', 'Главная')?></a>
                        <p><?=Yii::t('frontend', 'Галерея')?></p>
                    </div>
                    <h1><?=Yii::t('frontend', 'Галерея')?></h1>
                </div>
                <div class="gallery-tab">
                    <ul>
                        <li>
                            <a href="<?=Url::toRoute('/gallery') ?>"><?=Yii::t('frontend', 'Жилой дом')?></a>
                        </li>
                        <li>
                            <a href="<?=Url::toRoute('/construction-progress') ?>"><?=Yii::t('frontend', 'Ход строительства')?></a>
                        </li>
                        <li>
                            <a href="<?=Url::toRoute('/batumi') ?>"><?=Yii::t('frontend', 'Батуми')?></a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('/our-team') ?>"><?=Yii::t('frontend', 'Команда')?></a>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute('/video-report') ?>"><?=Yii::t('frontend', 'Видео отчет о ходе строительства')?></a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="contacts-call btn btn-blue">
                    <span><?=Yii::t('frontend', 'Скачать план (PDF)')?></span>
                    <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                </a>
            </div>
            <div class="gallery-video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/t8OTEdZ05TA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>