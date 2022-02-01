<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slug',
            [
                'attribute' => 'ru',
                'contentOptions' => ['style' => 'overflow: hidden; text-overflow: ellipsis; max-height: 150px;'],
                'headerOptions' => ['style' => 'width: 18%;'],
                'value' => function($model){
                    return $model->title_ru;
                },
            ],
            [
                'attribute' => 'en',
                'contentOptions' => ['style' => 'overflow: hidden; text-overflow: ellipsis; max-height: 150px;'],
                'headerOptions' => ['style' => 'width: 18%;'],
                'value' => function($model){
                    return $model->title_en;
                },
            ],
            [
                'attribute' => 'ge',
                'contentOptions' => ['style' => 'overflow: hidden; text-overflow: ellipsis; max-height: 150px;'],
                'headerOptions' => ['style' => 'width: 18%;'],
                'value' => function($model){
                    return $model->title_ge;
                },
            ],
            [
                'attribute' => 'he',
                'contentOptions' => ['style' => 'overflow: hidden; text-overflow: ellipsis; max-height: 150px;'],
                'headerOptions' => ['style' => 'width: 18%;'],
                'value' => function($model){
                    return $model->title_he;
                },
            ],
            [
                'attribute' => 'active',
                'value'=>function ($model) {
                    if($model->active == 0){
                        return 'Скрыта';
                    }elseif ($model->active == 1) {
                        return 'Активна';
                    }
                },
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
