<?php

namespace frontend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_content".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $type
 * @property string|null $type_name
 *
 * @property TelegramImage[] $telegramImages
 * @property TelegramMessage[] $telegramMessages
 * @property TelegramQuery[] $telegramQueries
 * @property TelegramVideo[] $telegramVideos
 */
class TelegramContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_telegram_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'type'], 'integer'],
            [['type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'type' => 'Type',
            'type_name' => 'Type Name',
        ];
    }

    /**
     * Gets query for [[TelegramImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelegramImages()
    {
        return $this->hasMany(TelegramImage::class, ['content_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramMessages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelegramMessages()
    {
        return $this->hasMany(TelegramMessage::class, ['content_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramQueries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelegramQueries()
    {
        return $this->hasMany(TelegramQuery::class, ['content_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramVideos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelegramVideos()
    {
        return $this->hasMany(TelegramVideo::class, ['content_id' => 'id']);
    }
}
