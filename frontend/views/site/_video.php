<?php

use yii\helpers\Url;

?>
<div class="gallery youtube">
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
                        <li class="gallery-tab-current">
                            <a href="<?= Url::toRoute('/video-report') ?>"><?=Yii::t('frontend', 'Видео отчет о ходе строительства')?></a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="contacts-call btn btn-blue" download>
                    <span><?=Yii::t('frontend', 'Скачать план (PDF)')?></span>
                    <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                </a>
            </div>
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper gallery-main">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xG4LV0k0U48?enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="swiper-slide">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FjEMcj4C3eY?enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="swiper-slide">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/uWKYislMfbw?enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <?php if (Yii::$app->language == 'ka-GE'): ?>
                        <div class="swiper-slide">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/nVX45I6vDns?enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div thumbsSlider="" class="swiper gallery-thumb">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xG4LV0k0U48" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <img src="//img.youtube.com/vi/xG4LV0k0U48/3.jpg" width="120" height="90" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                </div>
                <div class="swiper-slide">
                    <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FjEMcj4C3eY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <img src="//img.youtube.com/vi/FjEMcj4C3eY/3.jpg" width="120" height="90" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                </div>
                <div class="swiper-slide">
                    <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/uWKYislMfbw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <img src="//img.youtube.com/vi/uWKYislMfbw/3.jpg" width="120" height="90" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                </div>
                <?php if (Yii::$app->language == 'ka-GE'): ?>
                    <div class="swiper-slide">
                        <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/nVX45I6vDns" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                        <img src="//img.youtube.com/vi/nVX45I6vDns/3.jpg" width="120" height="90" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>