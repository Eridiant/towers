

<form id="form" action="/" method="post">
    <div class="contact-wrap">
        <input type="hidden" name="_csrf-frontend" value="<?= Yii::$app->request->csrfToken; ?>">
        <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>" required>
        <input type="text" name="email" placeholder="<?=Yii::t('frontend', 'Почта')?>" required>
        <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>">
        <input type="text" name="country" placeholder="<?=Yii::t('frontend', 'Страна')?>">
    </div>
    <div class="contact-wrap">
        <div class="contact-inner">
            <label for="contact-check"><?=Yii::t('frontend', 'Я согласен с условиями обработки персональных данных')?></label>
            <input id="contact-check" class="contact-checkbox" type="checkbox" name="viewed">
        </div>
        <button class="btn btn-white"><?=Yii::t('frontend', 'Отправить')?></button>
    </div>
</form>