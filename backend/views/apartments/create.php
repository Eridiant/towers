<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Apartments */

$this->title = 'Create Apartments';
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-create">

    <?= $this->render('_form', compact('model', 'floor')) ?>

</div>
