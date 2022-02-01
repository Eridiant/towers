<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Floor */

$this->title = "Этаж блока-{$block}";
$this->params['breadcrumbs'][] = ['label' => 'Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-create">

    <?= $this->render('_form', compact('model', 'block')) ?>

</div>
