<?php

namespace backend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_query".
 *
 * @property int $id
 * @property int $content_id
 * @property string $lang
 * @property string $query
 *
 * @property TelegramContent $content
 */
class TelegramQuery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_telegram_query';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'lang', 'query'], 'required'],
            [['content_id'], 'integer'],
            [['lang', 'query'], 'string', 'max' => 255],
            [['content_id'], 'exist', 'skipOnError' => true, 'targetClass' => TelegramContent::class, 'targetAttribute' => ['content_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_id' => 'Content ID',
            'lang' => 'Lang',
            'query' => 'Query',
        ];
    }

    /**
     * Gets query for [[Content]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(TelegramContent::class, ['id' => 'content_id']);
    }
}
