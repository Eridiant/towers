<?php

namespace backend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_user".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $username
 * @property string|null $lang
 * @property int|null $last_visited_id
 * @property int $created_at
 * @property int|null $updated_at
 */
class TelegramUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_telegram_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at'], 'required'],
            [['id', 'last_visited_id', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'username'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 24],
            [['id'], 'unique'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
