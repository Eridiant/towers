<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>

<header class="header">
	<div class="header-bg img-bg">
		<div class="header-bg-wrap header-lights">
			<picture>
				<!-- <source srcset="images/del/bg14.jpg" media="(max-width: 420px)">
				<source srcset="images/del/bg13.jpg" media="(max-width: 1280px)">
				<source srcset="images/del/bg12.jpg" media="(max-width: 1500px)">
				<source srcset="images/del/bg11.jpg" media="(min-width: 1501px)"> -->
                <source type="image/jpeg" srcset="images/dist/header/header_bg.jpg, images/dist/header/header_bg-2x.jpg 2x">
				<img src="images/dist/header/header_bg.jpg" alt="">
			</picture>
		</div>
		<div class="header-bg-wrap">
			<picture>
				<!-- <source srcset="images/del/bg14.jpg" media="(max-width: 420px)">
				<source srcset="images/del/bg13.jpg" media="(max-width: 1280px)">
				<source srcset="images/del/bg12.jpg" media="(max-width: 1500px)">
				<source srcset="images/del/bg11.jpg" media="(min-width: 1501px)"> -->
				<source type="image/jpeg" srcset="images/dist/header/header_bg_night.jpg, images/dist/header/header_bg_night-2x.jpg 2x">
				<img src="images/dist/header/header_bg_night.jpg" alt="">
			</picture>
		</div>
	</div>
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="header-wrapper">
			<div class="header-inner">
				<p class="header-cap cap">
                    <?=Yii::t('frontend', 'Жилой комплекс')?>
                </p>
				<h1 class="header-title">Calligraphy Towers Batumi</h1>
				<div class="header-video">
					<svg width="141" height="141"><use xlink:href="images/icons.svg#video"></use></svg>
					<p>
                        <?=Yii::t('frontend', 'Видео о жилом комплексе')?>
                    </p>
				</div>
			</div>
		</div>
		<div class="header-light">
			<svg width="19" height="19"><use xlink:href="images/icons.svg#sun"></use></svg>
			<svg class="header-light-rt" width="57" height="24"><use xlink:href="images/icons.svg#switch"></use></svg>
			<svg width="17" height="17"><use xlink:href="images/icons.svg#moon"></use></svg>
		</div>
	</div>
</header>


