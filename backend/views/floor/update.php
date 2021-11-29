<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Floor */

$this->title = 'Update Floor: ' . $model->floor;
$this->params['breadcrumbs'][] = ['label' => 'Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->floor, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="floor-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
