<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <p>
        <?= Html::a('Create Feedback', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>'lang',
                'label'=>'Локаль',
                'headerOptions' => ['width' => '5%'],
            ],
            [
                'attribute'=>'name',
                'label'=>'Имя',
                'headerOptions' => ['width' => '7%'],
            ],
            'email:email',
            'phone',
            'country',
            [
                'label' => 'Статус',
                'attribute'=>'viewed',
                'format' => 'raw',
                'value'=>function ($model) {
                    if($model->viewed == 0){
                        return '<p style="color:green">Просмотрена</p>';
                    }elseif ($model->viewed == 1) {
                        return '<p style="color:#c55">Новая</p>';
                    }
                },
            ],
            // 'subject',
            // 'body:ntext',
            //'viewed',
            'created_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>


</div>
