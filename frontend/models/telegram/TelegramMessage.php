<?php

namespace frontend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_message".
 *
 * @property int $id
 * @property int $content_id
 * @property string $lang
 * @property string|null $text
 * @property string|null $parse_mode
 * @property string|null $reply_markup
 * @property string|null $pre_markup
 *
 * @property TelegramContent $content
 */
class TelegramMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_telegram_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'lang'], 'required'],
            [['content_id'], 'integer'],
            [['text', 'reply_markup', 'pre_markup'], 'string'],
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
            'text' => 'Text',
            'parse_mode' => 'Parse Mode',
            'reply_markup' => 'Reply Markup',
            'pre_markup' => 'Pre Markup',
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
