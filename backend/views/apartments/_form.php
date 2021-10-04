<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Apartments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floor_num')->dropDownList(\yii\helpers\ArrayHelper::map($floor, 'floor', 'floor')); ?>

    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        0 => 'Активна',
        1 => 'Продана',
        2 => 'Резерв',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
