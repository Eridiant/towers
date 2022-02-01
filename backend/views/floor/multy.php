<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Floor */

$this->title = "Заполнение блока-{$block}";
$this->params['breadcrumbs'][] = ['label' => 'Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-create">

    <?= $this->render('_multy', compact('model', 'block', 'floor')) ?>

</div>
