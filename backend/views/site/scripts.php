<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Scripts */

$this->title = 'Add scripts';
$this->params['breadcrumbs'][] = ['label' => 'Scripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scripts-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
