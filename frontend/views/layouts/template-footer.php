<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

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
			<a id="privacy-policy" href="javascript:void(0);"><?=Yii::t('frontend', 'Политика конфиденциальности')?></a>
			<a href="#">Made by&nbsp;&nbsp;&nbsp;<img src="/images/syndicate.png" alt="Calligraphy Towers. <?=Yii::t('frontend', 'Недвижимость в Батуми')?>"></a>
		</div>
	</div>
</footer>

<div class="popup-wrapper form form-popup">
    <div class="popup">
        <div class="contacts-form">
            <h2><?=Yii::t('frontend', 'Поможем в выборе!')?></h2>
            <p>
				<?=Yii::t('frontend', 'Введите ваши данные и мы Вам перезвоним')?>
            </p>
            <form id="form-popup" action="/" method="post"> 
                <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>" title="<?=Yii::t('frontend', 'только буквы')?>" required>
                <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>" pattern="\+?[0-9\s\-\(\)]+" title="<?=Yii::t('frontend', 'только цифры')?>" required>
                <input type="text" name="email" placeholder="<?=Yii::t('frontend', 'Почта')?>" pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})" title="<?=Yii::t('frontend', 'your_mail@mail')?>" required>
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


<div class="popup-wrapper privacy-policy">
    <div class="popup">
        <div class="popup-desc">
            <?=Yii::t('frontend', '<h2>Политика конфиденциальности</h2>

<p>Настоящая Политика конфиденциальности персональных данных (далее – Политика конфиденциальности) действует в отношении всей информации, которую данный сайт, на котором размещен текст этой Политики конфиденциальности, может получить о Пользователе, а также любых программ и продуктов, размещенных на нем.</p>

<p> 1. Определение терминов<br>
1. В настоящей Политике конфиденциальности используются следующие термины:<br>
1.1. «Администрация сайта» – уполномоченные сотрудники на управления сайтом, действующие от его имени, которые организуют и (или) осуществляет обработку Персональных данных, а также определяет цели обработки персональных данных, состав Персональных данных, подлежащих обработке, действия (операции), совершаемые с Персональными данными.<br>
1.2. «Персональные данные» - любая информация, относящаяся прямо или косвенно к определенному или определяемому физическому лицу (субъекту Персональных данных).<br>
1.3. «Обработка персональных данных» - любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с Персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение Персональных данных.<br>
1.4. «Конфиденциальность персональных данных» - обязательное для соблюдения Администрацией сайта требование не допускать их умышленного распространения без согласия субъекта Персональных данных или наличия иного законного основания.<br>
1.5. «Пользователь сайта (далее Пользователь)» – лицо, имеющее доступ к сайту, посредством сети Интернет и использующее данный сайт для своих целей.<br>
1.6. «Cookies» — небольшой фрагмент данных, отправленный веб-сервером и хранимый на компьютере Пользователя, который веб-клиент или веб-браузер каждый раз пересылает веб-серверу в HTTP-запросе при попытке открыть страницу соответствующего сайта.<br>
1.7. «IP-адрес» — уникальный сетевой адрес узла в компьютерной сети, построенной по протоколу IP.</p>

<p> 2. Общие положение<br>
2.1. Использование Пользователем сайта означает согласие с настоящей Политикой конфиденциальности и условиями обработки Персональных данных Пользователя.<br>
2.2. В случае несогласия с условиями Политики конфиденциальности Пользователь должен прекратить использование сайта.<br>
2.3. Настоящая Политика конфиденциальности применяется только к данному сайту. Администрация сайта не контролирует и не несет ответственность за сайты третьих лиц, на которые Пользователь может перейти по ссылкам, доступным на данном сайте.<br>
2.4. Администрация сайта не проверяет достоверность Персональных данных, предоставляемых Пользователем сайта.</p>

<p> 3. Предмет политики конфиденциальности<br>
3.1. Настоящая Политика конфиденциальности устанавливает обязательства Администрации сайта по умышленному неразглашению Персональных данных, которые Пользователь предоставляет по разнообразным запросам Администрации сайта (например, при регистрации на сайте, оформлении заказа, подписки на уведомления и т.п).<br>
3.2. Персональные данные, разрешённые к обработке в рамках настоящей Политики конфиденциальности, предоставляются Пользователем путём заполнения специальных форм на сайте и обычно включают в себя следующую информацию:<br>
3.2.1. фамилию, имя, отчество Пользователя;<br>
3.2.2. контактный телефон Пользователя;<br>
3.2.3. адрес электронной почты (e-mail);<br>
3.2.4. место жительство Пользователя и другие данные.<br>
3.3. Администрация сайта также принимает усилия по защите Персональных данных, которые автоматически передаются в процессе посещения страниц сайта:<br>
- IP адрес;<br>
- информация из cookies;<br>
- информация о браузере (или иной программе, которая осуществляет доступ к сайту);<br>
- время доступа;<br>
- посещенные адреса страниц;<br>
- реферер (адрес предыдущей страницы) и т.п.<br>
3.3.1. Отключение cookies может повлечь невозможность доступа к сайту.<br>
3.3.2. Сайт осуществляет сбор статистики об IP-адресах своих посетителей. Данная информация используется с целью выявления и решения технических проблем, для контроля корректности проводимых операций.<br>
3.4. Любая иная персональная информация неоговоренная выше (история просмотров, используемые браузеры и операционные системы и т.д.) не подлежит умышленному разглашению, за исключением случаев, предусмотренных в пунктах 5.2 и 5.3 настоящей Политики конфиденциальности.</p>

<p> 4. Цели сбора персональной информации пользователя<br>
4.1. Персональные данные Пользователя Администрация сайта может использовать в целях:<br>
4.1.1. Идентификации Пользователя, зарегистрированного на сайте, для оформления заказа и (или) заключения договора.<br>
4.1.2. Предоставления Пользователю доступа к персонализированным ресурсам сайта.<br>
4.1.3. Установления с Пользователем обратной связи, включая направление уведомлений, запросов, касающихся использования сайта, оказания услуг, обработка запросов и заявок от Пользователя.<br>
4.1.4. Определения места нахождения Пользователя для обеспечения безопасности, предотвращения мошенничества.<br>
4.1.5. Подтверждения достоверности и полноты Персональных данных, предоставленных Пользователем.<br>
4.1.6. Создания учетной записи для совершения покупок (при наличии такого сервиса), если Пользователь дал согласие на создание учетной записи.<br>
4.1.7. Уведомления Пользователя сайта о состоянии заказа (при наличии такого сервиса).<br>
4.1.8. Предоставления Пользователю эффективной клиентской и технической поддержки при возникновении проблем, связанных с использованием сайта.<br>
4.1.9. Предоставления Пользователю с его согласия, обновлений продукции, специальных предложений, информации о ценах, новостной рассылки и иных сведений от имени сайта или от имени партнеров сайта.<br>
4.1.10. Осуществления рекламной деятельности с согласия Пользователя.<br>
4.1.11. Предоставления доступа Пользователю на сторонние сайты или сервисы партнеров данного сайта с целью получения их предложений, обновлений или услуг.</p>

<p> 5. Способы и сроки обработки персональной информации<br>
5.1. Обработка Персональных данных Пользователя осуществляется без ограничения срока, любым законным способом, в том числе в информационных системах персональных данных с использованием средств автоматизации или без использования таких средств.<br>
5.2. Пользователь соглашается с тем, что Администрация сайта вправе передавать Персональные данные третьим лицам, в частности, курьерским службам, организациями почтовой связи, операторам электросвязи, исключительно в целях выполнения заявок Пользователя, оформленных на сайте, в рамках договора публичной оферты.<br>
5.3. Персональные данные Пользователя могут быть переданы уполномоченным органам государственной власти только по основаниям и в порядке, установленным действующим законодательством Грузии.</p>

<p> 6. Обязательства сторон<br>
6.1. Пользователь обязуется:<br>
6.1.1. Предоставить корректную и правдивую информацию о Персональных данных, необходимую для пользования сайтом.<br>
6.1.2. Обновить или дополнить предоставленную информацию о Персональных данных в случае изменения данной информации.<br>
6.1.3. Принимать меры для защиты доступа к своим конфиденциальным данным, хранящимся на сайте.<br>
6.2. Администрация сайта обязуется:<br>
6.2.1. Использовать полученную информацию исключительно для целей, указанных в статье 4 настоящей Политики конфиденциальности.<br>
6.2.2. Не разглашать Персональных данных Пользователя, за исключением пунктов 5.2 и 5.3 настоящей Политики конфиденциальности.<br>
6.2.3. Осуществить блокирование Персональных данных, относящихся к соответствующему Пользователю, с момента обращения или запроса Пользователя, или его законного представителя либо уполномоченного органа по защите прав субъектов персональных данных на период проверки, в случае выявления недостоверных Персональных данных или неправомерных действий.</p>

<p> 7. Ответственность сторон<br>
7.1. Администрация сайта несёт ответственность за умышленное разглашение Персональных данных Пользователя в соответствии с действующим законодательством Грузии, за исключением случаев, предусмотренных пунктами 5.2, 5.3 и 7.2 настоящей Политики конфиденциальности.<br>
7.2. В случае утраты или разглашения Персональных данных Администрация сайта не несёт ответственность, если данная конфиденциальная информация:<br>
7.2.1. Стала публичным достоянием до её утраты или разглашения.<br>
7.2.2. Была получена от третьей стороны до момента её получения Администрацией сайта.<br>
7.2.3. Была получена третьими лицами путем несанкционированного доступа к файлам сайта.<br>
7.2.4. Была разглашена с согласия Пользователя.<br>
7.3. Пользователь несет ответственность за правомерность, корректность и правдивость предоставленной Персональных данных в соответствии с действующим законодательством Грузии.</p>

<p> 8. Разрешение споров<br>
8.1. До обращения в суд с иском по спорам, возникающим из отношений между Пользователем и Администрацией сайта, обязательным является предъявление претензии (письменного предложения о добровольном урегулировании спора).<br>
8.2. Получатель претензии в течение 30 календарных дней со дня получения претензии, письменно уведомляет заявителя претензии о результатах рассмотрения претензии.<br>
8.3. При не достижении соглашения спор будет передан на рассмотрение в судебный орган в соответствии с действующим законодательством Грузии.<br>
8.4. К настоящей Политике конфиденциальности и отношениям между Пользователем и Администрацией сайта применяется действующее законодательство Грузии.</p>

<p> 9. Дополнительные условия<br>
9.1. Администрация сайта вправе вносить изменения в настоящую Политику конфиденциальности без согласия Пользователя.<br>
9.2. Новая Политика конфиденциальности вступает в силу с момента ее размещения на сайте, если иное не предусмотрено новой редакцией Политики конфиденциальности.<br>
9.3. Все материалы данного сайта в том числе текст, структура, дизайн и расположение блоков защищены авторским правом. Полное или частичное копирование запрещено. Информация предназначена для аудитории 14+.</p>')?>
        </div>
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

