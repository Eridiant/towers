<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\telegram\TelegramContent;

/** @var yii\web\View $this */
/** @var backend\models\telegram\TelegramContent $model */
/** @var yii\widgets\ActiveForm $form */

$childs = TelegramContent::find()->where(["parent_id" => $model->id])->with('query')->all();

?>

<div class="navigation">
    <div>
        <?= isset($model->parent->query->query) ? Html::a($model->parent->query->query, ['/telegram/update', 'id' => $model->parent->id, 'lang' => 'ru']) : ""; ?>
    </div>
    <div> > </div>
    <div><?= $model->query->query ?? ""; ?></div>
    <div> > </div>
    <div class="childs">
        <?php foreach ($childs as $child): ?>
            <div><?= Html::a($child->query->query, ['/telegram/update', 'id' => $child->id, 'lang' => 'ru']); ?></div>
        <?php endforeach; ?>
    </div>
</div>




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

    <?php if (false && (Yii::$app->request->userIP == "127.0.0.1" || Yii::$app->request->userIP == "185.28.110.61")): ?>
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
