<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'О компании');
$this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'О компании. Calligraphy Towers. Калиграфи тауерс.')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('frontend', 'Калиграфи Тауерс. Застройщики батуми. Новостройки в Батуми')]);

?>

<main class="about">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="about-wrapper">
            <div class="about-desc">
                <h1><?=Yii::t('frontend', 'О проекте')?></h1>
                <div class="about-text">
                    <p>
                        <?=Yii::t('frontend', 'Проект «Calligraphy Towers» представляет собой жилой комплекс элитного типа состоящий из 3-х корпусов блок А,Б,С, сам комплекс расположен в благоустроенной части города на «Аллея-Героев».<br>Клубный тип апартаментов и большой выбор инфраструктуры не оставляет шансов для бушующих жильцов.<br>Проект «Calligraphy Towers» интересен для, предпринимателей и фрилансеров, которые хотят зарабатывать сдавая жилье в аренду и самостоятельно пользоваться всеми сервисами.')?>
                    </p>
                    <p>
                        <?=Yii::t('frontend', 'Жилой комплекс многофункционален и включает инфраструктуру:')?>
                    </p>
                    <ul>
                        <?php if (Yii::t('frontend', 'кинотеатр Calligraphy Cinema;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'кинотеатр Calligraphy Cinema;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'Piano & Lounge Bar с живой музыкой;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'Piano & Lounge Bar с живой музыкой;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'co-working зону;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'co-working зону;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'конференц-зал для бизнеса;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'конференц-зал для бизнеса;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'закрытый бассейн 290 кв.м.;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'закрытый бассейн 290 кв.м.;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'спа-центр;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'спа-центр;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'фитнес-зал;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'фитнес-зал;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'парк для отдыха;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'парк для отдыха;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'парковочные места (открытые и закрытые);') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'парковочные места (открытые и закрытые);')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'казино;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'казино;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'рестораны;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'рестораны;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'террасы общего использования;') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'террасы общего использования;')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'дополнительный сервис в виде услуг гольф-машин, которые доставят вас от комплекса до моря.') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'дополнительный сервис в виде услуг гольф-машин, которые доставят вас от комплекса до моря.')?>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <p><strong>
                        <?=Yii::t('frontend', 'В блоке А 10 этажей занимает международный сетевой отель «Hampton by Hilton» сети «Hilton worldwide», что придает стабильный интерес к комплексу у отдыхающих туристов.')?>
                    </strong></p>
                </div>
                <a href="/presentation/Grand_Maison_პრეზენტაცია.pdf" class="btn btn-blue" download>
                    <span><?=Yii::t('frontend', 'Скачать презентацию')?></span>
                    <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                </a>
            </div>
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper aboute-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="about-img">
                            <picture>
                                <img src="/images/dist/about/about-1-1x.jpg" width="1306" height="872" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-img">
                            <picture>
                                <img src="/images/dist/about/about-2-1x.jpg" width="1306" height="872" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</main>

<main class="about">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="about-wrapper">
            <div class="about-desc">
                <h1><?=Yii::t('frontend', 'Застройщик')?></h1>
                <div class="about-text">
                    <p>
                        <?=Yii::t('frontend', '“Grand Maison”- это строительная  и инвестиционная компания')?>
                    </p>
                    <p>
                        <?=Yii::t('frontend', 'Профиль компании:')?>
                    </p>
                    <ul>
                        <?php if (Yii::t('frontend', 'Строительство и реконструкция государственных дорог, тоннелей, мостов') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'Строительство и реконструкция государственных дорог, тоннелей, мостов')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'Производство и продажа строительных материалов') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'Производство и продажа строительных материалов')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'Строительство жилых комплексов') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'Строительство жилых комплексов')?>
                            </li>
                        <?php endif; ?>
                        <?php if (Yii::t('frontend', 'Смотрите информацию о завершенных и текущих тендерах') != 'null'): ?>
                            <li>
                                <?=Yii::t('frontend', 'Смотрите информацию о завершенных и текущих тендерах')?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <a href="/presentation/Grand_Maison_პრეზენტაცია.pdf" class="btn btn-blue" download>
                    <span><?=Yii::t('frontend', 'Скачать презентацию')?></span>
                    <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                </a>
            </div>
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper aboute-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="about-img">
                            <picture>
                                <source type="image/jpeg" media="(max-width: 480px)" srcset="/images/dist/index/about-mb-1.jpg, /images/dist/index/about-mb-1-2x.jpg 2x">
                                <source type="image/jpeg" srcset="/images/dist/index/about-1.jpg, /images/dist/index/about-1-2x.jpg 2x">
                                <img src="/images/dist/index/about-1.jpg" width="1306" height="872" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-img">
                            <picture>
                                <source type="image/jpeg" media="(max-width: 480px)" srcset="/images/dist/index/about-mb-2.jpg, /images/dist/index/about-mb-2-2x.jpg 2x">
                                <source type="image/jpeg" srcset="/images/dist/index/about-2.jpg, /images/dist/index/about-2-2x.jpg 2x">
                                <img src="/images/dist/index/about-2.jpg" width="1306" height="872" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</main>