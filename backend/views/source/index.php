<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Source', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'src:ntext',
            [
                'label' => 'RU',
                'format' => 'raw',
                'value' => function($model){
                    if (\backend\models\Message::find()->where(['source_id' => $model->id, 'language_id' => 3])->exists()) {
                        return Html::a('ru', ['/message/update', 'id' => \backend\models\Message::find()->where(['source_id' => $model->id, 'language_id' => 3])->one()->id], ['class' => 'limit']);
                    }
                    return Html::a('ru', ['/message/create', 'language_id' => 3, 'source_id' => $model->id], ['class' => 'profile-link']);
                },
            ],
            [
                'label' => 'EN',
                'format' => 'raw',
                'value' => function($model){
                    if (\backend\models\Message::find()->where(['source_id' => $model->id, 'language_id' => 1])->exists()) {
                        return Html::a('en', ['/message/update', 'id' => \backend\models\Message::find()->where(['source_id' => $model->id, 'language_id' => 1])->one()->id], ['class' => 'limit']);
                    }
                    return Html::a('en', ['/message/create', 'language_id' => 1, 'source_id' => $model->id], ['class' => 'profile-link']);
                },
            ],
            [
                'label' => 'GE',
                'format' => 'raw',
                'value' => function($model){
                    if (\backend\models\Message::find()->where(['source_id' => $model->id, 'language_id' => 2])->exists()) {
                        return Html::a('ge', ['/message/update', 'id' => \backend\models\Message::find()->where(['source_id' => $model->id, 'language_id' => 2])->one()->id], ['class' => 'limit']);
                    }
                    return Html::a('ge', ['/message/create', 'language_id' => 2, 'source_id' => $model->id], ['class' => 'profile-link']);
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
