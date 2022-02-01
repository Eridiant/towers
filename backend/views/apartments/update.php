<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Apartments */

$this->title = 'Редактировать квартиру: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apartments-update">

    <?= $this->render('_form',  compact('model', 'floor')) ?>

</div>
