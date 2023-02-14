<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\telegram\TelegramContent $model */

$this->title = 'Create Telegram Content';
$this->params['breadcrumbs'][] = ['label' => 'Telegram Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telegram-content-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
