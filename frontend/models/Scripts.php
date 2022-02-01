<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%scripts}}".
 *
 * @property int $id
 * @property string|null $header
 * @property string|null $body
 * @property string|null $footer
 */
class Scripts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%scripts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['header', 'body', 'footer'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Header',
            'body' => 'Body',
            'footer' => 'Footer',
        ];
    }
}
