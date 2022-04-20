<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\language\models\Language;

/* @var $this yii\web\View */
/* @var $model backend\models\Apartments */
/* @var $form yii\widgets\ActiveForm */

$lang = Language::getCurrent()->code;

?>

<div class="apartments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floor_num')->dropDownList(\yii\helpers\ArrayHelper::map($floor, 'floor', 'floor')); ?>

    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_area')->textInput() ?>

    <?= $form->field($model, 'living_space')->textInput() ?>

    <?= $form->field($model, 'balcony_area')->textInput() ?>

    <?= $form->field($model, $lang)->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        0 => 'Активна',
        1 => 'Резерв',
        2 => 'Продана',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
