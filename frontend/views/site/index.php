<?php


use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Calligraphy Towers';
$this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'Главная страница - Апартаменты в Батуми')]);
$this->registerMetaTag(['name' => 'description', 'content' => "Calligraphy Towers. " . Yii::t('frontend', 'Апартаменты в Батуми')]);

?>

<header class="header">
	<div class="header-bg img-bg">
		<div class="header-bg-wrap header-lights">
			<picture>
				<!-- <source srcset="/images/del/bg14.jpg" media="(max-width: 420px)">
				<source srcset="/images/del/bg13.jpg" media="(max-width: 1280px)">
				<source srcset="/images/del/bg12.jpg" media="(max-width: 1500px)"> -->
				<source srcset="/images/dist/header/header_mb_bg.jpg, /images/dist/header/header_mb_bg-2x.jpg 2x, /images/dist/header/header_mb_bg-4x.jpg 4x" media="(max-width: 480px)">
                <source type="image/jpeg" srcset="/images/dist/header/header_bg.jpg, /images/dist/header/header_bg-2x.jpg 2x, /images/dist/header/header_bg-3x.jpg 3x">
				<img src="/images/dist/header/header_bg.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
			</picture>
		</div>
		<div class="header-bg-wrap">
			<picture>
				<!-- <source srcset="/images/del/bg14.jpg" media="(max-width: 420px)">
				<source srcset="/images/del/bg13.jpg" media="(max-width: 1280px)">
				<source srcset="/images/del/bg12.jpg" media="(max-width: 1500px)">
				<source srcset="/images/del/bg11.jpg" media="(min-width: 1501px)"> -->
				<source srcset="/images/dist/header/header_mb_bg_night.jpg, /images/dist/header/header_mb_bg_night-2x.jpg 2x, /images/dist/header/header_mb_bg_night-4x.jpg 4x" media="(max-width: 480px)">
				<source type="image/jpeg" srcset="/images/dist/header/header_bg_night.jpg, /images/dist/header/header_bg_night-2x.jpg 2x, /images/dist/header/header_bg_night-3x.jpg 3x">
				<img src="/images/dist/header/header_bg_night.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
			</picture>
		</div>
	</div>
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="header-wrapper">
			<div class="header-inner">
				<p class="header-cap cap">
                    official website
                </p>
				<h1 class="header-title">Calligraphy Towers Batumi</h1>
				<div class="header-video">
					<svg width="141" height="141"><use xlink:href="/images/icons.svg#video"></use></svg>
					<p>
                        <?=Yii::t('frontend', 'Видео')?>
                        <?//=Yii::t('frontend', 'Видео о жилом комплексе')?>
                    </p>
				</div>
			</div>
		</div>
        <div class="header-footer">
			<div class="header-light">
				<svg width="19" height="19"><use xlink:href="/images/icons.svg#sun"></use></svg>
				<svg class="header-light-rt" width="57" height="24"><use xlink:href="/images/icons.svg#switch"></use></svg>
				<svg width="17" height="17"><use xlink:href="/images/icons.svg#moon"></use></svg>
			</div>
			<div class="header-sound">
				<a href="/sound/sea.mp3" class="top-sound top-sound-mb">
					<svg id="sound" width="32" height="32"><use xlink:href="/images/icons.svg#sound"></use></svg>
				</a>
			</div>

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
                    <?=Yii::t('frontend', 'Открытый бассейн')?>
                </p>
                <p data-num="12">
                    <?=Yii::t('frontend', 'Закрытый бассейн')?>
                </p>
                <p data-num="13">
                    <?=Yii::t('frontend', 'Фитнес')?>
                </p>
                <p data-num="14">
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
                                <img srcset="/images/dist/infrastructure/inf-20.jpg, /images/dist/infrastructure/inf-20-2x.jpg 2x" src="/images/dist/infrastructure/inf-20.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?=Yii::t('frontend', 'международная сеть отелей Hampton by Hilton! Hampton by Hilton - известная сеть отелей, гостиницы которой представлены во многих странах. Hampton by Hilton включает 1762 гостиницы. Единая база клиентов позволяет иметь ежегодную загрузку отеля. Высокий уровень сервиса и отсутствие конкурентов в Батуми имеет большое преимущество.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Отель Хемптон')?></h3>
                            <p>
                                <?=Yii::t('frontend', 'международная сеть отелей Hampton by Hilton! Hampton by Hilton - известная сеть отелей, гостиницы которой представлены во многих странах. Hampton by Hilton включает 1762 гостиницы. Единая база клиентов позволяет иметь ежегодную загрузку отеля. Высокий уровень сервиса и отсутствие конкурентов в Батуми имеет большое преимущество.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-2.jpg, /images/dist/infrastructure/inf-2-2x.jpg 2x" src="/images/dist/infrastructure/inf-2.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <strong><?//=Yii::t('frontend', 'SPA - центр')?></strong> <?=Yii::t('frontend', 'Будет иметь роскошное светлое пространство, отдельные зоны массажа и оздоровительных процедур. В отличие от большинства спа,которые рассчитаны на туристов, наш спа центр будет иметь — ориентацию на клиентов отеля и владельцев апартаментов, мы сделали упор на  благородные материалы в отделке, лаконичность дизайна и бесконечная элегантность.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'SPA - центр')?></h3>
                            <p>
                                <strong><?//=Yii::t('frontend', 'SPA - центр')?></strong> <?=Yii::t('frontend', 'Будет иметь роскошное светлое пространство, отдельные зоны массажа и оздоровительных процедур. В отличие от большинства спа,которые рассчитаны на туристов, наш спа центр будет иметь — ориентацию на клиентов отеля и владельцев апартаментов, мы сделали упор на  благородные материалы в отделке, лаконичность дизайна и бесконечная элегантность.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-5.jpg, /images/dist/infrastructure/inf-5-2x.jpg 2x" src="/images/dist/infrastructure/inf-5.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <strong><?//=Yii::t('frontend', 'Кинотеатр')?></strong> <?=Yii::t('frontend', 'концепция калиграф таурс, также направлена на досуг с семьей. Вы сможете насладиться современным кинотеатром, с современной акустикой и 3D графикой.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Кинотеатр')?></h3>
                            <p>
                                <strong><?//=Yii::t('frontend', 'Кинотеатр')?></strong> <?=Yii::t('frontend', 'концепция калиграф таурс, также направлена на досуг с семьей. Вы сможете насладиться современным кинотеатром, с современной акустикой и 3D графикой.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-12.jpg, /images/dist/infrastructure/inf-12-2x.jpg 2x" src="/images/dist/infrastructure/inf-12.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Казино')?> <?=Yii::t('frontend', 'комплекс включает формат развлечений для лиц старше 21+, вас ждет казино и разнообразные игры в режиме 24 часа')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Казино')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Казино')?> <?=Yii::t('frontend', 'комплекс включает формат развлечений для лиц старше 21+, вас ждет казино и разнообразные игры в режиме 24 часа')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-3.jpg, /images/dist/infrastructure/inf-3-2x.jpg 2x" src="/images/dist/infrastructure/inf-3.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Фитнес')?> <?=Yii::t('frontend', 'наша задача — создать все условия, чтобы спорт приносил не только пользу, но и удовольствие оснащенный новейшим спортивным оборудованием и всеми необходимыми тренажерами для профессионального спорта и любительских занятий')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Фитнес')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Фитнес')?> <?=Yii::t('frontend', 'наша задача — создать все условия, чтобы спорт приносил не только пользу, но и удовольствие оснащенный новейшим спортивным оборудованием и всеми необходимыми тренажерами для профессионального спорта и любительских занятий')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-9.jpg, /images/dist/infrastructure/inf-9-2x.jpg 2x" src="/images/dist/infrastructure/inf-9.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Бизнес центр')?> <?=Yii::t('frontend', 'отличное место для работы и отдыха, мы предусмотрели возможность работы в формате коворкинг зон для переговров и мероприятий.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Бизнес центр')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Бизнес центр')?> <?=Yii::t('frontend', 'отличное место для работы и отдыха, мы предусмотрели возможность работы в формате коворкинг зон для переговров и мероприятий.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-21.jpg, /images/dist/infrastructure/inf-21-2x.jpg 2x" src="/images/dist/infrastructure/inf-21.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Рестораны')?> <?=Yii::t('frontend', 'будут иметь свыше 3 видов кухни, приятная музыка, морской воздух. Высокая и традиционная Грузинская, Европейская и Азиатская кухня.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Рестораны')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Рестораны')?> <?=Yii::t('frontend', 'будут иметь свыше 3 видов кухни, приятная музыка, морской воздух. Высокая и традиционная Грузинская, Европейская и Азиатская кухня.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-8.jpg, /images/dist/infrastructure/inf-8-2x.jpg 2x" src="/images/dist/infrastructure/inf-8.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Детская комната')?> <?=Yii::t('frontend', 'концепция отеля имеет детский клуб и анимацию для детей от 2 до 10 лет,  мы ценим ваш отдых и заботимся о ваших детях.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Детская комната')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Детская комната')?> <?=Yii::t('frontend', 'концепция отеля имеет детский клуб и анимацию для детей от 2 до 10 лет,  мы ценим ваш отдых и заботимся о ваших детях.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-31.jpg, /images/dist/infrastructure/inf-31-2x.jpg 2x" src="/images/dist/infrastructure/inf-31.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Собственный пляж')?> <?=Yii::t('frontend', 'ваш отдых будет иметь персональную зону на море, отдельный пляж и лежаки.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Собственный пляж')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Собственный пляж')?> <?=Yii::t('frontend', 'ваш отдых будет иметь персональную зону на море, отдельный пляж и лежаки.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-7.jpg, /images/dist/infrastructure/inf-7-2x.jpg 2x" src="/images/dist/infrastructure/inf-7.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Озелененные террасы')?> <?=Yii::t('frontend', 'сможете насладиться видами вечернего Батуми , футбольным матчем или концертом мирового масштаба не покидая комплекс')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Озелененные террасы')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Озелененные террасы')?> <?=Yii::t('frontend', 'сможете насладиться видами вечернего Батуми , футбольным матчем или концертом мирового масштаба не покидая комплекс')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-1.jpg, /images/dist/infrastructure/inf-1-2x.jpg 2x" src="/images/dist/infrastructure/inf-1.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Бассейн')?> <?=Yii::t('frontend', 'входит в концепцию - подогреваемый бассейн.')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Открытый бассейн')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Бассейн')?> <?=Yii::t('frontend', 'входит в концепцию - подогреваемый бассейн.')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-32.jpg, /images/dist/infrastructure/inf-32-2x.jpg 2x" src="/images/dist/infrastructure/inf-32.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                            <div>
                                <p><?=Yii::t('frontend', 'Нашим отдыхающим мы предлагаем открытый и закрытый бассейн в комплексе, в любое время года.')?></p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Закрытый бассейн')?></h3>
                            <p><?=Yii::t('frontend', 'Нашим отдыхающим мы предлагаем открытый и закрытый бассейн в комплексе, в любое время года.')?></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-3.jpg, /images/dist/infrastructure/inf-3-2x.jpg 2x" src="/images/dist/infrastructure/inf-3.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?//=Yii::t('frontend', 'Фитнес')?> <?=Yii::t('frontend', 'наша задача — создать все условия, чтобы спорт приносил не только пользу, но и удовольствие оснащенный новейшим спортивным оборудованием и всеми необходимыми тренажерами для профессионального спорта и любительских занятий')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Фитнес')?></h3>
                            <p>
                                <?//=Yii::t('frontend', 'Фитнес')?> <?=Yii::t('frontend', 'наша задача — создать все условия, чтобы спорт приносил не только пользу, но и удовольствие оснащенный новейшим спортивным оборудованием и всеми необходимыми тренажерами для профессионального спорта и любительских занятий')?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="infr-slider">
                        <div class="infr-img">
                            <picture>
                                <img srcset="/images/dist/infrastructure/inf-11.jpg, /images/dist/infrastructure/inf-11-2x.jpg 2x" src="/images/dist/infrastructure/inf-11.jpg" width="450" height="544" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                            <div>
                                <p>
                                    <?=Yii::t('frontend', 'Паркинг на 300 парковочных мест')?>
                                </p>
                            </div>
                        </div>
                        <div class="infr-title">
                            <h3><?=Yii::t('frontend', 'Паркинг')?></h3>
                            <p>
                                <?=Yii::t('frontend', 'Паркинг на 300 парковочных мест')?>
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
                            <source type="image/jpeg" media="(max-width: 480px)" srcset="/images/dist/index/about-mb-1.jpg, /images/dist/index/about-mb-1-2x.jpg 2x">
                            <source type="image/jpeg" srcset="/images/dist/index/about-1.jpg, /images/dist/index/about-1-2x.jpg 2x">
                            <img src="/images/dist/index/about-1.jpg" width="1306" height="872" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                        </picture>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="aboute-img">
                        <picture>
                            <source type="image/jpeg" media="(max-width: 480px)" srcset="/images/dist/index/about-mb-2.jpg, /images/dist/index/about-mb-2-2x.jpg 2x">
                            <source type="image/jpeg" srcset="/images/dist/index/about-2.jpg, /images/dist/index/about-2-2x.jpg 2x">
                            <img src="/images/dist/index/about-2.jpg" width="1306" height="872" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
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
                        <img srcset="/images/dist/index/project/project-1.jpg, /images/dist/index/project/project-1-2x.jpg 2x" src="/images/dist/index/project/project-1.jpg" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-2">
                    <picture>
                        <img srcset="/images/dist/index/project/project-2.jpg, /images/dist/index/project/project-2-2x.jpg 2x" src="/images/dist/index/project/project-2.jpg" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-3">
                    <picture>
                        <img srcset="/images/dist/index/project/project-3.png, /images/dist/index/project/project-3-2x.png 2x" src="/images/dist/index/project/project-3.png" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-4">
                    <picture>
                        <img srcset="/images/dist/index/project/project-4.png, /images/dist/index/project/project-4-2x.png 2x" src="/images/dist/index/project/project-4.png" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                    </picture>
                </div>
                <div class="project-img-hide" id="project-5">
                    <picture>
                        <img srcset="/images/dist/index/project/project-5.png, /images/dist/index/project/project-5-2x.png 2x" src="/images/dist/index/project/project-5.png" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
            </div>
            <div class="project-about">
                <h2><?=Yii::t('frontend', 'О проекте')?></h2>
                <p>
                    <?=Yii::t('frontend', 'Этапы работ по строительству комплекса.')?>
                </p>
                <div class="project-svg">
                    <figure class="project-fig">
                        <object id="project" data="/images/svg/project.svg" type="image/svg+xml">
                            <!-- <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>"> -->
                        </object>
                    </figure>
                    <div class="project-desc">
                    <div class="project-desc-1">
                            <p><?=Yii::t('frontend', 'Зима')?>, 2019</p>
                            <p><?=Yii::t('frontend', 'согласование работ')?></p>
                        </div>
                        <div class="project-desc-2">
                            <p><?=Yii::t('frontend', 'Зима')?>, 2020</p>
                            <p><?=Yii::t('frontend', 'контракт с отелем Хемптон')?></p>
                        </div>
                        <div class="project-desc-3">
                            <p><?=Yii::t('frontend', 'Зима')?>, 2023</p>
                            <p><?=Yii::t('frontend', 'завершение строительства блока Б')?></p>
                        </div>
                        <div class="project-desc-4">
                            <p><?=Yii::t('frontend', 'Зима')?>, 2024</p>
                            <p><?=Yii::t('frontend', 'завершение строительства блока А  и  открытие гостиницы Hampton')?></p>
                        </div>
                        <div class="project-desc-5">
                            <p><?=Yii::t('frontend', 'Зима')?>, 2025</p>
                            <p><?=Yii::t('frontend', 'завершение строительства блока С')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-slider">
            <div style="--swiper-navigation-size: 30px; --swiper-navigation-color: #0b2867;" class="swiper project-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="choose-inner">
                            <div class="choose-img">
                                <picture>
                                    <img srcset="/images/dist/index/project/project-1.jpg, /images/dist/index/project/project-1-2x.jpg 2x" src="/images/dist/index/project/project-1.jpg" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                                </picture>
                            </div>
                            <p><?=Yii::t('frontend', 'Зима')?>, 2019</p>
                            <p><?=Yii::t('frontend', 'согласование работ')?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="choose-inner">
                            <div class="choose-img">
                                <picture>
                                    <img srcset="/images/dist/index/project/project-2.jpg, /images/dist/index/project/project-2-2x.jpg 2x" src="/images/dist/index/project/project-2.jpg" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                                </picture>
                            </div>
                            <p><?=Yii::t('frontend', 'Зима')?>, 2020</p>
                            <p><?=Yii::t('frontend', 'контракт с отелем Хемптон')?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="choose-inner">
                            <div class="choose-img">
                                <picture>
                                    <img srcset="/images/dist/index/project/project-3.png, /images/dist/index/project/project-3-2x.png 2x" src="/images/dist/index/project/project-3.png" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                                </picture>
                            </div>
                            <p><?=Yii::t('frontend', 'Зима')?>, 2023</p>
                            <p><?=Yii::t('frontend', 'завершение строительства блока Б')?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="choose-inner">
                            <div class="choose-img">
                                <picture>
                                    <img srcset="/images/dist/index/project/project-4.png, /images/dist/index/project/project-4-2x.png 2x" src="/images/dist/index/project/project-4.png" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                                </picture>
                            </div>
                            <p><?=Yii::t('frontend', 'Зима')?>, 2024</p>
                            <p><?=Yii::t('frontend', 'завершение строительства блока А  и  открытие гостиницы Hampton')?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="choose-inner">
                            <div class="choose-img">
                                <picture>
                                    <img srcset="/images/dist/index/project/project-5.png, /images/dist/index/project/project-5-2x.png 2x" src="/images/dist/index/project/project-5.png" width="486" height="691" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                                </picture>
                            </div>
                            <p><?=Yii::t('frontend', 'Зима')?>, 2025</p>
                            <p><?=Yii::t('frontend', 'завершение строительства блока С')?></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next project-next"></div>
                <div class="swiper-button-prev project-prev"></div>
            </div>
        </div>
    </div>