<div id="infr" class="infr">
    <div class="container" style="max-width: 1306px; margin-left: auto; margin-right: auto">
        <h2><?=Yii::t('frontend', 'Инфраструктура')?></h2>
        <div class="infr-btn">
            <div class="infr-btn-choosed btn btn-blue">
                <?=Yii::t('frontend', 'Отель Хемптон')?>
            </div>
            <div class="infr-btn-choose">
                <p data-num="1">
                    <?=Yii::t('frontend', 'Отель Хемптон')?>
                </p>
                <p data-num="2">
                    <?=Yii::t('frontend', 'SPA - центр')?>
                </p>
                <p data-num="3">
                    <?=Yii::t('frontend', 'Кинотеатр')?>
                </p>
                <p data-num="4">
                    <?=Yii::t('frontend', 'Казино')?>
                </p>
                <p data-num="5">
                    <?=Yii::t('frontend', 'Фитнес')?>
                </p>
                <p data-num="6">
                    <?=Yii::t('frontend', 'Бизнес центр')?>
                </p>
                <p data-num="7">
                    <?=Yii::t('frontend', 'Рестораны')?>
                </p>
                <p data-num="8">
                    <?=Yii::t('frontend', 'Детская комната')?>
                </p>
                <p data-num="9">
                    <?=Yii::t('frontend', 'Собственный пляж')?>
                </p>
                <p data-num="10">
                    <?=Yii::t('frontend', 'Озелененные террасы')?>
                </p>
                <p data-num="11">
                    <?=Yii::t('frontend', 'Бассейн')?>
                </p>
                <p data-num="12">
                    <?=Yii::t('frontend', 'Паркинг')?>
                </p>
            </div>
        </div>
    </div>
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <!-- Swiper -->
        <div class="swiper infr-swiper" style="--swiper-navigation-color: #fff">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-1.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    международный сетевой отелей Hampton by Hilton! Hampton by Hilton - известная сеть отелей, гостиницы которой представлены во многих странах. Хэмптон хотелс включает 1762 гостиницы. Единая база клиентов позволяет иметь ежегодную загрузку отеля. Высокий уровень сервиса и отсутствие конкурентов в Батуми, имеет большое преимущество.
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Отель Хемптон')?></h3>
                            <p>
                                международный сетевой отелей Hampton by Hilton! Hampton by Hilton - известная сеть отелей, гостиницы которой представлены во многих странах. Хэмптон хотелс включает 1762 гостиницы. Единая база клиентов позволяет иметь ежегодную загрузку отеля. Высокий уровень сервиса и отсутствие конкурентов в Батуми, имеет большое преимущество.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-2.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    Будет иметь роскошное светлое пространство, отдельные зоны массажа и оздоровительных процедур. В отличие от большинства спа,которые рассчитаны на туристов, наш спа центр будет иметь — ориентацию на клиентов отеля и владельцев апартаментов, мы сделали упор на  благородные материалы в отделке, лаконичность дизайна и бесконечная элегантность.
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'SPA - центр')?></h3>
                            <p>
                                Будет иметь роскошное светлое пространство, отдельные зоны массажа и оздоровительных процедур. В отличие от большинства спа,которые рассчитаны на туристов, наш спа центр будет иметь — ориентацию на клиентов отеля и владельцев апартаментов, мы сделали упор на  благородные материалы в отделке, лаконичность дизайна и бесконечная элегантность.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-3.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    концепция калиграф таурс, также направлена на досуг с семьей. Вы сможете насладиться современным кинотеатром, с современной акустикой и 3D графикой.
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Кинотеатр')?></h3>
                            <p>
                                концепция калиграф таурс, также направлена на досуг с семьей. Вы сможете насладиться современным кинотеатром, с современной акустикой и 3D графикой.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-4.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    комплекс включает формат развлечений для лиц старше 21+, вас ждет казино и разнообразные игры в режиме 24 часа
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Казино')?></h3>
                            <p>
                                комплекс включает формат развлечений для лиц старше 21+, вас ждет казино и разнообразные игры в режиме 24 часа
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-5.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    наша задача — создать все условия, чтобы спорт приносил не только пользу, но и удовольствие оснащенный новейшим спортивным оборудованием и всеми необходимыми тренажерами для профессионального спорта и любительских занятий
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Фитнес')?></h3>
                            <p>
                                наша задача — создать все условия, чтобы спорт приносил не только пользу, но и удовольствие оснащенный новейшим спортивным оборудованием и всеми необходимыми тренажерами для профессионального спорта и любительских занятий
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-6.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    отличное место для работы и отдыха, мы предусмотрели возможность работы в формате коворкинг зон для переговров и мероприятий.
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Бизнес центр')?></h3>
                            <p>
                                отличное место для работы и отдыха, мы предусмотрели возможность работы в формате коворкинг зон для переговров и мероприятий.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-6.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    будут иметь свыше 3 видов кухни, приятная музыка, морской воздух. Высокая и традиционная Грузинская, Европейская, Азиатская кухня и кошерная.
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Рестораны')?></h3>
                            <p>
                                будут иметь свыше 3 видов кухни, приятная музыка, морской воздух. Высокая и традиционная Грузинская, Европейская, Азиатская кухня и кошерная.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-8.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    концепция отеля имеет детский клуб и анимацию для детей от 2 до 10 лет,  мы ценим ваш отдых и заботимся о ваших детях.
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Детская комната')?></h3>
                            <p>
                                концепция отеля имеет детский клуб и анимацию для детей от 2 до 10 лет,  мы ценим ваш отдых и заботимся о ваших детях.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-9.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    ваш отдых будет иметь персональную зону на море, отдельный пляж и лежаки. 
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Собственный пляж')?></h3>
                            <p>
                                ваш отдых будет иметь персональную зону на море, отдельный пляж и лежаки. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-10.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    сможете насладиться видами вечернего Батуми , футбольным матчем или концертом мирового масштаба не покидая комплекс
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Озелененные террасы')?></h3>
                            <p>
                                сможете насладиться видами вечернего Батуми , футбольным матчем или концертом мирового масштаба не покидая комплекс
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-11.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    входит в концепцию - подогреваемый бассейн. входит в концепцию - подогреваемый бассейн.
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Бассейн')?></h3>
                            <p>
                                входит в концепцию - подогреваемый бассейн. входит в концепцию - подогреваемый бассейн.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img src="images/dist/index/infr/infr-12.jpg" width="362" height="544" alt="">
                            </picture>
                            <div>
                                <p>
                                    Паркинг на 300 парковочных мест
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Паркинг')?></h3>
                            <p>
                                Паркинг на 300 парковочных мест
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next infr-next"></div>
            <div class="swiper-button-prev infr-prev"></div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
</div>

