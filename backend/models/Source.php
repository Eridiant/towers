<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%source}}".
 *
 * @property int $id
 * @property string|null $src
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
