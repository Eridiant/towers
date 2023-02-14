<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cali_key".
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $login
 * @property string|null $password
 */
class Key extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_key';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'login', 'password'], 'string'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }
}
