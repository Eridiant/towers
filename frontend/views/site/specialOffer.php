<?php

use yii\helpers\Url;


$user_info = \common\models\UserInfo::find()->where(['user_id' => 1])->one();
?>

<header class="offer">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="offer-bg">
            <picture>
                <source srcset="/images/dist/offer/offer-bg-mb-1x.jpg, /images/dist/offer/offer-bg-mb-2x.jpg 2x, /images/dist/offer/offer-bg-mb-4x.jpg 4x" media="(max-width: 768px)">
                <source srcset="/images/dist/offer/offer-bg-1x.jpg, /images/dist/offer/offer-bg-2x.jpg 2x, /images/dist/offer/offer-bg-4x.jpg 4x" media="(min-width: 769px)">
				<img src="/images/dist/offer/offer-bg-1x.jpg" width="1920" height="1080" alt="">
            </picture>
        </div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="offer-wrapper">
                <img class="subtitle" src="/images/dist/offer/flat.png" alt="">
                <img class="caption" src="/images/dist/offer/sea.png" alt="">
                <div class="offer-inner">
                    <img src="/images/dist/offer/num.png" alt="">
                    <img src="/images/dist/offer/mln.png" alt="">
                </div>
                <p>Рассрочка <span>под 0%</span> на <span>3 года</span></p>
                <a href="#" class="offer-btn cont-messager"><span>Белый каркас</span></a>
            </div>
        </div>
    </div>
</header>


<div class="lead">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <p>Дорогие друзья! Специально для Вас мы подобрали уникальное апартаменты на самых выгодных условиях (количество предложений ограниченно). Квартиры идут в белом каркасе под косметический ремонт. Срок проведения акции бессрочный, до продажи всех лотов. Условия оплаты: первоначальный взнос и 0% рассрочка на 3 года. Стоимость апартаментов начинается от 27 700$  Подробную информацию вы можете получить у наших менеджеров по телефону или онлайн в мессенджерах.</p>
    </div>
</div>


<!-- <div class="header">
	<div class="header-bg img-bg">
		<div class="header-bg-wrap header-lights">
			<picture>
				<source srcset="/images/dist/header/header_mb_bg_night.jpg, /images/dist/header/header_mb_bg_night-2x.jpg 2x, /images/dist/header/header_mb_bg_night-4x.jpg 4x" media="(max-width: 480px)">
				<source type="image/jpeg" srcset="/images/dist/header/header_bg_night.jpg, /images/dist/header/header_bg_night-1_5x.jpg 2x">
				<img src="/images/dist/header/header_bg_night.jpg" alt="Calligraphy Towers. Недвижимость в Батуми">
			</picture>
		</div>
	</div>
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="header-wrapper">
			<div class="header-inner">
				<div class="header-video">
					<svg width="141" height="141"><use xlink:href="/images/icons.svg#video"></use></svg>
					<p>Видео</p>
				</div>
			</div>
		</div>
	</div>
</div> -->


<div class="gallery">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="gallery-wrapper">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper gallery-main">
                <div class="swiper-wrapper">
                    <?php for($i=1; $i<7; $i++): ?>
                        <div class="swiper-slide">
                            <picture>
                                <source type="image/jpeg" media="(max-width: 480px)" srcset="/images/dist/gallery/gallery-mb-<?= $i; ?>.jpg, /images/dist/gallery/gallery-mb-<?= $i; ?>-2x.jpg 2x">
                                <source type="image/jpeg" srcset="/images/dist/gallery/gallery-<?= $i; ?>.jpg, /images/dist/gallery/gallery-<?= $i; ?>-2x.jpg 2x">
                                <img src="/images/dist/gallery/gallery-<?= $i; ?>.jpg" width="1204" height="779" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
                            </picture>
                        </div>
                    <?php endfor; ?>
                    <?php for($i=21; $i<39; $i++): ?>
                        <div class="swiper-slide">
                            <picture>
                                <img src="/images/dist/gallery/gallery-<?= $i; ?>.jpg" width="1204" height="779" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>

