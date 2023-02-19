<?php

namespace backend\models\telegram;

use Yii;

/**
 * This is the model class for table "{{%telegram_admin}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $current_user_id
 * @property int $created_at
 *
 * @property TelegramUser $user
 */
class TelegramAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%telegram_admin}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'required'],
            [['user_id', 'current_user_id', 'created_at'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TelegramUser::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'current_user_id' => 'Current User ID',
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
        return $this->hasOne(TelegramUser::class, ['id' => 'user_id']);
    }
}
