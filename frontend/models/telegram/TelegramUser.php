<?php

namespace frontend\models\telegram;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%telegram_user}}".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $username
 * @property string|null $lang
 * @property int|null $last_visited_id
 * @property int $status
 * @property int|null $timestamp
 * @property int $created_at
 * @property int|null $updated_at
 *
 * @property TelegramAdmin[] $telegramAdmins
 * @property TelegramChat[] $telegramChats
 * @property TelegramInfo[] $telegramInfos
 * @property TelegramLog[] $telegramLogs
 */
class TelegramUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%telegram_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'last_visited_id', 'status', 'timestamp', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'username'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 24],
            [['id'], 'unique'],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
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
            'first_name' => 'First Name',
            'username' => 'Username',
            'lang' => 'Lang',
            'last_visited_id' => 'Last Visited ID',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TelegramChats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(TelegramChat::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfs()
    {
        return $this->hasMany(TelegramInfo::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(TelegramLog::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramAdmins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(TelegramAdmin::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramAdmins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(TelegramAdmin::class, ['current_user_id' => 'id']);
    }
}