<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Контакты');


?>

<div class="contacts">
    <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
        <div class="contacts-wrapper">
            <div class="contacts-inf">
                <div class="breadcrumbs">
                    <a href="/"><?=Yii::t('frontend', 'Главная')?></a>
                    <p><?=Yii::t('frontend', 'Контакты')?></p>
                </div>
                <h1><?=Yii::t('frontend', 'Свяжитесь с нами')?></h1>
                <div class="contacts-contact">
                    <div class="contacts-inner">
                        <div class="contacts-inner-svg">
                            <svg width="20" height="20"><use xlink:href="images/icons.svg#phone"></use></svg>
                        </div>
                        <a href="+995571075555">+995 (571) 07-55-55</a>
                    </div>
                    <div class="contacts-inner">
                        <div class="contacts-inner-svg">
                            <svg width="21" height="16"><use xlink:href="images/icons.svg#mail"></use></svg>
                        </div>
                        <a href="mailto:info@calligraphy-towers.com">info@calligraphy-towers.com</a>
                    </div>
                    <div class="contacts-inner">
                        <div class="contacts-inner-svg">
                            <svg width="17" height="24"><use xlink:href="images/icons.svg#address"></use></svg>
                        </div>
                        <p><?=Yii::t('frontend', 'г. Баутми ул. Шартава 18')?></p>
                    </div>
                </div>
                <a href="#" class="contacts-call btn btn-blue">
                    <span><?=Yii::t('frontend', 'Обратный звонок')?></span>
                    <svg width="20" height="20"><use xlink:href="images/icons.svg#phone"></use></svg>
                </a>
            </div>
            <div class="contacts-map">
                <div id="map" class="map"></div>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.574059231447!2d41.61839171541153!3d41.6433373792416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40678672f2beb8cb%3A0x33e0f1c9145ee33!2zMTE2IFp1cmFiIEdvcmdpbGFkemUgU3QsIEJhdHVtaSwg0JPRgNGD0LfQuNGP!5e0!3m2!1sru!2sru!4v1621084648113!5m2!1sru!2sru" width="100%" height="100%" allowfullscreen="" loading="lazy"></iframe> -->
            </div>
        </div>
    </div>
</div>


<div class="popup-wrapper form">
    <div class="popup">
        <div class="contacts-form">
            <h2><?=Yii::t('frontend', 'Поможем в выборе!')?></h2>
            <p>
				<?=Yii::t('frontend', 'Введите ваши данные и мы Вам перезвоним')?>
            </p>
            <form id="form" action="/" method="post"> 
                <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>">
                <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>">
                <input type="text" name="country" placeholder="<?=Yii::t('frontend', 'Страна')?>">
                <div class="contacts-wrap">
                    <button class="btn btn-blue"><?=Yii::t('frontend', 'Отправить')?></button>
                    <div class="contacts-check">
                        <label for="contacts-check"><?=Yii::t('frontend', 'Я согласен с условиями обработки персональных данных')?></label>
                        <input id="contacts-check" class="contacts-checkbox" type="checkbox">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
