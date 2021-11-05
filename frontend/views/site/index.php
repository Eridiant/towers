<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="top">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="top-nav">
			<div class="top-logo">
				<a href="/">
					<svg width="100%" height="100%"><use xlink:href="images/icons.svg#logo"></use></svg>
				</a>
			</div>
			<div class="top-social">
				<a href="#">
					<svg width="16" height="16"><use xlink:href="images/icons.svg#fb"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="images/icons.svg#youtube"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="images/icons.svg#instagram"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="images/icons.svg#telegram"></use></svg>
				</a>
			</div>
			<a href="#" class="top-sound">
				<svg width="32" height="32"><use xlink:href="images/icons.svg#sound"></use></svg>
			</a>
			<div class="top-lang">
				<a href="#">ge</a>
				<a href="#">en</a>
				<a href="#" class="current">ru</a>
				<a href="#">he</a>
			</div>
			<div class="top-navg">
				<a href="infrastructure.html">Инфраструктура</a>
                <a href="layouts.html">Планировки</a>
                <a href="gallery.html">Галерея</a>
                <a href="about.html">О компании</a>
                <a href="news.html">Новости</a>
                <a href="contacts.html">Контакты</a>
			</div>
			<a href="tel:+70988900043" class="top-phone phone">+7 (098) 890-00-43</a>
		</div>
	</div>
</div>
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
				<p class="header-cap cap">Жилой комплекс</p>
				<h1 class="header-title">Calligraphy Towers Batumi</h1>
				<div class="header-video">
					<svg width="141" height="141"><use xlink:href="images/icons.svg#video"></use></svg>
					<p>Видео о жилом комплексе</p>
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
        <h2>Инфраструктура</h2>
        <div class="infr-btn">
            <div class="infr-btn-choosed btn btn-blue">
                Отель Хемптон
            </div>
            <div class="infr-btn-choose">
                <p data-num="1">Отель Хемптон</p>
                <p data-num="2">SPA - центр</p>
                <p data-num="3">Кинотеатр</p>
                <p data-num="4">Казино</p>
                <p data-num="5">Фитнес</p>
                <p data-num="6">Бизнес центр</p>
                <p data-num="7">Рестораны</p>
                <p data-num="8">Детская комната</p>
                <p data-num="9">Собственный пляж</p>
                <p data-num="10">Озелененные террасы</p>
                <p data-num="11">Бассейн</p>
                <p data-num="12">Паркинг</p>
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
                            <h3>Отель Хемптон</h3>
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
                            <h3>SPA - центр</h3>
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
                            <h3>Кинотеатр</h3>
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
                            <h3>Казино</h3>
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
                            <h3>Фитнес</h3>
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
                            <h3>Бизнес центр</h3>
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
                            <h3>Рестораны</h3>
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
                            <h3>Детская комната</h3>
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
                            <h3>Собственный пляж</h3>
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
                            <h3>Озелененные террасы</h3>
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
                            <h3>Бассейн</h3>
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
                            <h3>Паркинг</h3>
                            <p>
                                Паркинг на 300 парковочных мест
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
</div>

<div class="aboute">
    <div class="container" style="max-width: 1306px; margin-left: auto; margin-right: auto">
        <p>Раздел о компании</p>
        <h2>Раздел о компании</h2>
        <div class="aboute-img">
            <picture>
                <source type="image/jpeg" srcset="images/dist/index/about.jpg, images/dist/about/about-2x.jpg 2x">
                <img src="images/dist/index/about.jpg" width="1306" height="764" alt="">
            </picture>
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
                <!-- <p class="subtitle">Раздел о компании</p> -->
                <h2>О проекте</h2>
                <p>
                    Разнообразный и богатый опыт начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке направлений прогрессивного развития.
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
                <p class="subtitle">Планировки</p>
                <h2>Выберите блок</h2>
                <div class="choose-buttons">
                    <a href="layouts.html" class="choose-button" data-choose="1">
                        Блок <span>а</span>
                    </a>
                    <a href="layouts.html" class="choose-button" data-choose="2">
                        Блок <span>б</span>
                    </a>
                    <a href="layouts.html" class="choose-button" data-choose="3">
                        Блок <span>с</span>
                    </a>
                </div>
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
                                <img src="images/dist/index/choose/block-a.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2>Блок Б</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="images/dist/index/choose/block-b.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2>Блок С</h2>
                        <div class="choose-img">
                            <picture>
                                <img src="images/dist/index/choose/block-c.png" alt="">
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

<main>
    <div class="contact">
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="contact-wrapper">
                <div class="contact-cam">
                    <div class="contact-cam-inner">
                        <p>live cam</p>
                        <p>Посмотреть</p>
                    </div>
                    <div class="contact-cam-wrap">
                        <svg width="28" height="26"><use xlink:href="images/icons.svg#cam"></use></svg>
                    </div>
                </div>
                <div class="contact-video">
                    <p>Видео</p>
                    <div class="contact-video-inner">
                        <p>3D</p>
                        <svg width="36" height="34"><use xlink:href="images/icons.svg#3d"></use></svg>
                    </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.574059231447!2d41.61839171541153!3d41.6433373792416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40678672f2beb8cb%3A0x33e0f1c9145ee33!2zMTE2IFp1cmFiIEdvcmdpbGFkemUgU3QsIEJhdHVtaSwg0JPRgNGD0LfQuNGP!5e0!3m2!1sru!2sru!4v1621084648113!5m2!1sru!2sru" width="100%" height="100%" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contact-form">
                <p class="title">Поможем в выборе!</p>
                <p>
                    Разнообразный и богатый опыт начало повседневной работы по формированию.
                </p>
                <form action="hyaction">
                    <input type="text" name="name" placeholder="Имя">
                    <input type="text" name="phone" placeholder="Телефон">
                    <!-- <div class="contact-wrap">
                        <input type="text" name="email" placeholder="Имя">
                    </div> -->
                    <div class="contact-wrap">
                        <div class="contact-inner">
                            <label for="contact-check">Я согласен с условиями обработки персональных данных</label>
                            <input id="contact-check" class="contact-checkbox" type="checkbox">
                        </div>
                        <button class="btn btn-white">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>




<div id="modal">
  <div class="modal-contianer">
    <p class="modal-title">
      Нужна консультация?
    </p>
    <p class="modal-subtitle">
      Оставьте Ваш телефон или почту и наш менеджер свяжиться с Вами!
    </p>
    <div role="form" class="">
      <?= $this->render('_form', [
        'model' => $model,
      ]) ?>
    </div>
  </div>
</div>