<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartments-index">

    <p>
        <?= Html::a('Create Apartments', ['create', 'block' => $block], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'firstPageLabel' => 'Начало',
            'lastPageLabel' => 'Конец',
        ],
        'columns' => [
            // 'floor_num',
            // 'num',
            [
                'attribute' => 'floor_num',
                'headerOptions' => ['width' => '15%'],
            ],
            [
                'attribute' => 'num',
                'headerOptions' => ['width' => '15%'],
            ],
            // 'money',
            // 'total_area',
            // 'living_space',
            // 'balcony_area',
            [
                'label' => 'Статус',
                'value'=>function ($model) {
                    if($model->status == 0){
                        return 'Активная';
                    }elseif ($model->status == 2) {
                        return 'Продана';
                    }elseif ($model->status == 1) {
                        return 'Резерв';
                    }
                },
            ],
            // 'status',
            // [
            //     'label' => 'status',
            //     'attribute' => 'status',
            //     'filter' => ['0' => 'Активная', '1' => 'Продана', '2' => 'Резерв'],
            //     'filterInputOptions' => ['prompt' => 'All educations', 'class' => 'form-control', 'id' => null]
            // ],
            // {view} apartments/update
            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{update}',
                'buttons' => [
                    // 'view' => function ($url, $data) use ($block) {
                    //     return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['apartments/view', 'id' => $data->id, 'block' => $block]);
                    // },
                    'update' => function ($url, $data) use ($block) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['apartments/update', 'id' => $data->id, 'block' => $block]);
                    },
                    // 'delete' => function ($url, $data) use ($block) {
                    //     return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['apartments/delete', 'id' => $data->id, 'block' => $block]);
                    // }, {delete}{link}
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
