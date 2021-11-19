<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cali_userinfo".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $fb
 * @property string|null $phone
 * @property string|null $youtube
 * @property string|null $instagram
 * @property string|null $whats_app
 * @property string|null $viber
 *
 * @property User $user
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_userinfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['fb', 'phone', 'youtube', 'instagram', 'whats_app', 'viber'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'phone' => 'Телефон',
            'fb' => 'Facebook',
            'youtube' => 'Youtube',
            'instagram' => 'Instagram',
            'whats_app' => 'WhatsApp',
            'viber' => 'Viber',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
