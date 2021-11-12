<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';


?>


<div id="layouts" class="layouts">
    <div class="layouts-bg">
        <picture>
            <img src="/images/dist/layouts/layouts-bg.jpg" alt="">
        </picture>
    </div>
    <div class="layouts-bg-svg">
        <figure class="layouts-bg-fig">
            <object id="block" data="/images/svg/layouts-bg.svg" type="image/svg+xml">
                <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
            </object>
        </figure>
    </div>
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="layouts-content">
            <div class="layouts-title">
                <p class="subtitle">Выберите блок</p>
                <h1>Планировки</h1>
            </div>
            <div class="choose-buttons">
                <a href="#" class="choose-button" data-choose="1">
                    Блок <span>а</span>
                </a>
                <a href="#" class="choose-button" data-choose="2">
                    Блок <span>б</span>
                </a>
                <a href="#" class="choose-button" data-choose="3">
                    Блок <span>с</span>
                </a>
            </div>
        </div>
    </div>
    <div class="choose-slider">
        <p>Выберите блок</p>
        <div style="--swiper-navigation-size: 30px; --swiper-navigation-color: #fff;" class="swiper choose-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2>Блок A</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-a.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2>Блок Б</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-b.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2>Блок С</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-c.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<div id="floor" class="floor">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="floor-wrapper">
            <div class="floor-floor">
                <div class="breadcrumbs">
                    <a href="/">Главная</a>
                    <a href="/">Планировки</a>
                    <p>Блок С</p>
                </div>
                <h2>Этажи</h2>
                <div id="floor-choose" class="floor-choose">
                    <div class="floor-choose-inner floor-show" data-floor="1">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/2.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object id="test" data="/images/svg/layouts/2.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                            <div class="focus"></div>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="2">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/3.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/3.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="3">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/4.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/4.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="4">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/5.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/5.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="5">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/6.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/6.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="6">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/7.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/7.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="7">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/8.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/8.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                    <div class="floor-choose-inner" data-floor="8">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/dist/layouts/9.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object data="/images/svg/layouts/9.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="floor-inf">
                    <div class="floor-item">
                        <p class="cap">Квартир на этаже:</p>
                        <div class="floor-item-inner">
                            <p>2/6</p>
                        </div>
                    </div>
                    <div class="floor-item">
                        <p class="cap">Типы:</p>
                        <div class="floor-item-inner">
                            <p>Название</p>
                            <p>Название квартиры</p>
                        </div>
                    </div>
                    <div class="floor-item">
                        <p class="cap">Стоимость от:</p>
                        <div class="floor-item-inner">
                            <p>220 000</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="contacts-call floor-call btn btn-blue">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span>Выбрать блок</span>
                </a>
            </div>
            <div class="floor-choose">
                <!-- Swiper -->
                <div class="swiper floorChoose">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">1</div>
                        <div class="swiper-slide">2</div>
                        <div class="swiper-slide">3</div>
                        <div class="swiper-slide">4</div>
                        <div class="swiper-slide">5</div>
                        <div class="swiper-slide">6</div>
                        <div class="swiper-slide">7</div>
                        <div class="swiper-slide">8</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="flat" class="flat">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="flat-wrapper">
            <div class="flat-description">
                <div class="breadcrumbs">
                    <a href="/">Главная</a>
                    <a href="/">Планировки</a>
                    <p>Квартира</p>
                </div>
                <h2>Экспликация</h2>
                <div class="flat-description-inner">
                    <dl>
                        <dt>Кухня</dt>
                        <dd>6 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt>Спальня</dt>
                        <dd>12 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt>Гостинная</dt>
                        <dd>8 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt>Ванная</dt>
                        <dd>6 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt>Терраса</dt>
                        <dd>2 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt>Ванная</dt>
                        <dd>6 м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt>Терраса</dt>
                        <dd>2 м<sup>2</sup></dd>
                    </dl>
                </div>
                <a href="#" id="flat-call" class="contacts-call flat-call floor-call btn btn-blue">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span>Выбрать блок</span>
                </a>
            </div>
            <div class="flat-plan">
                <div class="flat-plan-img">
                    <picture>
                        <img src="/images/dist/flats/1.jpg" alt="">
                    </picture>
                </div>
                <!-- <div class="flat-plan-floor">
                    <span>этаж</span>
                    <span>2</span>
                    <span>Выбрать этаж</span>
                </div> -->
            </div>
            <div class="flat-num">
                <div class="flat-num-title">
                    <h2>Название</h2>
                    <p>№ <span id="flat-num">1</span></p> 
                </div>
                <div class="flat-num-wrapper">
                    <div class="flat-num-inner">
                        <a href="#" class="contacts-call btn btn-blue">
                            <span>Скачать план (PDF)</span>
                            <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                        </a>
                    </div>
                    <p>
                        Цены на квартиры по этажам одна, отличия только вида
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>