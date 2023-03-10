<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\language\models\Language;
use mihaildev\ckeditor\CKEditor;
// use mihaildev\ckeditor\CKEditor;

$lang = Language::getCurrent()->code;


/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, "title_{$lang}")->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, $lang)->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <?php if (!is_null($model->image)): ?>
        <?= Html::img("../../../frontend/web/uploads/{$model->image}", ['alt' => $model->title_ru, 'style' => 'width: 10%'])?>
    <?php endif; ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'active')->checkbox(['checked'=>true])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