<div class="aboute">
    <div class="container" style="max-width: 1306px; margin-left: auto; margin-right: auto">
        <h2>
            <?=Yii::t('frontend', 'О компании')?>
        </h2>
        <div class="swiper aboute-swiper" style="--swiper-navigation-color: #fff">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="aboute-img">
                        <picture>
                            <source type="image/jpeg" srcset="images/dist/index/about.jpg, images/dist/about/about-2x.jpg 2x">
                            <img src="images/dist/index/about.jpg" width="1306" height="764" alt="">
                        </picture>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="aboute-img">
                        <picture>
                            <source type="image/jpeg" srcset="images/dist/index/about.jpg, images/dist/about/about-2x.jpg 2x">
                            <img src="images/dist/index/about.jpg" width="1306" height="764" alt="">
                        </picture>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next aboute-next"></div>
            <div class="swiper-button-prev aboute-prev"></div>
        </div>
    </div>
</div>

<div class="project">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="project-wrapper">
            <div class="project-img">
                <div class="project-img-hide project-show" id="project-1">
                    <picture>
                        <img src="images/dist/index/project/project-1.jpg" width="486" height="691" alt="">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-2">
                    <picture>
                        <img src="images/dist/index/project/project-2.jpg" width="486" height="691" alt="">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-3">
                    <picture>
                        <img src="images/dist/index/project/project-3.jpg" width="486" height="691" alt="">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-4">
                    <picture>
                        <img src="images/dist/index/project/project-4.jpg" width="486" height="691" alt="">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-5">
                    <picture>
                        <img src="images/dist/index/project/project-5.jpg" width="486" height="691" alt="">
                    </picture>
                </div>
            </div>
            <div class="project-about">
                <h2><?=Yii::t('frontend', 'О проекте')?></h2>
                <p>
                    <?=Yii::t('frontend', 'Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке направлений прогрессивного развития.')?>
                </p>
                <div class="project-svg">
                    <figure class="project-fig">
                        <object id="project" data="images/svg/project.svg" type="image/svg+xml">
                            <!-- <img src="images/dist/bg-1920x1450.jpg" alt=""> -->
                        </object>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="choose" class="choose">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="choose-bg">
            <div class="choose-bg-img">
                <picture>
                    <img src="images/dist/index/choose-bg.jpg" alt="">
                </picture>
            </div>
            <div class="choose-bg-svg">
                <figure class="choose-bg-fig">
                    <object id="choosed" data="images/svg/choose-bg.svg" type="image/svg+xml">
                        <!-- <img src="images/dist/bg-1920x1450.jpg" alt=""> -->
                    </object>
                </figure>
            </div>
            <div class="choose-content">
                <p class="subtitle">
                    <?=Yii::t('frontend', 'Планировки')?>
                </p>
                <h2>
                    <?=Yii::t('frontend', 'Выберите блок')?>
                </h2>
                <div class="choose-buttons">
                    <a href="layouts.html" class="choose-button" data-choose="1">
                        <?=Yii::t('frontend', 'Блок')?> <span>а</span>
                    </a>
                    <a href="layouts.html" class="choose-button" data-choose="2">
                        <?=Yii::t('frontend', 'Блок')?> <span>б</span>
                    </a>
                    <a href="layouts.html" class="choose-button" data-choose="3">
                        <?=Yii::t('frontend', 'Блок')?> <span>с</span>
                    </a>
                </div>
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
                                <img src="images/dist/index/choose/block-a.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> Б</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="images/dist/index/choose/block-b.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> С</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="images/dist/index/choose/block-c.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next choose-next"></div>
            <div class="swiper-button-prev choose-prev"></div>
        </div>
    </div>
</div>

<main>
    <div class="contact">
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="contact-wrapper">
                <div class="contact-cam">
                    <div class="contact-cam-inner">
                        <p>live cam</p>
                        <p><?=Yii::t('frontend', 'Посмотреть')?></p>
                    </div>
                    <div class="contact-cam-wrap">
                        <svg width="28" height="26"><use xlink:href="images/icons.svg#cam"></use></svg>
                    </div>
                </div>
                <div class="contact-video">
                    <p><?=Yii::t('frontend', 'Видео')?></p>
                    <div class="contact-video-inner">
                        <p>3D</p>
                        <svg width="36" height="34"><use xlink:href="images/icons.svg#3d"></use></svg>
                    </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.574059231447!2d41.61839171541153!3d41.6433373792416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40678672f2beb8cb%3A0x33e0f1c9145ee33!2zMTE2IFp1cmFiIEdvcmdpbGFkemUgU3QsIEJhdHVtaSwg0JPRgNGD0LfQuNGP!5e0!3m2!1sru!2sru!4v1621084648113!5m2!1sru!2sru" width="100%" height="100%" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contact-form">
                <p class="title"><?=Yii::t('frontend', 'Поможем в выборе!')?></p>
                <p>
                    <?=Yii::t('frontend', 'Разнообразный и богатый опыт начало повседневной работы по формированию.')?>
                </p>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
                
            </div>
        </div>
    </div>
</main>
