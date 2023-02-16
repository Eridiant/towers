<?php

namespace frontend\models\telegram;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%telegram_info}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $mail
 * @property int $num_attempts
 * @property int $created_at
 *
 * @property User $user
 */
class TelegramInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%telegram_info}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'num_attempts', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['mail'], 'string', 'max' => 320],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'mail' => 'Mail',
            'num_attempts' => 'Num Attempts',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[TelegramUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(TelegramUser::class, ['id' => 'user_id']);
    }
}
