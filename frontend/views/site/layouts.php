<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Планировки');
$this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'Планировки Недвижимость в Батуми')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('frontend', 'Калиграфи Тауерс. Недвижимость в Батуми у моря. Новостройка в Батуми')]);

$cookies = Yii::$app->request->cookies;
$currentLang = $cookies->getValue('_locale', 'en-US');
$lg = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => Yii::$app->language])->one()->code;

$user_info = \common\models\UserInfo::find()->where(['user_id' => 1])->one();

?>

<script>
    var lgg = <?= json_encode(Yii::$app->language); ?>;
    var summ = <?= json_encode($model); ?>;
    var stt = <?= json_encode($status); ?>;
</script>

<div id="layouts" class="layouts">
    <div class="layouts-bg">
        <picture>
            <img src="/images/dist/layouts/layouts-bg.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
        </picture>
    </div>
    <div class="layouts-bg-svg">
        <figure class="layouts-bg-fig">
            <object id="block" data="/images/svg/layouts-bg.svg" type="image/svg+xml">
                <!-- <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>"> -->
            </object>
        </figure>
        <div class="layouts-bg-letters">
            <div class="layouts-bg-letter cb a" data-choose="1"><?=Yii::t('frontend', 'А')?></div>
            <div class="layouts-bg-letter cb b" data-choose="2"><?=Yii::t('frontend', 'Б')?></div>
            <div class="layouts-bg-letter cb c" data-choose="3"><?=Yii::t('frontend', 'Г')?></div>
        </div>
    </div>
    <!-- <div class="layouts-bg-svg">
        <figure class="layouts-bg-fig">
            <object id="floors" data="/images/svg/layout-flats.svg" type="image/svg+xml">
                <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?//=Yii::t('frontend', 'Недвижимость в Батуми')?>">
            </object>
        </figure>
    </div> -->
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="layouts-content">
            <div class="layouts-title">
                <p class="subtitle"><?=Yii::t('frontend', 'Выберите блок')?></p>
                <h1><?=Yii::t('frontend', 'Планировки')?></h1>
            </div>
            <div class="choose-buttons">
                <a href="javascript:void(0);" class="choose-button cb" data-choose="1">
                    <?=Yii::t('frontend', 'Блок')?> <span><?=Yii::t('frontend', 'а')?></span>
                </a>
                <a href="javascript:void(0);" class="choose-button cb" data-choose="2">
                    <?=Yii::t('frontend', 'Блок')?> <span><?=Yii::t('frontend', 'б')?></span>
                </a>
                <a href="javascript:void(0);" class="choose-button cb" data-choose="3">
                    <?=Yii::t('frontend', 'Блок')?> <span><?=Yii::t('frontend', 'г')?></span>
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
                        <h2><?=Yii::t('frontend', 'Блок')?> <?=Yii::t('frontend', 'A')?></h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-a.png" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> <?=Yii::t('frontend', 'Б')?></h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-b.png" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="choose-inner">
                        <h2><?=Yii::t('frontend', 'Блок')?> <?=Yii::t('frontend', 'Г')?></h2>
                        <div class="choose-img">
                            <picture>
                                <img src="/images/dist/index/choose/block-c.png" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
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

