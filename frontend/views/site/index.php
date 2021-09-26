<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div id="modal">
  <div class="modal-contianer">
    <p class="modal-title">
      Нужна консультация?
    </p>
    <p class="modal-subtitle">
      Оставьте Ваш телефон или почту и наш менеджер свяжиться с Вами!
    </p>
    <div role="form" class="">
        <?= $this->render('_form', [
            'model' => $model,           
        ]) ?>
      <!-- <form action="#" method="post" class="form">
        <p>
          <label> Введите Ваше имя
            <br />
            <input type="text" name="name" value="" class="" placeholder="Иван" /> </label>
          <br />
          <label> Введите Ваш телефон
            <br />
            <input type="tel" name="tel" value="" size="40" class="" placeholder="8 (800) 888 88 88" /> </label>
          <br />
          <label> Введите Вашу почту
            <br />
            <input type="email" name="email" value="" class="" placeholder="E-mail" /> </label>
          <br />
          <label>
            <br />
            <span class=""><input type="checkbox" name="" value="1" aria-invalid="false" /></span> Я принимаю условия пользовательского соглашения и даю право на обработку моих персональных данных</label>
        </p>
        <p>
          <input type="submit" value="Заказать звонок" class="" />
        </p>
        <div class="" aria-hidden="true">

        </div>
      </form> -->
    </div>
  </div>
</div>