<div id="flat" class="flat">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="flat-wrapper">
            <div class="flat-description">
                <div class="breadcrumbs">
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>"><?=Yii::t('frontend', 'Главная')?></a>
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>/layouts"><?=Yii::t('frontend', 'Планировки')?></a>
                    <p><?=Yii::t('frontend', 'Квартира')?></p>
                </div>
                <h2><?=Yii::t('frontend', 'Экспликация')?></h2>
                <div class="flat-description-inner">
                    <dl>
                        <dt><?=Yii::t('frontend', 'Этаж')?></dt>
                        <dd><span class="floor"><?= $model['floor_num']; ?></span></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Номер')?></dt>
                        <dd><span class="num"><?= $model['num']; ?></span></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Общая площадь')?></dt>
                        <dd><span class="total"><?= $model['total_area']; ?></span> <?=Yii::t('frontend', 'м')?><sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Жилая площадь')?></dt>
                        <dd><span class="living"><?= $model['living_space']; ?></span> <?=Yii::t('frontend', 'м')?><sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Балкон')?></dt>
                        <dd><span class="balcony"><?= $model['balcony_area']; ?></span> <?=Yii::t('frontend', 'м')?><sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Вид')?></dt>
                        <dd><span class="view"><?= $model['ru']; ?></span></dd>
                    </dl>
                    <dl>
                </div>
                <p id="flat-call" class="contacts-call flat-call floor-call btn btn-blue" data-trg="#floor">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span><?=Yii::t('frontend', 'Выбрать квартиру')?></span>
                </p>
            </div>
            <div class="flat-plan">
                <div class="flat-plan-img">
                    <picture> 
                        <img src="/images/blocks/<?= $block; ?>/<?= $model['floor_num']; ?>/9.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                    </picture>
                </div>
                <!-- <div class="flat-plan-floor">
                    <span>этаж</span>
                    <span>2</span>
                    <span>Выбрать этаж</span>
                </div> -->
            </div>
            <div class="flat-num">
                <div class="flat-switch<?= $block == 'a' ? ' none' : ''; ?>">
                    <div class="flat-switch-repair flat-switch-text">
                        <p><?=Yii::t('frontend', 'с ремонтом')?></p>
                        <svg width="24" height="24"><use xlink:href="/images/icons.svg#repair"></use></svg>
                    </div>
                    <div class="flat-switch-furniture flat-switch-text">
                        <svg width="24" height="18"><use xlink:href="/images/icons.svg#furniture"></use></svg>
                        <p><?=Yii::t('frontend', 'с мебелью')?></p>
                    </div>
                    <p class="flat-switch-switch"></p>
                </div>
                <div class="flat-num-wrapper">
                    <!-- <p>
                        <?//=Yii::t('frontend', 'Цены на квартиры по этажам одна, отличия только вида')?>
                    </p> -->
                </div>
                <div class="flat-num-img">
                    <picture>
                        <img src="/images/blocks/<?= $block; ?>/d/<?= $model['img']; ?>.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div>
                <div class="flat-num-inner">
                    <a href="<?= Url::toRoute(['ru/pdf', 'block' => $block, 'floor' => $model['floor_num'], 'flat' => $model['num'], 'img' => 9, 'view' => $model['ru']]) ?>" class="contacts-call btn btn-blue" target="_blank">
                        <span><?=Yii::t('frontend', 'Скачать план (PDF)')?></span>
                        <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                    </a>
                </div>
                <div class="flat-num-social">
                    <a href="https://telegram.me/<?= $user_info->telegram; ?>">
                        <svg width="32" height="32" style="color: #0b2867; margin-right: 20px"><use xlink:href="/images/icons.svg#telegram"></use></svg>
                    </a>
                    <a href="https://wa.me/<?= $user_info->whats_app; ?>">
                        <svg width="32" height="32" style="color: #0b2867; margin-right: 20px"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
                    </a>
                    <a href="viber://add?number=<?= $user_info->viber; ?>">
                        <svg width="32" height="32" style="color: #0b2867; margin-right: 20px"><use xlink:href="/images/icons.svg#viber"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="renovation" class="renovation">
    <?= $this->render($block) ?>
</div>

<main>
    <div class="contact">
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="contact-wrapper">
                <div class="contact-form">
                    <p class="title"><?=Yii::t('frontend', 'Поможем в выборе!')?></p>
                    <p>
                        <?=Yii::t('frontend', 'Пожалуйста, заполните Вашу контактную информацию.')?>
                    </p>
                    

                    <form id="form" method="post">
                        <div class="contact-wrap">
                            <input type="hidden" name="_csrf-frontend" value="<?= Yii::$app->request->csrfToken; ?>">
                            <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>" title="<?=Yii::t('frontend', 'только буквы')?>" required>
                            <input type="text" name="email" placeholder="<?=Yii::t('frontend', 'Почта')?>" pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})" title="<?=Yii::t('frontend', 'your_mail@mail')?>" required>
                            <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>" pattern="\+?[0-9\s\-\(\)]+" title="<?=Yii::t('frontend', 'только цифры')?>" required>
                            <input type="text" name="country" placeholder="<?=Yii::t('frontend', 'Страна')?>">
                        </div>
                        <div class="contact-wrap">
                            <div class="contact-inner">
                                <label for="contact-check"><?=Yii::t('frontend', 'Я согласен с условиями обработки персональных данных')?></label>
                                <input id="contact-check" class="contact-checkbox" type="checkbox" name="viewed" required checked>
                            </div>
                            <button class="btn btn-white"><?=Yii::t('frontend', 'Отправить')?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- <?//= $this->render('_form', compact('model')) ?> -->