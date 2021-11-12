<?php

use yii\helpers\Url;

?>

<div class="gallery">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="gallery-wrapper">
            <div class="gallery-inf">
                <div class="gallery-inner">
                    <div class="breadcrumbs">
                        <a href="/">Главная</a>
                        <p>Галерея</p>
                    </div>
                    <h1>Галерея</h1>
                </div>
                <div class="gallery-tab">
                    <a href="<?=Url::toRoute('/gallery') ?>">Жилой дом</a>
                    <a href="<?=Url::toRoute('/construction-progress') ?>">Ход строительства</a>
                    <a href="<?=Url::toRoute('/batumi') ?>">Батуми</a>
                    <a href="<?= Url::toRoute('/our-team') ?>">Команда</a>
                    <a href="<?= Url::toRoute('/video-report') ?>">Видео отчет о ходе строительства</a>
                </div>
                <a href="#" class="contacts-call btn btn-blue">
                    <span>Скачать план (PDF)</span>
                    <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                </a>
            </div>
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper gallery-main">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-1.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-2.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-3.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-4.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-5.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-6.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-7.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-8.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                    <div class="swiper-slide">
                        <picture>
                            <img src="/images/dist/gallery/gallery-9.jpg" width="1204" height="779" alt="">
                        </picture>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div thumbsSlider="" class="swiper gallery-thumb">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-1.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-2.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-3.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-4.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-5.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-6.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-7.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-8.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/dist/gallery/gallery-9.jpg" width="1204" height="779" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>