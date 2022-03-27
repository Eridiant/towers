<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Scripts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scripts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'header')->textarea(['rows' => 12]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 12]) ?>

    <?= $form->field($model, 'footer')->textarea(['rows' => 12]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
