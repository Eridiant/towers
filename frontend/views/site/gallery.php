<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = Yii::t('frontend', 'Галерея');
$this->registerMetaTag(['name' => 'title', 'content' => Yii::t('frontend', 'Галерея. Апартаменты у моря в Батуми')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('frontend', 'Калиграфи Тауерс. Апартаменты в Батуми. Новостройка в центре Батуми')]);

?>

<?= $this->render($rend) ?>

<div class="hotel">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="hotel-bg">
            <picture>
                <img src="/images/dist/gallery/hotel-bg.jpg" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Квартиры в Батуми')?>">
            </picture>
        </div>
        <div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
            <div class="hotel-letter">
                <a href="/presentation/HiltonLetter.pdf" class="" download>
                    <span>Hilton Letter</span>
                    <svg width="28" height="32"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                </a>
            </div>
            <div class="hotel-desc">
                <p class=""><?=Yii::t('frontend', 'Скоро')?></p>
                <h2><?=Yii::t('frontend', 'Отель Хилтон')?></h2>
                <p>
                    <?=Yii::t('frontend', 'Отель Hampton by Hilton- является частью международной сети отелей и курортов, принадлежащая корпорации Hilton Worldwide. Компания была основана Конрадом Хилтоном в 1929 году. Мировой бренд Хилтон, подчеркивает статус и уровень будущего комплекса. Отель будет иметь __ номеров с категориями делюкс, с многофункциональной инфраструктурой. Отель будет принимать гостей своей сети по базе клиентов и работать на внутренний рынок. Высокие стандарты качества и уникальная концепция комплекса создает преимущества для владельцев апартаментов как для аренды так и для проживания в роскошном жилом комплексе. ')?>
                </p>
                <!-- <a href="#" class="btn btn-gray">
                    <span><?//=Yii::t('frontend', 'подробнее')?></span>
                </a> -->
            </div>
        </div>
    </div>
</div>