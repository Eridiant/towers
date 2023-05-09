<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<script>
    var currLang = "<?= \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $currentLang])->one()->code; ?>"
</script>

<div class="top">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="top-nav">
			<div class="top-logo">
				<a href="<?=Url::toRoute($curLangUrl . '/') ?>">
					<svg width="100%" height="100%"><use xlink:href="/images/icons.svg#logo"></use></svg>
				</a>
			</div>
			<div class="top-social">
				<a href="<?= $user_info->fb; ?>">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#fb"></use></svg>
				</a>
				<a href="<?= $user_info->youtube; ?>">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#youtube"></use></svg>
				</a>
				<a href="<?= $user_info->instagram; ?>">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#instagram"></use></svg>
				</a>
				<a href="https://telegram.me/<?= $user_info->telegram; ?>">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#telegram"></use></svg>
				</a>
				<a href="https://wa.me/<?= $user_info->whats_app; ?>">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
				</a>
				<a href="viber://add?number=<?= $user_info->viber; ?>">
					<svg width="16" height="16"><use xlink:href="/images/icons.svg#viber"></use></svg>
				</a>
				<a href="https://t.me/calligraphy_batumi_bot" class="top-social-bot">
					<svg width="16" height="16"><use xlink:href="images/icons.svg#telegram"></use></svg>
                    <span>bot</span>
				</a>
			</div>
            <div class="content-empty"></div>
			<div class="top-navg">
                <a href="<?=Url::toRoute($curLangUrl . '/') ?>">
                    <?=Yii::t('frontend', 'Главная')?>
                </a>
				<a href="<?=Url::toRoute($curLangUrl . '/infrastructure') ?>">
                    <?=Yii::t('frontend', 'Инфраструктура')?>
                </a>
                <a href="<?=Url::toRoute($curLangUrl . '/layouts') ?>">
                    <?=Yii::t('frontend', 'Планировки')?>
                </a>
                <a href="<?=Url::toRoute($curLangUrl . '/gallery') ?>">
                    <?=Yii::t('frontend', 'Галерея')?>
                </a>
                <a href="<?=Url::toRoute($curLangUrl . '/about') ?>">
                    <?=Yii::t('frontend', 'О компании')?>
                </a>
                <a href="<?=Url::toRoute($curLangUrl . '/news') ?>">
                    <?=Yii::t('frontend', 'Новости')?>
                </a>
                <a href="<?=Url::toRoute($curLangUrl . '/contacts') ?>">
                    <?=Yii::t('frontend', 'Контакты')?>
                </a>
			</div>
			<a href="tel:<?= $user_info->phone; ?>" class="top-phone phone"><?= preg_replace("/^(\d{3})(\d{3})(\d{2})(\d{2})(\d{2})$/", "+$1($2)-$3-$4-$5", $user_info->phone); ?></a>
		</div>
	</div>
</div>

<div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
    <div class="menu">
        <svg width="23" height="17"><use xlink:href="/images/icons.svg#menu"></use></svg>
    </div>
    <div class="lang lang-dt">
        <?php $lg = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $currentLang])->one(); ?>
        <div class="lang-choosed">
            <?= $lg->code; ?>
        </div>
        <div class="lang-choose">
            <?php $langs = \backend\modules\language\models\Language::find()->where(['deleted_at' => null])->all(); ?>
            <ul>
                <li><a href="/en">
                    en
                </a></li>
                <li><a href="/">
                    ge
                </a></li>
                <li><a href="/ru">
                    ru
                </a></li>
                <?php //foreach ($langs as $lang): ?>
                    <!-- <li><a href="/site/set-locale?locale=<?//=$lang->key?>">
                        <?//= $lang->code; ?>
                    </a></li> -->
                <?php //endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="content">
    <div class="content-header">
        <a href="<?=Url::toRoute($curLangUrl . '/') ?>">
            <svg width="53" height="108"><use xlink:href="/images/icons.svg#logo"></use></svg>
        </a>
        <div class="top-social">
            <a href="<?= $user_info->fb; ?>">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#fb"></use></svg>
            </a>
            <a href="<?= $user_info->youtube; ?>">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#youtube"></use></svg>
            </a>
            <a href="<?= $user_info->instagram; ?>">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#instagram"></use></svg>
            </a>
            <a href="https://telegram.me/<?= $user_info->telegram; ?>">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#telegram"></use></svg>
            </a>
            <a href="https://wa.me/<?= $user_info->whats_app; ?>">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#whatsapp"></use></svg>
            </a>
            <a href="viber://add?number=<?= $user_info->viber; ?>">
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#viber"></use></svg>
            </a>
            <a href="https://t.me/calligraphy_batumi_bot" class="top-social-bot top-social-menu">
                <svg width="16" height="16"><use xlink:href="images/icons.svg#telegram"></use></svg>
                <span>bot</span>
            </a>
        </div>
        <div class="content-empty"></div>
        <div class="content-close">
            <svg width="20" height="20"><use xlink:href="/images/icons.svg#close"></use></svg>
        </div>
    </div>
    <div class="lang lang-menu">
        <div class="lang-choosed">
            <?= $lg->code; ?>
        </div>
        <div class="lang-choose">
            <ul>
                <li><a href="/en">
                    en
                </a></li>
                <li><a href="/">
                    ge
                </a></li>
                <li><a href="/ru">
                    ru
                </a></li>
            </ul>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="content-nav">
            <ul>
                <li><a href="<?=Url::toRoute($curLangUrl . '/') ?>">
                    <?=Yii::t('frontend', 'Главная')?>
                </a></li>
                <li><a href="<?=Url::toRoute($curLangUrl . '/infrastructure') ?>">
                    <?=Yii::t('frontend', 'Инфраструктура')?>
                </a></li>
                <li><a href="<?=Url::toRoute($curLangUrl . '/layouts') ?>">
                    <?=Yii::t('frontend', 'Планировки')?>
                </a></li>
                <li><a href="<?=Url::toRoute($curLangUrl . '/gallery') ?>">
                    <?=Yii::t('frontend', 'Галерея')?>
                </a></li>
                <li><a href="<?=Url::toRoute($curLangUrl . '/about') ?>">
                    <?=Yii::t('frontend', 'О компании')?>
                </a></li>
                <li><a href="<?=Url::toRoute($curLangUrl . '/news') ?>">
                    <?=Yii::t('frontend', 'Новости')?>
                </a></li>
                <li><a href="<?=Url::toRoute($curLangUrl . '/contacts') ?>">
                    <?=Yii::t('frontend', 'Контакты')?>
                </a></li>
            </ul>
        </div>
        <p class="content-footer">official website</p>
    </div>
</div>