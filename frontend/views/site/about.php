<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>

<main class="about">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="about-wrapper">
            <div class="about-desc">
                <div class="breadcrumbs">
                    <a href="/"><?=Yii::t('frontend', 'Главная')?></a>
                    <p><?=Yii::t('frontend', 'О компании')?></p>
                </div>
                <h1><?=Yii::t('frontend', 'Застройщик')?></h1>
                <div class="about-text">
                    <p>
                        <?=Yii::t('frontend', '“Grand Maison”- это строительная  и инвестиционная компания')?>
                    </p>
                    <p>
                        <?=Yii::t('frontend', 'Профиль компании:')?>
                    </p>
                    <ul>
                        <li>
                            <?=Yii::t('frontend', 'Строительство и реконструкция государственных дорог, тоннелей, мостов')?>
                        </li>
                        <li>
                            <?=Yii::t('frontend', 'Производство и продажа строительных материалов')?>
                        </li>
                        <li>
                            <?=Yii::t('frontend', 'Строительство жилых комплексов')?>
                        </li>
                        <li>
                            <?=Yii::t('frontend', 'Смотрите информацию о завершенных и текущих тендерах')?>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper aboute-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="about-img">
                            <img src="/images/dist/about/about.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-img">
                            <img src="/images/dist/about/about.jpg" alt="">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</main>