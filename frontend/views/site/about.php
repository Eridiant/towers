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
                    <a href="/">Главная</a>
                    <p>О компании</p>
                </div>
                <h1>Застройщик</h1>
                <div class="about-text">
                    <p>
                        “Grand Maison”- это строительная  и инвестиционная компания
                    </p>
                    <p>
                        Профиль компании:
                    </p>
                    <ul>
                        <li>
                            Строительство и реконструкция государственных дорог, тоннелей, мостов
                        </li>
                        <li>
                            Производство и продажа строительных материалов
                        </li>
                        <li>
                            Строительство жилых комплексов
                        </li>
                        <li>
                            Смотрите информацию о завершенных и текущих тендерах
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