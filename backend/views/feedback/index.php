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

    <h1><?= Html::encode($this->title) ?></h1>

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
                'value'=>function ($model) {
                    if($model->viewed == 0){
                        return 'Просмотрена';
                    }elseif ($model->viewed == 1) {
                        return 'Новая';
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
