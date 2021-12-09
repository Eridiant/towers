<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Блок-{$block}";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floor-index">

    <p>
        <?= Html::a('Create Floor', ['create', 'block' => $block], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'floor',

            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'header'=>'Действия', 
            //     'headerOptions' => ['width' => '80'],
            //     'template' => '{update} {delete}{link}',
            //     'buttons' => [
            //         'update' => function ($url, $data) use ($block) {
            //             return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['floor/update', 'id' => $data->id, 'block' => $block]);
            //         },
            //         'delete' => function ($url, $data) use ($block) {
            //             return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['floor/delete', 'id' => $data->id, 'block' => $block]);
            //         },
            //     ],
            // ],
        ],
    ]); ?>


</div>
