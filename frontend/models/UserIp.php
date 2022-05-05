<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_ip}}".
 *
 * @property int $id
 * @property int $ip
 * @property string|null $code
 * @property string|null $preferred_lang
 * @property string|null $preferred_lang_all
 * @property string|null $country
 * @property string|null $region
 * @property string|null $city
 * @property int|null $checked
 * @property int $created_at
 */
class UserIp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_ip}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip'], 'required'],
            [['ip', 'checked', 'created_at'], 'integer'],
            [['code'], 'string', 'max' => 10],
            [['preferred_lang', 'region'], 'string', 'max' => 128],
            [['preferred_lang_all'], 'string', 'max' => 1000],
            [['country', 'city'], 'string', 'max' => 64],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    // \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // 'value' => new \yii\db\Expression('NOW()'),
                'value' => function() { return date('U'); },
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
            'ip' => 'Ip',
            'code' => 'Code',
            'preferred_lang' => 'Preferred Lang',
            'preferred_lang_all' => 'Preferred Lang All',
            'country' => 'Country',
            'region' => 'Region',
            'city' => 'City',
            'checked' => 'Checked',
            'created_at' => 'Created At',
        ];
    }
}
