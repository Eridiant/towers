<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Calligraphy';

?>
<div class="site-index">
    <?= $user->email; ?>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($info, 'phone') ?>
        <?= $form->field($info, 'fb') ?>
        <?= $form->field($info, 'youtube') ?>
        <?= $form->field($info, 'instagram') ?>
        <?= $form->field($info, 'telegram') ?>
        <?= $form->field($info, 'whats_app') ?>
        <?= $form->field($info, 'viber') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
