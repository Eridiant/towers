<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Планировки');


?>
<script>
    var dato = <?= json_encode($model); ?>; // Don't forget the extra semicolon!
</script>

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
    <div class="layouts-bg-svg">
        <figure class="layouts-bg-fig">
            <object id="floors" data="/images/svg/layout-flats.svg" type="image/svg+xml">
                <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
            </object>
        </figure>
    </div>
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="layouts-content">
            <div class="layouts-title">
                <p class="subtitle"><?=Yii::t('frontend', 'Выберите блок')?></p>
                <h1><?=Yii::t('frontend', 'Планировки')?></h1>
            </div>
            <div class="choose-buttons">
                <a href="javascript:void(0);" class="choose-button" data-choose="1">
                    <?=Yii::t('frontend', 'Блок')?> <span>а</span>
                </a>
                <a href="javascript:void(0);" class="choose-button" data-choose="2">
                    <?=Yii::t('frontend', 'Блок')?> <span>б</span>
                </a>
                <a href="javascript:void(0);" class="choose-button" data-choose="3">
                    <?=Yii::t('frontend', 'Блок')?> <span>с</span>
                </a>
            </div>
        </div>
    </div>
    <div class="choose-slider">
        <p><?=Yii::t('frontend', 'Выберите блок')?></p>
        <div style="--swiper-navigation-size: 30px; --swiper-navigation-color: #fff;" class="swiper choose-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> A</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-a.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> Б</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-b.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> С</h2>
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

<div id="for-del" class="for-del" style="display:none">
    <div class="container" style="max-width: 1200px; margin-left: auto; margin-right: auto">
        <h1><?=Yii::t('frontend', 'Блок С, скоро в продаже')?></h1>
    </div>
</div>

<div id="blocks" class="block">
    <div class="container" style="max-width: 1200px; margin-left: auto; margin-right: auto">
        <div class="block-wrapper">
            <div class="block-desc">
                <div class="breadcrumbs">
                    <a href="/"><?=Yii::t('frontend', 'Главная')?></a>
                    <a href="/"><?=Yii::t('frontend', 'Планировки')?></a>
                    <p><?=Yii::t('frontend', 'Блок')?> <span class="blocks"><?= $block; ?></span></p>
                </div>
                <h3><?=Yii::t('frontend', 'Информация о блоке')?></h3>
                <dl>
                    <dt><?=Yii::t('frontend', 'Этаж')?>:</dt>
                    <dd id="fl">1</dd>
                </dl>
            </div>
            <div class="block-inner">
              <div class="block-block">
                <div class="block-img">
                  <picture> 
                      <img src="/images/src/layouts/block/block-<?= $block; ?>-x1.png" alt="">
                  </picture>
                </div>
                <div class="block-svg<?= $block == 'a' ? ' block-svg-active' : ''; ?>" data-block="1">
                  <object id="buildA" data="/images/svg/layouts/block/a.svg" type="image/svg+xml">
                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                  </object>
                </div>
                <div class="block-svg<?= $block == 'b' ? ' block-svg-active' : ''; ?>" data-block="2">
                  <object id="buildB" data="/images/svg/layouts/block/b.svg" type="image/svg+xml">
                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                  </object>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div id="floor" class="floor">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="floor-wrapper">
            <div class="floor-floor">
                <div class="breadcrumbs">
                    <a href="/"><?=Yii::t('frontend', 'Главная')?></a>
                    <a href="/"><?=Yii::t('frontend', 'Планировки')?></a>
                    <p><?=Yii::t('frontend', 'Блок')?> <span class="blocks"><?= $block; ?></span></p>
                </div>
                <h2><?=Yii::t('frontend', 'Этажи')?></h2>
                <div id="floor-choose" class="floor-choose">
                    <div class="floor-choose-inner floor-show">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/blocks/img/<?= $block; ?>/<?= $floor_num; ?>.jpg" alt="">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object id="test" data="/images/blocks/svg/<?= $block; ?>/<?= $floor_num; ?>.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt=""> -->
                                </object>
                            </figure>
                            <div class="focus">
                                <p class="focus-flat"></p>
                                <p class="focus-status"></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="floor-inf">
                    <div class="floor-item">
                        <p class="cap"><?=Yii::t('frontend', 'Квартир на этаже')?>:</p>
                        <div class="floor-item-inner">
                            <p>2/6</p>
                        </div>
                    </div>
                    <div class="floor-item">
                        <p class="cap"><?=Yii::t('frontend', 'Блок')?>Типы:</p>
                        <div class="floor-item-inner">
                            <p><?=Yii::t('frontend', 'Название')?></p>
                            <p><?=Yii::t('frontend', 'Название квартиры')?></p>
                        </div>
                    </div>
                    <div class="floor-item">
                        <p class="cap"><?=Yii::t('frontend', 'Стоимость от')?>:</p>
                        <div class="floor-item-inner">
                            <p>220 000</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="contacts-call floor-call btn btn-blue">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span><?=Yii::t('frontend', 'Выбрать блок')?></span>
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
                    <a href="/"><?=Yii::t('frontend', 'Главная')?></a>
                    <a href="/"><?=Yii::t('frontend', 'Планировки')?></a>
                    <p><?=Yii::t('frontend', 'Квартира')?></p>
                </div>
                <h2><?=Yii::t('frontend', 'Экспликация')?></h2>
                <div class="flat-description-inner">
                    <dl>
                        <dt><?=Yii::t('frontend', 'Номер')?></dt>
                        <dd><span class="num">6</span></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Общая площадь')?></dt>
                        <dd><span class="total">6</span> м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Балкон')?></dt>
                        <dd><span class="balcony">12</span> м<sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Стоисть')?></dt>
                        <dd>$<span class="price">8</span></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Вид')?></dt>
                        <dd><span class="view">8</span></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Статус')?></dt>
                        <dd><span class="status">8</span></dd>
                    </dl>
                </div>
                <a href="#" id="flat-call" class="contacts-call flat-call floor-call btn btn-blue">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span><?=Yii::t('frontend', 'Выбрать блок')?></span>
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
                <div class="flat-num-wrapper">
                    <p>
                        <?=Yii::t('frontend', 'Цены на квартиры по этажам одна, отличия только вида')?>
                    </p>
                </div>
                <div class="flat-num-img">
                    <picture>
                        <img src="/images/3d.png" alt="">
                    </picture>
                </div>
                <div class="flat-num-inner">
                    <a href="#" class="contacts-call btn btn-blue">
                        <span><?=Yii::t('frontend', 'Скачать план (PDF)')?></span>
                        <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>