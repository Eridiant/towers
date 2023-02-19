<?php

namespace backend\models\telegram;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%telegram_log}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $query
 * @property string|null $lang
 * @property string|null $data
 * @property string|null $error
 * @property int $created_at
 *
 * @property TelegramUser $user
 */
class TelegramLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%telegram_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['data', 'error'], 'string'],
            [['query'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 24],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TelegramUser::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                // 'value' => new \yii\db\Expression('NOW()'),
            ],
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
            'query' => 'Query',
            'lang' => 'Lang',
            'data' => 'Data',
            'error' => 'Error',
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
