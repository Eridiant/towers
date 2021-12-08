<?php

use yii\helpers\Html;
use yii\helpers\Url;


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
						<a href="<?=Url::toRoute('/about') ?>">
							<?=Yii::t('frontend', 'Галерея')?>
						</a>
						<a href="<?=Url::toRoute('/layouts') ?>">
							<?=Yii::t('frontend', 'Планировки')?>
						</a>
					</div>
					<div class="footer-navigate-inner">
						<a href="<?=Url::toRoute('/infrastructure') ?>">
							<?=Yii::t('frontend', 'Инфраструктура')?>
						</a>
						<a href="<?=Url::toRoute('/gallery') ?>">
							<?=Yii::t('frontend', 'Галерея')?>
						</a>
					</div>
				</div>
			</div>
			<div class="footer-phone">
			<a href="tel:<?= $user_info->phone; ?>" class="top-phone phone"><?= preg_replace("/^(\d{3})(\d{3})(\d{2})(\d{2})(\d{2})$/", "+$1($2)-$3-$4-$5", $user_info->phone); ?></a>
				</br>
				<span><?=Yii::t('frontend', 'г. Баутми ул. Шартава 18')?></span>
			</div>
		</div>
		<div class="footer-wrapper footer-footer">
			<a class="trsp" href="#"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
			<a href="#">Made by&nbsp;&nbsp;&nbsp;<img src="images/syndicate.png" alt=""></a>
		</div>
	</div>
</footer>



<div class="popup-wrapper success">
    <div class="popup">
        <div class="popup-check">
            <svg width="21" height="17"><use xlink:href="/images/icons.svg#check"></use></svg>
        </div>
        <div class="popup-desc">
            <h2><?=Yii::t('frontend', 'Спасибо')?></h2>
            <p>
				<?=Yii::t('frontend', 'Ваша заявка отправлена, мы перезвоним')?>
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




<!-- Swiper JS -->
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="js/app.min.js"></script> -->
</body>
</html>

