<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Контакты');
$this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'Контакт. Апартаменты на берегу моря в Батуми')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('frontend', 'Контакт. Апартаменты в Батуми. Улица Шартава Батуми. Квартиры в центре батуми у стадиона Уефа')]);

?>

<div class="contacts-form">
    <div class="contact">
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="contact-wrapper">
                <div class="contact-form">
                    <p class="title"><?=Yii::t('frontend', 'Поможем в выборе!')?></p>
                    <p>
                        <?=Yii::t('frontend', 'Пожалуйста, заполните Вашу контактную информацию.')?>
                    </p>
                    <?= $this->render('_form', compact('model')) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contacts">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="contacts-wrapper">
            <div class="contacts-inf">
                <div class="breadcrumbs">
                    <a href="<?= Yii::$app->params['curLangUrl'] ?>"><?=Yii::t('frontend', 'Главная')?></a>
                    <p><?=Yii::t('frontend', 'Контакты')?></p>
                </div>
                <h1><?=Yii::t('frontend', 'Свяжитесь с нами')?></h1>
                <div class="contacts-contact">
                    <div class="contacts-inner">
                        <div class="contacts-inner-svg">
                            <svg width="20" height="20"><use xlink:href="/images/icons.svg#phone"></use></svg>
                        </div>
                        <a href="+995571075555">+995 (571) 07-55-55</a>
                    </div>
                    <div class="contacts-inner">
                        <div class="contacts-inner-svg">
                            <svg width="21" height="16"><use xlink:href="/images/icons.svg#mail"></use></svg>
                        </div>
                        <a href="mailto:info@calligraphy-batumi.com">info@calligraphy-batumi.com</a>
                    </div>
                    <div class="contacts-inner">
                        <div class="contacts-inner-svg">
                            <svg width="17" height="24"><use xlink:href="/images/icons.svg#address"></use></svg>
                        </div>
                        <p><?=Yii::t('frontend', 'г. Батуми ул. Шартава 18')?></p>
                    </div>
                </div>
                <a href="#" class="contacts-call btn btn-blue">
                    <span><?=Yii::t('frontend', 'Обратный звонок')?></span>
                    <svg width="20" height="20"><use xlink:href="/images/icons.svg#phone"></use></svg>
                </a>
            </div>
            <div class="contacts-map">
                <div id="map" class="map"></div>
                <div class="contacts-map-img">
                    <picture>
                        <img src="/images/dist/map.jpg" alt="">
                    </picture>
                </div>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.574059231447!2d41.61839171541153!3d41.6433373792416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40678672f2beb8cb%3A0x33e0f1c9145ee33!2zMTE2IFp1cmFiIEdvcmdpbGFkemUgU3QsIEJhdHVtaSwg0JPRgNGD0LfQuNGP!5e0!3m2!1sru!2sru!4v1621084648113!5m2!1sru!2sru" width="100%" height="100%" allowfullscreen="" loading="lazy"></iframe> -->
            </div>
        </div>
    </div>
</div>


<div class="popup-wrapper form form-contact">
    <div class="popup">
        <div class="contacts-form">
            <h2><?=Yii::t('frontend', 'Поможем в выборе!')?></h2>
            <p>
				<?=Yii::t('frontend', 'Введите ваши данные и мы Вам перезвоним')?>
            </p>
            <form id="form-call-back" action="/" method="post">
                <input type="hidden" name="body" value="pop-up">
                <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>" title="<?=Yii::t('frontend', 'только буквы')?>" required>
                <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>" pattern="\+?[0-9\s\-\(\)]+" title="<?=Yii::t('frontend', 'только цифры')?>" required>
                <input type="text" name="country" placeholder="<?=Yii::t('frontend', 'Страна')?>">
                <div class="contacts-wrap">
                    <button class="btn btn-blue"><?=Yii::t('frontend', 'Отправить')?></button>
                    <div class="contacts-check">
                        <label for="contact-check"><?=Yii::t('frontend', 'Я согласен с условиями обработки персональных данных')?></label>
                        <input id="contact-check" class="contact-checkbox" type="checkbox" name="viewed" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    $this->registerJsFile(
        '//maps.googleapis.com/maps/api/js?key=AIzaSyAatwjPC0N1Ku1zqWAFebbu66TnvDEbk6w&region=EN&language=en',
        ['position' => $this::POS_END, 'async'=>true]
    );