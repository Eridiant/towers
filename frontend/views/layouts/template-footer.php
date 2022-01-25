<?php

use yii\helpers\Html;
use yii\helpers\Url;

$lg = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $currentLang])->one()->code;

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
			<a class="trsp" href="#"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
			<a href="#">Made by&nbsp;&nbsp;&nbsp;<img src="/images/syndicate.png" alt=""></a>
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61a67a909099530957f761a7/1flp4thvt';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCabbDzORGtAU9PwXxSc4YG0fSM7YyVEPw&region=EN&language=en"></script>

<!-- Event snippet for Page view conversion page -->
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=TUbc_Q_HLVnE8Xk9cq7z3KbuyT22FI_HKnyw2SxK0a4ScRIEwMrCcy4t6e4DvhJ6YpyPE2I37vb_t1BYK2rWE5JMTpu1B7IDwUmRK-fSx-Wk3SqQnVViE_l4SE7YjlkIqwMrqAH9dPXg21Le-j6yRewp0UbbbVrJ1Q9Cze-hcxUfSeev4C4hRhHzCIOa7cTXJsyL1EKIAaK5DiduZrAtEUOcE58-VqLzGubyu_RawYfApsxw1BK5Wu1VloOcvFQtBdwaq0F7Weet7UMjeSmaSYw_59rI0jP10AcGcGXAhZRxDE6bus2FMmwHkskdLhWL9rnC9gLazODRLNwwF_XFfXj2moLP6qPJ6M4iiOdkWQ-xYSE5O2aW-BRfkn3BQ9_97WghugSBPUAl8tpkUTuax3z6r0pfdyZU-UjyyEPmU4XevtTcQZG63Px5yD_-8k4Qr7phZk8n0Sl9HAeHYG5mIvMz9uqBltbh-9OD1yVqf_o1G03Wbq9xGyj3QkRO6UWJqv-guYKY8C3AxOirrPdDIgEi6v-GH4zoUDeTBf3K4chySiQ7zpYOHZ4jN_g3P51NGCTXGbE3AbeTkqvlW2tg41pTLUL-b7KbaU20diXx9n9yx7jitkXacrWOv9PIvDiTB7zKVHzCxsUoGhP_PUFmpnN9dISR4xRwqwX5vTirfA1r1aLFmH0YZFirMs-GF0LuVuaDUaWdNZGjwslAf3B-tM6RccQUaSbzhgehjj9eaZX_Nqfr2R6Ge72tRvFCb5-n" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly93ZWJhdHRhY2gubWFpbC55YW5kZXgubmV0L21lc3NhZ2VfcGFydF9yZWFsL0V2ZW50JTIwc25pcHBldCUyMC0lMjBQYWdlJTIwdmlldy50eHQ_bmFtZT1FdmVudCUyMHNuaXBwZXQlMjAtJTIwUGFnZSUyMHZpZXcudHh0JnNpZD1ZV1Z6WDNOcFpEcDdJbUZsYzB0bGVVbGtJam9pTVRjNElpd2lhRzFoWTB0bGVVbGtJam9pTVRjNElpd2lhWFpDWVhObE5qUWlPaUp4ZUZab1JGbFZTMXBLZDBSNU16a3JlVk5DTmt0M1BUMGlMQ0p6YVdSQ1lYTmxOalFpT2lKMk1HUnRkWGx5V1VaSFoxUkhLMHhXZEVGYWNFZHVRalJ0TmpaSWJHTktZMDgyT0daaU5sVk1OMGhVYkdOVWJqaGtTRzlIWlU0cmNuQlFZWEI0UlhoWGNsWTBaMGt5YlVnM01ERkdMMk5zZFdoRWJtZGpPQzl2VjFScmVreHVNV2xMTm5NNGFqSnBNR1J6ZUdsNlZVeDZWRGQ2YmlzclpIbEVUbTh3U1ZBNVRtOXNPRlJQUjFoNGQyMHpOM2RtUVV0RWRTOVRiR2M5UFNJc0ltaHRZV05DWVhObE5qUWlPaUp2YkVkSlpXOHlRMGxoVlhsdGFURldabGg1TmtKb1dsQm5lR2hVU1ZGa1JHeFFRM1UxY2xKRllrVlJQU0o5"/><script>
  gtag('event', 'conversion', {'send_to': 'AW-307879312/8pVBCO7ohZMDEJC755IB'});
