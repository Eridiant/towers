

<form id="form" method="post" onsubmit="ym(87522082,'reachGoal','forma')">
    <div class="contact-wrap">
        <input type="hidden" name="_csrf-frontend" value="<?= Yii::$app->request->csrfToken; ?>">
        <input type="text" name="name" placeholder="<?=Yii::t('frontend', 'Имя')?>" title="<?=Yii::t('frontend', 'только буквы')?>" required>
        <input type="text" name="email" placeholder="<?=Yii::t('frontend', 'Почта')?>" pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})" title="<?=Yii::t('frontend', 'your_mail@mail')?>" required>
        <input type="text" name="phone" placeholder="<?=Yii::t('frontend', 'Телефон')?>" pattern="\+?[0-9\s\-\(\)]+" title="<?=Yii::t('frontend', 'только цифры')?>" required>
        <input type="text" name="country" placeholder="<?=Yii::t('frontend', 'Страна')?>">
    </div>
    <div class="contact-wrap">
        <div class="contact-inner">
            <label for="contact-check"><?=Yii::t('frontend', 'Я согласен с условиями обработки персональных данных')?></label>
            <input id="contact-check" class="contact-checkbox" type="checkbox" name="viewed" required checked>
        </div>
        <button class="btn btn-white"><?=Yii::t('frontend', 'Отправить')?></button>
    </div>
</form>