<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%source}}".
 *
 * @property int $id
 * @property string|null $src
 * @property int $show
 * @property int $format
 *
 * @property Message[] $messages
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%source}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src'], 'string'],
            [['show', 'format'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Src',
            'show' => 'Show',
            'format' => 'Format',
        ];
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::class, ['source_id' => 'id']);
    }
}
