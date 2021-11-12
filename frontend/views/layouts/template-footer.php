<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>

<footer class="footer">
	<div class="container" style="max-width: 1600px; margin-left: auto; margin-right: auto">
		<div class="footer-logo">
			<svg width="53" height="108"><use xlink:href="/images/icons.svg#logos"></use></svg>
		</div>
		<div class="footer-wrapper">
			<div class="footer-social">
				<p>
					<?=Yii::t('frontend', 'Соцсети')?>:
				</p>
				<div class="footer-social-inner">
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
				<a href="tel:+70988900043" class="top-phone phone">+7 (098) 890-00-43</a>
				</br>
				<span>г. Москва, ул. Пражская 88/23</span>
			</div>
		</div>
		<a href="#"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
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






<!-- Swiper JS -->
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="js/app.min.js"></script> -->
</body>
</html>

