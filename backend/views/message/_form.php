<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language_id')->hiddenInput(['value'=> Yii::$app->request->get('language_id')])->label(false) ?>

    <?= $form->field($model, 'source_id')->hiddenInput(['value'=> Yii::$app->request->get('source_id')])->label(false) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'show')->checkbox()->label('') ?> 

    <?= $form->field($model, 'format')->checkbox()->label('') ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
