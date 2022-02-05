<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Инфраструктура');
$this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'Инфраструктура - Квартиры в Батуми')]);
$this->registerMetaTag(['name' => 'description', 'content' => "Calligraphy Towers Batumi. " . Yii::t('frontend', 'Комплексная инфраструктура: Бассейн, парковка, зона отдыха, спа, кинотеатр. ресторан')]);

?>
<div id="infrastructure" class="infrastructure">
    <div class="container" style="max-width: 1306px; margin-left: auto; margin-right: auto">
        <div class="infr-btn">
            <div class="infr-btn-choosed btn btn-blue">
                <?=Yii::t('frontend', 'Открытый бассейн')?>
            </div>
            <div class="infr-btn-choose">
                <p data-num="1">
                    <img src="/images/svg/swimming.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    <?=Yii::t('frontend', 'Открытый бассейн')?>
                </p>
                <p data-num="2">
                    <img src="/images/svg/spa.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    <?=Yii::t('frontend', 'SPA - центр')?>
                </p>
                <p data-num="3">
                    <img src="/images/svg/fitness.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    <?=Yii::t('frontend', 'Фитнес')?>
                </p>
                <p data-num="4">
                    <img src="/images/svg/lounge.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    <?=Yii::t('frontend', 'Piano & Lounge Bar')?>
                </p>
                <p data-num="5">
                    <img src="/images/svg/cinema.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    <?=Yii::t('frontend', 'Кинотеатр')?>
                </p>
                <p data-num="6">
                    <img src="/images/svg/beach.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    <?=Yii::t('frontend', 'Собственный пляж')?>
                </p>
                <p data-num="7">
                    <img src="/images/svg/terraces.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    <?=Yii::t('frontend', 'Озелененные террасы')?>
                </p>
                <p data-num="8">
                    <img src="/images/svg/playground.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    <?=Yii::t('frontend', 'Детская комната')?>
                </p>
                <p data-num="9">
                    <img src="/images/svg/work.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    <?=Yii::t('frontend', 'Coworking зона')?>
                </p>
                <p data-num="10">
                    <img src="/images/svg/conference.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    <?=Yii::t('frontend', 'Конференц-зал')?>
                </p>
                <p data-num="11">
                    <img src="/images/svg/parking.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    <?=Yii::t('frontend', 'Паркинг')?>
                </p>
                <p data-num="12">
                    <img src="/images/svg/casino.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    <?=Yii::t('frontend', 'Казино')?>
                </p>
                <p data-num="13">
                    <img src="/images/svg/casino.svg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    <?=Yii::t('frontend', 'Закрытый бассейн')?>
                </p>
            </div>
        </div>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="infrastructure-wrapper">
            <div class="infrastructure-item infrastructure-active" data-item="1">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-1.jpg, /images/dist/infrastructure/intr-1-2x.jpg 2x" src="/images/dist/infrastructure/intr-1.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'входит в концепцию - подогреваемый бассейн.')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Открытый бассейн')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="2">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-2.jpg, /images/dist/infrastructure/intr-2-2x.jpg 2x" src="/images/dist/infrastructure/intr-2.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'Будет иметь роскошное светлое пространство, отдельные зоны массажа и оздоровительных процедур. В отличие от большинства спа,которые рассчитаны на туристов, наш спа центр будет иметь — ориентацию на клиентов отеля и владельцев апартаментов, мы сделали упор на  благородные материалы в отделке, лаконичность дизайна и бесконечная элегантность.')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'SPA - центр')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="3">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-3.jpg, /images/dist/infrastructure/intr-3-2x.jpg 2x" src="/images/dist/infrastructure/intr-3.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'наша задача — создать все условия, чтобы спорт приносил не только пользу, но и удовольствие оснащенный новейшим спортивным оборудованием и всеми необходимыми тренажерами для профессионального спорта и любительских занятий')?>
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
                        <img srcset="/images/dist/infrastructure/intr-4.jpg, /images/dist/infrastructure/intr-4-2x.jpg 2x" src="/images/dist/infrastructure/intr-4.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                        <?=Yii::t('frontend', 'Проведите вечер в пиано-баре с близкими в сопровождении живой музыки и любуйтесь видом на море в разнообразной и изысканной обстановке.')?></p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Piano & Lounge Bar')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="5">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-5.jpg, /images/dist/infrastructure/intr-5-2x.jpg 2x" src="/images/dist/infrastructure/intr-5.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'концепция калиграф таурс, также направлена на досуг с семьей. Вы сможете насладиться современным кинотеатром, с современной акустикой и 3D графикой.')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Кинотеатр')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="6">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-6.jpg, /images/dist/infrastructure/intr-6-2x.jpg 2x" src="/images/dist/infrastructure/intr-6.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'ваш отдых будет иметь персональную зону на море, отдельный пляж и лежаки.')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Собственный пляж')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="7">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-7.jpg, /images/dist/infrastructure/intr-7-2x.jpg 2x" src="/images/dist/infrastructure/intr-7.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'сможете насладиться видами вечернего Батуми , футбольным матчем или концертом мирового масштаба не покидая комплекс')?>
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
                        <img srcset="/images/dist/infrastructure/intr-8.jpg, /images/dist/infrastructure/intr-8-2x.jpg 2x" src="/images/dist/infrastructure/intr-8.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'Для детей от 2 до 10 лет в комплексе есть место для отдыха и развлечений с аниматом. Мы заботимся о хорошем настроении ваших детей.')?>
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
                        <img srcset="/images/dist/infrastructure/intr-9.jpg, /images/dist/infrastructure/intr-9-2x.jpg 2x" src="/images/dist/infrastructure/intr-9.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'Мы предлагаем не только места для отдыха, но и комфортную рабочую среду, оборудованную интернетом и всем необходимым инвентарем.')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Coworking зона')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="10">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-10.jpg, /images/dist/infrastructure/intr-10-2x.jpg 2x" src="/images/dist/infrastructure/intr-10.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'Планируйте деловые встречи и мероприятия в конференц-зале Calligraphy вместимостью до 70 человек.')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Конференц-зал')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="11">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-11.jpg, /images/dist/infrastructure/intr-11-2x.jpg 2x" src="/images/dist/infrastructure/intr-11.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'Паркинг на 300 парковочных мест')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Паркинг на 300 парковочных мест')?>
                    </div>
                </div>
                <div class="infrastructure-item-btn">
                    <svg width="31" height="31"><use xlink:href="/images/icons.svg#btn"></use></svg>
                </div>
            </div>
            <div class="infrastructure-item" data-item="12">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-12.jpg, /images/dist/infrastructure/intr-12-2x.jpg 2x" src="/images/dist/infrastructure/intr-12.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'комплекс включает формат развлечений для лиц старше 21+, вас ждет казино и разнообразные игры в режиме 24 часа')?>
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

            <div class="infrastructure-item" data-item="13">
                <div class="infrastructure-item-img">
                    <picture>
                        <img srcset="/images/dist/infrastructure/intr-13.jpg, /images/dist/infrastructure/intr-13-2x.jpg 2x" src="/images/dist/infrastructure/intr-13.jpg" width="480" height="840" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="infrastructure-item-inf">
                    <div class="infrastructure-item-desc">
                        <p class="infrastructure-item-text">
                            <?=Yii::t('frontend', 'Нашим отдыхающим мы предлагаем открытый и закрытый бассейн в комплексе, в любое время года.')?>
                        </p>
                    </div>
                    <div class="infrastructure-item-title">
                        <?=Yii::t('frontend', 'Закрытый бассейн')?>
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
                <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
            </picture>
        </div>
        <!--<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper slider-main">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
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
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="swiper-slide">
                    <picture>
                        <img src="/images/default.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
            </div>
        </div> -->
    </div>
</div>