<div id="blocks" class="block">
    <div class="container" style="max-width: 1200px; margin-left: auto; margin-right: auto">
        <div class="block-wrapper">
            <div class="block-desc">
                <div class="breadcrumbs">
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>"><?=Yii::t('frontend', 'Главная')?></a>
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>/layouts"><?=Yii::t('frontend', 'Планировки')?></a>
                    <p><?=Yii::t('frontend', 'Блок')?> <span class="blocks"><?= $block; ?></span></p>
                </div>
                <h3><?=Yii::t('frontend', 'Информация о блоке')?></h3>
                <dl>
                    <dt><?=Yii::t('frontend', 'Этаж')?>:</dt>
                    <dd id="fl">1</dd>
                </dl>
                <p class="floor-call btn btn-blue" data-trg="#layouts">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span><?=Yii::t('frontend', 'Выбрать блок')?></span>
                </p>
            </div>
            <div class="block-inner">
                <div class="block-block">
                    <div class="block-img">
                        <picture> 
                            <img src="/images/dist/layouts/block-<?= $block; ?>-x1.png" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
                        </picture>
                    </div>
                    <div class="block-svg block-svg-a<?= $block == 'a' ? ' block-svg-active' : ''; ?>" data-block="1">
                        <object id="buildA" data="/images/svg/layouts/block/a.svg" type="image/svg+xml">
                            <!-- <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>"> -->
                        </object>
                        <div class="focus"></div>
                    </div>
                    <div class="block-svg block-svg-b<?= $block == 'b' ? ' block-svg-active' : ''; ?>" data-block="2">
                        <object id="buildB" data="/images/svg/layouts/block/b.svg" type="image/svg+xml">
                            <!-- <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>"> -->
                        </object>
                        <div class="focus"></div>
                    </div>
                    <div class="block-svg block-svg-g<?= $block == 'g' ? ' block-svg-active' : ''; ?>" data-block="3">
                        <object id="buildG" data="/images/svg/layouts/block/g.svg" type="image/svg+xml">
                            <!-- <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>"> -->
                        </object>
                        <div class="focus"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="floor" class="floor" data-floor="block-<?= mb_strtoupper($block); ?>">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="floor-wrapper">
            <div class="floor-floor">
                <div class="breadcrumbs">
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>"><?=Yii::t('frontend', 'Главная')?></a>
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>/layouts"><?=Yii::t('frontend', 'Планировки')?></a>
                    <p><?=Yii::t('frontend', 'Блок')?> <span class="blocks"><?= $block; ?></span></p>
                </div>
                <h2><?=Yii::t('frontend', 'Этажи')?></h2>
                <div id="floor-choose" class="floor-choose">
                    <div class="floor-choose-inner floor-show">
                        <div class="floor-choose-img">
                            <picture>
                                <img src="/images/blocks/img/<?= $block; ?>/<?= $floor_img; ?>.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                            </picture>
                        </div>
                        <div class="floor-choose-svg">
                            <figure class="floor-choose-fig">
                                <object id="test" data-floor="<?= $floor_num; ?>" data-block="<?= $block; ?>" data="/images/blocks/svg/<?= $block; ?>/<?= $floor_img; ?>.svg" type="image/svg+xml">
                                    <!-- <img src="/images/dist/bg-1920x1450.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>"> -->
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
                            <p id="floor-free"><?= $flats_free; ?>/<?= $flats; ?></p>
                        </div>
                    </div>
                </div>
                <p class="contacts-call floor-call floor-dt btn btn-blue" data-trg="#blocks">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span><?=Yii::t('frontend', 'Выбрать этаж')?></span>
                </p>
                <p class="contacts-call floor-call floor-mb btn btn-blue" data-trg="#layouts">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span><?=Yii::t('frontend', 'Выбрать блок')?></span>
                </p>
            </div>
            <div class="floor-choose floor-choose-swiper">
                <!-- Swiper -->
                <div class="swiper floorChoose" data-indx="<?= $indx; ?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($blocks as $blocks): ?>
                            <div class="swiper-slide"><?= $blocks->floor; ?></div>
                        <?php endforeach; ?>
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
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>"><?=Yii::t('frontend', 'Главная')?></a>
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>/layouts"><?=Yii::t('frontend', 'Планировки')?></a>
                    <p><?=Yii::t('frontend', 'Квартира')?></p>
                </div>
                <h2><?=Yii::t('frontend', 'Экспликация')?></h2>
                <div class="flat-description-inner">
                    <dl>
                        <dt><?=Yii::t('frontend', 'Номер')?></dt>
                        <dd><span class="num"><?= $model[0]['num']; ?></span></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Общая площадь')?></dt>
                        <dd><span class="total"><?= $model[0]['total_area']; ?></span> <?=Yii::t('frontend', 'м')?><sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Жилая площадь')?></dt>
                        <dd><span class="living"><?= $model[0]['living_space']; ?></span> <?=Yii::t('frontend', 'м')?><sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Балкон')?></dt>
                        <dd><span class="balcony"><?= $model[0]['balcony_area']; ?></span> <?=Yii::t('frontend', 'м')?><sup>2</sup></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Вид')?></dt>
                        <dd><span class="view"><?= $model[0][$lg]; ?></span></dd>
                    </dl>
                    <dl>
                        <dt><?=Yii::t('frontend', 'Статус')?></dt>
                        <dd><span class="status"><?= $status[0]; ?></span></dd>
                    </dl>
                </div>
                <p id="flat-call" class="contacts-call flat-call floor-call btn btn-blue" data-trg="#floor">
                    <svg width="34" height="8"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                    <span><?=Yii::t('frontend', 'Выбрать квартиру')?></span>
                </p>
            </div>
            <div class="flat-plan">
                <div class="flat-plan-img">
                    <picture> 
                        <img src="/images/blocks/<?= $block; ?>/<?= $floor_num; ?>/1.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>">
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
                    <!-- <div class="flat-switch-repair flat-switch-text">
                        <p><?//=Yii::t('frontend', 'с ремонтом')?></p>
                        <svg width="24" height="24"><use xlink:href="/images/icons.svg#repair"></use></svg>
                    </div>
                    <div class="flat-switch-furniture flat-switch-text">
                        <svg width="24" height="18"><use xlink:href="/images/icons.svg#furniture"></use></svg>
                        <p><?//=Yii::t('frontend', 'с мебелью')?></p>
                    </div>
                    <p class="flat-switch-switch"></p> -->
                </div>
                <div class="flat-num-wrapper">
                    <!-- <p>
                        <?//=Yii::t('frontend', 'Цены на квартиры по этажам одна, отличия только вида')?>
                    </p> -->
                </div>
                <!-- <div class="flat-num-img">
                    <picture>
                        <img src="/images/blocks/<?//= $block; ?>/d/<?//= $model[0]['img']; ?>.jpg" alt="Calligraphy Towers. <?//=Yii::t('frontend', 'Апартаменты в Батуми')?>">
                    </picture>
                </div> -->
                <div class="flat-num-inner">
                    <a href="<?=Url::toRoute([Yii::$app->params['curLangUrl'] . '/pdf', 'block' => $block, 'floor' => $floor_num, 'flat' => $model[0]['num'], 'img' => 1, 'view' => $model[0]['en']]) ?>" class="contacts-call btn btn-blue" target="_blank">
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
    <?= $this->render($block, compact('currentLang')) ?>
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
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</main>