</div>

<div id="choose" class="choose">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="choose-bg">
            <div class="choose-bg-img">
                <picture>
                    <img srcset="/images/dist/index/choose-bg.jpg, /images/dist/index/choose-bg-1_5x.jpg 1.5x" src="/images/dist/index/choose-bg.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                </picture>
            </div>
            <div class="choose-bg-svg">
                <figure class="choose-bg-fig">
                    <object id="choosed" data="/images/svg/choose-bg.svg" type="image/svg+xml">
                        <!-- <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>"> -->
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
                    <a href="<?=Url::toRoute('/layouts/block-A') ?>" class="choose-button" data-choose="1">
                        <?=Yii::t('frontend', 'Блок')?> <span><?=Yii::t('frontend', 'а')?></span>
                    </a>
                    <a href="<?=Url::toRoute('/layouts/block-B') ?>" class="choose-button" data-choose="2">
                        <?=Yii::t('frontend', 'Блок')?> <span><?=Yii::t('frontend', 'б')?></span>
                    </a>
                    <a href="<?=Url::toRoute('/layouts/block-C') ?>" class="choose-button" data-choose="3" data-inf="<?=Yii::t('frontend', 'скоро в продаже')?>">
                        <?//=Yii::t('frontend', 'Блок')?> <span><?=Yii::t('frontend', 'с')?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="choose-slider">
        <p><?=Yii::t('frontend', 'Выберите блок')?></p>
        <div class="choose-buttons-mob">
            <a href="<?=Url::toRoute('/layouts/block-A') ?>" class="choose-button-mob" data-choose="1">
                <?=Yii::t('frontend', 'а')?>
            </a>
            <a href="<?=Url::toRoute('/layouts/block-B') ?>" class="choose-button-mob" data-choose="2">
                <?=Yii::t('frontend', 'б')?>
            </a>
            <a href="<?=Url::toRoute('/layouts/block-C') ?>" class="choose-button-mob" data-choose="3">
                <?=Yii::t('frontend', 'с')?>
            </a>
        </div>
        <div style="--swiper-navigation-size: 30px; --swiper-navigation-color: #fff;" class="swiper choose-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> <?=Yii::t('frontend', 'A')?></h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-a.png" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> <?=Yii::t('frontend', 'Б')?></h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-b.png" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> <?=Yii::t('frontend', 'С')?></h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-c.png" loading="lazy" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
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

