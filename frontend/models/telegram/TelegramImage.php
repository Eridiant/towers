<?php

namespace frontend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_image".
 *
 * @property int $id
 * @property int $content_id
 * @property string $lang
 * @property string|null $photo
 * @property string|null $caption
 * @property string|null $parse_mode
 * @property string|null $reply_markup
 *
 * @property TelegramContent $content
 */
class TelegramImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_telegram_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'lang'], 'required'],
            [['content_id'], 'integer'],
            [['photo', 'caption', 'reply_markup'], 'string'],
            [['lang'], 'string', 'max' => 255],
            [['parse_mode'], 'string', 'max' => 24],
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
            'photo' => 'Photo',
            'caption' => 'Caption',
            'parse_mode' => 'Parse Mode',
            'reply_markup' => 'Reply Markup',
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
