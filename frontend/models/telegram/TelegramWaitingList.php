<?php

namespace frontend\models\telegram;

use Yii;

/**
 * This is the model class for table "{{%telegram_waiting_list}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $admin_id
 * @property int $status
 * @property int $request_time
 * @property int|null $response_time
 *
 * @property TelegramUser $user
 */
class TelegramWaitingList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%telegram_waiting_list}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'request_time'], 'required'],
            [['user_id', 'admin_id', 'status', 'request_time', 'response_time'], 'integer'],
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
            'admin_id' => 'Admin ID',
            'status' => 'Status',
            'request_time' => 'Request Time',
            'response_time' => 'Response Time',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(TelegramUser::class, ['id' => 'admin_id']);
    }
}
