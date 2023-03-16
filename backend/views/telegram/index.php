<?php

use backend\models\telegram\TelegramContent;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Telegram Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .limit {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        word-break: break-word;
    }
</style>
<div class="telegram-content-index">

    <!-- <p>
        <?//= Html::a('Create Telegram Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            // 'parent_id',
            [
                'label' => 'Родитель',
                // 'attribute' => 'category_id',
                // 'filter' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'parent.query.query',
                'contentOptions' => ['class' => 'limit', 'style' => 'max-width: 70px;'],
            ],
            // 'type',
            // 'type_name',
            [
                'attribute' => 'type_name',
                'contentOptions' => ['class' => 'limit', 'style' => 'max-width: 20px;'],
            ],
            [
                'label' => 'Запрос',
                'value' => 'query.query',
                'contentOptions' => ['class' => 'limit', 'style' => 'max-width: 50px;'],
            ],
            [
                'label' => 'Contant',
                'format' => 'raw',
                'value' => function($model) {
                    $text = '';
                    if ($model->type_name === "message") {
                        foreach ($model->messages as $value) {
                            $text .= "<div class='limit'>{$value->text}</div>";
                        }
                    }

                    if ($model->type_name === "image" || $model->type_name === "video" || $model->type_name === "animation") {
                        foreach ($model->images as $value) {
                            $text .= "<div class='limit'>{$value->caption}</div>";
                        }
                    }
                    return $text;

                },
                'contentOptions' => ['class' => 'limit', 'style' => 'max-width: 100px;'],
            ],
            // 'photo:ntext',
            [
                'attribute' => 'photo',
                'contentOptions' => ['class' => 'limit', 'style' => 'max-width: 150px;'],
            ],
            //'video:ntext',
            [
                'label' => 'Язык',
                'format' => 'raw',
                'value' => function($model){
                    return "<span>" . Html::a('ru', ['/telegram/update', 'id' => $model->id, 'lang' => 'ru']) . ", " . Html::a('en', ['/telegram/update', 'id' => $model->id, 'lang' => 'en']) . ", " . Html::a('ge', ['/telegram/update', 'id' => $model->id, 'lang' => 'ge']) . "</span>";
                },
                'contentOptions' => ['style' => 'width: 30px;'],
            ],
        ],
    ]); ?>


</div>