</script>

<!-- Event snippet for Submit lead form conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=4mT_iHPFcvz9Cemg0U85QW9IF7IU4qsMPvx7Zc2oxKwd0NKRirEisAXMYpwsdHXJxX6NrLUboGvAtxQSIq58YS5WazBgcCkC3GTEN0gAmXV1YJ1ZgE2a0ol66ETEGhAswCv7XGYcKfKsNfsOmnJfGUmR1oysfJV5D25027E7s7T1XCmoVnu9CnzAxLpFeJYn3yMEzzrWMTBo4Npv-lsBPAxPnw-BPlc27-9MRE_k4vQTSL8naQhDfGF4DBr0d_CTA0MMRB47KGDMQzjY6zhvlgy_xyWLyalZrQPq9jOAbDCI7A7g460HAaIdsJctbw6TM2QeP5kxcyp1YdvGq6J8pZC4peseHpN5OHmOJAodWeNDLWwR-Vi7kGLe4TgL1Jp7DdH-Aj7dF7moPiN2SCeWj5rrnRnCY_XRYJ_bzHbJCWXUCJScbY0NcDvPndjwcrWsN9JBO2gxsZ17fd03lPUbNPzWrJQuBXrvM-NyG_czWpda9ECVsIdWsQEwuXigxouimrB6FZx1kQoyfnuQxuxp1azLWWZPt26wYiFT-nbifF_yI3ZheAvNbfOXMVdwwI53A9I4o0FegQjRrfRjJZLCpw9c2OCnlZzrneVozcPZiKI0a2HLBVHynFiGzFq5jVT3DeY7_cmjZdVhGUUhPIhGqqNPZVK-TyH3ItWRKkuG4_U48JTwRqTXn2TlqnzePddyqmAtQmlaxRQAjqMK52BQlBOjHLYAmW10U8rYyO6i5oIsZ9ie3PzHPlwWovZ8Ngqi6h1vfQ9f3T10oe_lajhhqw" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly93ZWJhdHRhY2gubWFpbC55YW5kZXgubmV0L21lc3NhZ2VfcGFydF9yZWFsL0V2ZW50JTIwc25pcHBldCUyMC0lMjBTdWJtaXQlMjBsZWFkJTIwZm9ybS50eHQ_bmFtZT1FdmVudCUyMHNuaXBwZXQlMjAtJTIwU3VibWl0JTIwbGVhZCUyMGZvcm0udHh0JnNpZD1ZV1Z6WDNOcFpEcDdJbUZsYzB0bGVVbGtJam9pTVRjNElpd2lhRzFoWTB0bGVVbGtJam9pTVRjNElpd2lhWFpDWVhObE5qUWlPaUl3Y1dSNmFVaDBTamNyUTBwWVpFNXhPVGd2ZWtOblBUMGlMQ0p6YVdSQ1lYTmxOalFpT2lKMFUzbDNaMEZJTVhKVWFFOTBNRVZNVkc1SVpVRnNiVVpNTmtaTGQyNHpibEF3TWtSVlF6a3lTbXRTYlRJd1ZIVm9ZbVJSYVRWdU5FMWFUSE52T1daUFVtUXlhemhtWVZGclptdEVWbmQ2U0ZoTU5WTkthalJzYTNSellsSlhkbkp0YkV4bVZHNWxaM2hHVm5aVU9WcEljSGRGT0VSTU1FeHRhREV5UTBKdFJ6TnFWR2wzV0dWVFJYQlZORzVRZUdvNVEzVnpXRkU5UFNJc0ltaHRZV05DWVhObE5qUWlPaUpMTVV4dVRtTlZNMDByVjNOTWRuTjJSalI2ZGtOeWJsbFZURTFtUzBzcmNrbFBjRk5ZUW1welVITTBQU0o5"/><script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-307879312/6s-kCOa1__ICEJC755IB',
      'event_callback': callback
  });
  return false;
}
</script>
<!-- Swiper JS -->
<!-- Global site tag (gtag.js) - Google Ads: 307879312 -->
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=psKiCSyAJRRyMfpfph_knyKpDjWU61SszNIFomAvNwX64hpK_5PoNpRBQFyF01ZlyeMTVytr1xmk5ol7n2zvay0PSvDTLiYajOLZWlktzt6W8tOK_d7o7I9jzlLsiWiZwHytT_fEjx9_PXwfPfHVvhpHbcxzV4642ofkv3AVL2sOm7j1M-ySemyHFQPad4vDcc89gepO-10sH9nEdGbF6aI1mboOZZ-Z-ARQ-H7VUIXIaGpe8_Zk9N8ucHVuqXhePutyaUcIrWvhnUo3wIqF1g4n-KtEiope4ASDe9j5_jKJILJiAY6WRhKon_jZ49BD4KH5pvkjUn_JxfjdMKQgEQ1k1F2a4S9YUOdj4jHILJgItK9hXTAjdzMn9YA54Phh0JCxZ2YoBl7uGpUoKv-Od_7yh4PwZvtl9Ec4uQC70p5yd5BIpIpKNpH9Ve0xMluok-ry7Xqm2vLctY-r4JDMksY2XviiYbr9qDyZsAEIrwKleMZ20wHMERWPXlQ_aQEGQk5rlQwggGOAB4RnVFFCD-zxef42tduin_q76yxyX8ZxSwFtNCJGvju2ETh3d0y9yppSKUSofWeEc9A0BSP4E5sBZ7GQPaVlreWvpveCnmhhxDnK0QhxmZAGmd7NmNXhgn56fAvveL-S1vpgES4okiCUMM1aK2hhT14jtR0ZcSRXUbB7Wisp_aKj67Tmm2XWL5RIWnboIeuZow8dODyDAw" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly93ZWJhdHRhY2gubWFpbC55YW5kZXgubmV0L21lc3NhZ2VfcGFydF9yZWFsL0dsb2JhbCUyMHNpdGUlMjB0YWcudHh0P25hbWU9R2xvYmFsJTIwc2l0ZSUyMHRhZy50eHQmc2lkPVlXVnpYM05wWkRwN0ltRmxjMHRsZVVsa0lqb2lNVGM0SWl3aWFHMWhZMHRsZVVsa0lqb2lNVGM0SWl3aWFYWkNZWE5sTmpRaU9pSldTRGh0U20xaFVGQm9OSHAxTUcxb1N6aHJSVUozUFQwaUxDSnphV1JDWVhObE5qUWlPaUl4U2xWNkwzTm5Rak54Y0M4M1dtdEVNMUJNWlZCd2VEZHNZMFZMUVRsR09FbEpiMHhhVlRCcmMzQk9NVzEyZFRKSWVTOHZjSGg0TW1WRVZGRlBNVTlaTkZKNVF6WXhPV3R4YkZOa1FXUkliWFJNUlhWdWFubHVjRlpPVVdWaFNsZzVXV0kyZUhGNGRGazBkaTlKTmxSS1prNUpjMFZMVjNJM00wMUhTMGRKWjFkSk1qUm5Relo1VlZKNWVGZEJZalZJYjBWNVMzYzlQU0lzSW1odFlXTkNZWE5sTmpRaU9pSlhWVlp0VFUxWVFUQkxlVEZIUml0elNtcGlNak5oZG00eFRrVkdjbm93VmtORldVbG5VVGxXUjFOTlBTSjk"/><script async src="https://www.googletagmanager.com/gtag/js?id=AW-307879312"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-307879312');
</script>
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="js/app.min.js"></script> -->
</body>
</html>

