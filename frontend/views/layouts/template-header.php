<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>

<div class="top">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="top-nav">
			<div class="top-logo">
				<a href="<?=Url::toRoute('/') ?>">
					<svg width="100%" height="100%"><use xlink:href="/images/icons.svg#logo"></use></svg>
				</a>
			</div>
			<div class="top-social">
				<a href="#">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#fb"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#youtube"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#instagram"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#telegram"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
				</a>
				<a href="#">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#viber"></use></svg>
				</a>
			</div>
			<a href="#" class="top-sound">
				<svg width="32" height="32"><use xlink:href="/images/icons.svg#sound"></use></svg>
			</a>
			<div class="top-lang">
                <?php $langs = \backend\modules\language\models\Language::find()->where(['deleted_at' => null])->all(); ?>
                <?php foreach ($langs as $lang): ?>
                    <a <?= ($lang->key == $currentLang) ? 'class="current"' : ''; ?> href="/site/set-locale?locale=<?=$lang->key?>">
                        <span><?= $lang->code; ?></span>
                    </a>
                <?php endforeach; ?>
			</div>
			<div class="top-navg">
                <a href="<?=Url::toRoute('/') ?>">
                    <?=Yii::t('frontend', 'Главная')?>
                </a>
				<a href="<?=Url::toRoute('/infrastructure') ?>">
                    <?=Yii::t('frontend', 'Инфраструктура')?>
                </a>
                <a href="<?=Url::toRoute('/layouts') ?>">
                    <?=Yii::t('frontend', 'Планировки')?>
                </a>
                <a href="<?=Url::toRoute('/gallery') ?>">
                    <?=Yii::t('frontend', 'Галерея')?>
                </a>
                <a href="<?=Url::toRoute('/about') ?>">
                    <?=Yii::t('frontend', 'О компании')?>
                </a>
                <a href="<?=Url::toRoute('/news') ?>">
                    <?=Yii::t('frontend', 'Новости')?>
                </a>
                <a href="<?=Url::toRoute('/contacts') ?>">
                    <?=Yii::t('frontend', 'Контакты')?>
                </a>
			</div>
			<a href="tel:+70988900043" class="top-phone phone">+7 (098) 890-00-43</a>
		</div>
	</div>
</div>

<div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
    <div class="menu">
        <svg width="23" height="17"><use xlink:href="/images/icons.svg#menu"></use></svg>
    </div>
    <div class="lang">
        <div class="lang-choosed">
            ru
        </div>
        <div class="lang-choose">
            <ul>
                <li><a href="#">
                    ge
                </a></li>
                <li><a href="#">
                    en
                </a></li>
                <li><a href="#">
                    ru
                </a></li>
                <li><a href="#">
                    he
                </a></li>
            </ul>
        </div>
    </div>
</div>
<div class="content">
    <div class="content-header">
        <a href="<?=Url::toRoute('/') ?>">
            <svg width="53" height="108"><use xlink:href="/images/icons.svg#logo"></use></svg>
        </a>
        <div class="top-social">
            <a href="#">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#fb"></use></svg>
            </a>
            <a href="#">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#youtube"></use></svg>
            </a>
            <a href="#">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#instagram"></use></svg>
            </a>
            <a href="#">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#telegram"></use></svg>
            </a>
            <a href="#">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
            </a>
            <a href="#">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#viber"></use></svg>
            </a>
        </div>
        <div class="content-empty"></div>
        <div class="content-close">
            <svg width="20" height="20"><use xlink:href="/images/icons.svg#close"></use></svg>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="content-nav">
            <ul>
                <li><a href="<?=Url::toRoute('/') ?>">
                    <?=Yii::t('frontend', 'Главная')?>
                </a></li>
                <li><a href="<?=Url::toRoute('/infrastructure') ?>">
                    <?=Yii::t('frontend', 'Инфраструктура')?>
                </a></li>
                <li><a href="<?=Url::toRoute('/layouts') ?>">
                    <?=Yii::t('frontend', 'Планировки')?>
                </a></li>
                <li><a href="<?=Url::toRoute('/gallery') ?>">
                    <?=Yii::t('frontend', 'Галерея')?>
                </a></li>
                <li><a href="<?=Url::toRoute('/about') ?>">
                    <?=Yii::t('frontend', 'О компании')?>
                </a></li>
                <li><a href="<?=Url::toRoute('/news') ?>">
                    <?=Yii::t('frontend', 'Новости')?>
                </a></li>
                <li><a href="<?=Url::toRoute('/contacts') ?>">
                    <?=Yii::t('frontend', 'Контакты')?>
                </a></li>
            </ul>
        </div>
        <a class="content-footer" href="#"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
    </div>
</div>