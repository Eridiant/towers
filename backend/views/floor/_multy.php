<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\language\models\Language;

$lang = Language::getCurrent()->code;

/* @var $this yii\web\View */
/* @var $model backend\models\Apartments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floor')->dropDownList(\yii\helpers\ArrayHelper::map($floor, 'floor', 'floor')); ?>

    <div>
        <label for="category">Выберите категорию</label>
        <select name="category">
            <option value="" selected></option>
            <option value="money">Стоимость</option>
            <option value="total_area">Общая площадь</option>
            <option value="living_space">Жилая площадь</option>
            <option value="balcony_area">Балкон</option>
            <option value="<?= $lang; ?>">Вид</option>
            <option value="status">Статус</option>
            <!-- <option value="num">Номер</option> -->
        </select>
    </div>
    <textarea name="field" id="" cols="100%" rows="10"></textarea>
    <div>
        <input type="checkbox" id="int" name="int">
        <label for="int">Число</label>
    </div>
    <div>
        <input type="checkbox" id="float" name="float">
        <label for="float">float</label>
    </div>
    <div>
        <input type="checkbox" id="comma" name="comma">
        <label for="comma">Удалить запятую</label>
    </div>
    <div>
        <input type="checkbox" id="quotes" name="quotes">
        <label for="quotes">Удалить кавычки</label>
    </div>
    <div>
        <input type="checkbox" id="price" name="price">
        <label for="price">Цена</label>
    </div>
    <!-- <input name="field" type="text"> -->

    <?//= $form->field($model, 'floor')->textInput() ?>

    <?//= $form->field($model, 'status')->dropDownList([
    //     0 => 'Активна',
    //     1 => 'Продана',
    //     2 => 'Резерв',
    // ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
