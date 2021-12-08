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
                        <li class="gallery-tab-current">
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
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper gallery-main">
                <div class="swiper-wrapper">
                    <?php for($i=1; $i<7; $i++): ?>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/jpeg" media="(max-width: 480px)" srcset="/images/dist/gallery/gallery-mb-<?= $i; ?>.jpg, /images/dist/gallery/gallery-mb-<?= $i; ?>-2x.jpg 2x">
                                <source type="image/jpeg" srcset="/images/dist/gallery/gallery-<?= $i; ?>.jpg, /images/dist/gallery/gallery-<?= $i; ?>-2x.jpg 2x">
                                <img src="/images/dist/gallery/gallery-<?= $i; ?>.jpg" width="1204" height="779" alt="">
                            </picture>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div thumbsSlider="" class="swiper gallery-thumb">
            <div class="swiper-wrapper">
                <?php for($i=1; $i<7; $i++): ?>
                    <div class="swiper-slide">
                        <picture>
                            <img srcset="/images/dist/gallery/gallery-mb-<?= $i; ?>.jpg, /images/dist/gallery/gallery-mb-<?= $i; ?>-2x.jpg 2x" src="/images/dist/gallery/gallery-<?= $i; ?>.jpg" width="480" height="311" alt="">
                        </picture>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>