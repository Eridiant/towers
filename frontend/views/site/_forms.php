<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'action' => ['site/index'],
    'options' => [
        'class' => 'form',
        'id' => 'form'
    ]
]); 
?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => "Имя"])->label(false) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => "Телефон"])->label(false) ?>

    <div class="contact-wrap">
        <div class="contact-inner">
            <?= $form->field($model, 'viewed')->checkbox(['label' => 'Я согласен с условиями обработки персональных данных']) ?>
            <!-- <label for="contact-check"></label>
            <input id="contact-check" class="contact-checkbox" type="checkbox"> -->
        </div>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-white']) ?>
    </div>

<?php ActiveForm::end(); ?>

