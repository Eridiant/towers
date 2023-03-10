<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$lg = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $currentLang])->one()->code;
$lg_num = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $currentLang])->one()->id;

?>

<footer class="footer">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="footer-logo">
			<svg width="53" height="108"><use xlink:href="/images/icons.svg#logos"></use></svg>
		</div>
		<div class="footer-wrapper footer-main">
			<div class="footer-social">
				<p>
					<?=Yii::t('frontend', 'Соцсети')?>:
				</p>
				<div class="footer-social-inner">
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
				</div>
			</div>
			<div class="footer-navigate">
				<p>
					<?=Yii::t('frontend', 'Навигация')?>:
				</p>
				<div class="footer-navigate-wrap">
					<div class="footer-navigate-inner">
						<a href="<?=Url::toRoute($curLangUrl . '/about') ?>">
							<?=Yii::t('frontend', 'Галерея')?>
						</a>
						<a href="<?=Url::toRoute($curLangUrl . '/layouts') ?>">
							<?=Yii::t('frontend', 'Планировки')?>
						</a>
					</div>
					<div class="footer-navigate-inner">
						<a href="<?=Url::toRoute($curLangUrl . '/infrastructure') ?>">
							<?=Yii::t('frontend', 'Инфраструктура')?>
						</a>
						<a href="<?=Url::toRoute($curLangUrl . '/gallery') ?>">
							<?=Yii::t('frontend', 'Галерея')?>
						</a>
					</div>
				</div>
                <a href="/presentation/Calligraphy_Towers_Presentation_<?= $lg; ?>.pdf" class="" download>
                    <span><?=Yii::t('frontend', 'Скачать презентацию')?></span>
                    <svg width="14" height="16"><use xlink:href="/images/icons.svg#pdf"></use></svg>
                </a>
			</div>
			<div class="footer-phone">
			<a href="tel:<?= $user_info->phone; ?>" class="top-phone phone"><?= preg_replace("/^(\d{3})(\d{3})(\d{2})(\d{2})(\d{2})$/", "+$1($2)-$3-$4-$5", $user_info->phone); ?></a>
				</br>
				<span><?=Yii::t('frontend', 'г. Батуми ул. Шартава 18')?></span>
			</div>
		</div>
		<div class="footer-wrapper footer-footer">
			<a id="privacy-policy" href="<?= Url::toRoute(Yii::$app->params['curLangUrl'] . '/privacy-policy') ?>"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
			<a href="#">Made by&nbsp;&nbsp;&nbsp;<img src="/images/syndicate.png" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>"></a>
		</div>
	</div>
</footer>

<div class="popup-wrapper stock <?= \frontend\models\Message::find()->where(['src' => 'offer', 'language_id' => $lg_num])->joinWith(['source'])->one()->show ? '' : ' dnn'; ?>">
    <div class="popup popup-stock">
        <div class="popup-bg">
            <picture>
                <source type="image/jpeg" srcset="/images/dist/popup/popup.jpg, /images/dist/popup/popup.jpg 2x">
                <img src="/images/dist/popup/popup.jpg" alt="">
            </picture>
        </div>
        <div class="popup-desc">
            <h2><?=Yii::t('frontend', 'Дорогие клиенты')?>!</h2>
            <p <?= \frontend\models\Message::find()->where(['src' => 'offer', 'language_id' => $lg_num])->joinWith(['source'])->one()->format ? 'style="white-space: pre-line"' : ''; ?>><?= \frontend\models\Message::find()->where(['src' => 'offer', 'language_id' => $lg_num])->joinWith(['source'])->one()->text ?></p>
            <form id="form-stock" action="/" method="post" onsubmit="ym(87522082,'reachGoal','popupdeal')"> 
                <input type="hidden" name="body" value="promotion">
                <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>" title="<?=Yii::t('frontend', 'только буквы')?>" required>
                <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>" pattern="\+?[0-9\s\-\(\)]+" title="<?=Yii::t('frontend', 'только цифры')?>" required>
                <input type="text" name="email" placeholder="<?=Yii::t('frontend', 'Почта')?>" pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})" title="<?=Yii::t('frontend', 'your_mail@mail')?>" required>
                <div class="contacts-wrap">
                    <button class="btn btn-blue"><?=Yii::t('frontend', 'Отправить')?></button>
                    <div class="contacts-check">
                        <label for="contact-check"><?=Yii::t('frontend', 'Я согласен с условиями обработки персональных данных')?></label>
                        <input id="contact-check" class="contact-checkbox" type="checkbox" name="viewed" required checked>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="popup-wrapper form form-popup">
    <div class="popup">
        <div class="contacts-form">
            <h2><?=Yii::t('frontend', 'Поможем в выборе!')?></h2>
            <p>
				<?=Yii::t('frontend', 'Введите ваши данные и мы Вам перезвоним')?>
            </p>
            <form id="form-popup" action="/" method="post" onsubmit="ym(87522082,'reachGoal','popupform')"> 
                <input type="hidden" name="body" value="pop-up">
                <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>" title="<?=Yii::t('frontend', 'только буквы')?>" required>
                <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>" pattern="\+?[0-9\s\-\(\)]+" title="<?=Yii::t('frontend', 'только цифры')?>" required>
                <input type="text" name="email" placeholder="<?=Yii::t('frontend', 'Почта')?>" pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})" title="<?=Yii::t('frontend', 'your_mail@mail')?>" required>
                <div class="contacts-wrap">
                    <button class="btn btn-blue"><?=Yii::t('frontend', 'Отправить')?></button>
                    <div class="contacts-check">
                        <label for="contact-check"><?=Yii::t('frontend', 'Я согласен с условиями обработки персональных данных')?></label>
                        <input id="contact-check" class="contact-checkbox" type="checkbox" name="viewed" required checked>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="popup-wrapper success">
    <div class="popup">
        <div class="popup-check">
            <svg width="21" height="17"><use xlink:href="/images/icons.svg#check"></use></svg>
        </div>
        <div class="popup-desc">
            <h2><?=Yii::t('frontend', 'Спасибо')?></h2>
            <p>
				<?=Yii::t('frontend', 'Ваша заявка отправлена. Наш менеджер по продажам очень скоро свяжется с Вами.')?>
            </p>
        </div>
    </div>
</div>

<div class="popup-wrapper error">
    <div class="popup">
        <div class="popup-error">
            <svg width="21" height="17"><use xlink:href="/images/icons.svg#check"></use></svg>
        </div>
        <div class="popup-desc">
            <h2><?=Yii::t('frontend', 'Ошибка')?></h2>
            <p>
				<?=Yii::t('frontend', 'Ваша заявка не отправлена, попробуйте еще раз или отправьте заявку позднее.')?>
            </p>
        </div>
    </div>
</div>


<div class="popup-wrapper video">
    <div class="popup"></div>
</div>

<div class="cont-wrapper">
    <div class="cont-inner">
        <svg width="24" height="24"><use xlink:href="/images/icons.svg#contact"></use></svg>
    </div>
</div>

<?php if (!YII_ENV_DEV){
    $this->registerJs(
        "var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement('script'),s0=document.getElementsByTagName('script')[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/61a67a909099530957f761a7/1flp4thvt';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();",
        View::POS_END,
    );
} ?>

<?= $scripts->footer; ?>

</body>
</html>

