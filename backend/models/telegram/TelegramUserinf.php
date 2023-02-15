<?php

namespace backend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_userinf".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $text
 * @property int $created_at
 *
 * @property User $user
 */
class TelegramUserinf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_telegram_userinf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['text'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