<div class="contact">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="contact-wrapper">
            <div id="map" class="map"></div>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1328.2836435082295!2d41.62014495682075!3d41.63638203314697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40678775a868440d%3A0x6639592c1ec7d412!2sCalligraphy%20Towers%20Batumi!5e0!3m2!1sru!2sru!4v1641549010797!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
        </div>
        
        <div class="contact-wrapper">
            <!-- <div class="contact-bg">
                <picture>
                    <img src="/images/contact-team.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                </picture>
            </div> -->
            <div class="contact-form">
                <p class="title"><?=Yii::t('frontend', 'Поможем в выборе!')?></p>
                <p>
                    <?=Yii::t('frontend', 'Пожалуйста, заполните Вашу контактную информацию.')?>
                </p>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
            <div class="contact-bg">
                <div class="contact-cam">
                    <div class="contact-cam-inner">
                        <p>live cam</p>
                        <p><?=Yii::t('frontend', 'Посмотреть')?></p>
                    </div>
                    <div class="contact-cam-wrap">
                        <svg width="28" height="26"><use xlink:href="/images/icons.svg#cam"></use></svg>
                    </div>
                </div>
                <div class="contact-video contact-cam">
                    <p><?=Yii::t('frontend', 'Видео')?></p>
                    <div class="contact-video-inner">
                        <p>3D</p>
                        <svg width="36" height="34"><use xlink:href="/images/icons.svg#3d"></use></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->registerJsFile(
        '//maps.googleapis.com/maps/api/js?key=AIzaSyCabbDzORGtAU9PwXxSc4YG0fSM7YyVEPw&region=EN&language=en',
        ['position' => $this::POS_END, 'async'=>true]
);

