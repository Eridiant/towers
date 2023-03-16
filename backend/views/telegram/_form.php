<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\telegram\TelegramContent $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div id="telegram" class="telegram-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->hiddenInput()->label(false) ?>

    <!-- <?//= $form->field($model, 'type')->textInput() ?> -->

    <!-- <?//= $form->field($model, 'type_name')->textInput(['maxlength' => true]) ?> -->
    <?php if (Yii::$app->request->userIP == "127.0.0.1" || Yii::$app->request->userIP == "185.28.110.61"): ?>
    <?= $form->field($model, 'type_name')->dropDownList([
            'message'=>'message',
            'image'=>'image',
            'video'=>'video',
            'animation'=>'animation',
            'document'=>'document',
            'location'=>'location',
            'group'=>'group'
    ]) ?>

    <?= $form->field($model, 'photo')->textInput(['class' => 'form-control tg-img']) ?>

    <?= $form->field($model, 'video')->textInput() ?>
    <?php endif; ?>

    <?php if (Yii::$app->request->userIP == "127.0.0.1" || Yii::$app->request->userIP == "185.28.110.61"): ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 10])  ?>

    <?= $form->field($model, 'caption')->textarea(['rows' => 10])  ?>
    <a href="#" class="btn">выделить</a>
    <?php elseif ($model->type_name == "message"): ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 10])  ?>
    <?php else: ?>
    <?= $form->field($model, 'caption')->textarea(['rows' => 10])  ?>
    <a href="#" class="btn">выделить</a>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div><?= Url::to(['@frontend/site/index'], true); ?></div>

    
    <div class="telegram-img" data-site="<?= Url::to(['/site/index'], true); ?>"></div>
</div>
