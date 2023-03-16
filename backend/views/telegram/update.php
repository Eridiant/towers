<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\telegram\TelegramContent $model */

$this->title = 'Update: ' . $model->query->query ?? "";
$this->params['breadcrumbs'][] = ['label' => 'Telegram Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telegram-content-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
