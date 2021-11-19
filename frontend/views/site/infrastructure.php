<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Инфраструктур');

?>
<div id="infrastructure" class="infrastructure">
    <div class="container" style="max-width: 1306px; margin-left: auto; margin-right: auto">
        <div class="infr-btn">
            <div class="infr-btn-choosed btn btn-blue">
                <?=Yii::t('frontend', 'Бассейн')?>
            </div>
            <div class="infr-btn-choose">
                <p data-num="1"><?=Yii::t('frontend', 'Бассейн')?></p>
                <p data-num="2"><?=Yii::t('frontend', 'SPA - центр')?></p>
                <p data-num="3"><?=Yii::t('frontend', 'Фитнес')?></p>
                <p data-num="4">Lounge Bar</p>
                <p data-num="5"><?=Yii::t('frontend', 'Кинотеатр')?></p>
                <p data-num="6"><?=Yii::t('frontend', 'Собственный пляж')?></p>
                <p data-num="7"><?=Yii::t('frontend', 'Озелененные террасы')?></p>
                <p data-num="8"><?=Yii::t('frontend', 'Детская комната')?></p>
                <p data-num="9">Coworking зона</p>
                <p data-num="10">Конференц-зал</p>
                <p data-num="11"><?=Yii::t('frontend', 'Паркинг')?></p>
                <p data-num="12"><?=Yii::t('frontend', 'Казино')?></p>
            </div>
        </div>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="infrastructure-wrapper">
            <div class="infrastructure-item infrastructure-active" data-item="1">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-1.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        Открытый и закрытый <?=Yii::t('frontend', 'Бассейн')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="2">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-2.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        СПА центр
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="3">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-3.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Фитнес')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="4">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-4.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        Piano & Lounge Bar с живой музыкой
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="5">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-5.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Вся зона будет иметь роскошное светлое пространство, отдельные зоны массажа и оздоровительных процедур. В отличие от большинства спа,которые рассчитаны на туристов, наш спа центр будет иметь — ориентацию на клиентов отеля и владельцев апартаментов, мы сделали упор на  благородные материалы в отделке, лаконичность дизайна и бесконечная элегантность.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Кинотеатр')?> “Calligraphy Cinema”
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="6">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-6.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Собственный пляж')?>, услуги гольф-машин
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="7">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-7.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Озелененные террасы')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="8">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-8.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Детская комната')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="9">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-9.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        Coworking зона
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="10">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-6.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        Конференц-зал
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="11">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-11.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Паркинг')?> на 300 парковочных мест
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="12">
                <div class="infrastructure-item-img">
                    <picture>
                        <img src="/images/dist/infrastructure/infrs-12.jpg" width="481" height="849" alt="">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-subtitle">
                            Отличное место для работы
                        </p>
                        <p class="infrastructure-item-text">
                            Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет.
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Казино')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="slider">
    <div class="container-sl" style="max-width: 1500px; margin-left: auto; margin-right: auto">
        <div class="swiper-slide">
            <picture>
                <img src="/images/default.jpg" alt="">
            </picture>
        </div>
        <!--<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper slider-main">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper slider-thumb" style="max-width: 800px; margin-left: auto; margin-right: auto">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="">
                    </picture>
                </div>
            </div>
        </div> -->
    </div>
</div>