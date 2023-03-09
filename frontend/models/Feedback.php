<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $country
 * @property string|null $subject
 * @property string|null $lang
 * @property string|null $body
 * @property int|null $viewed
 * @property string $created_at
 * @property int|null $sending_status
 */
class Feedback extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    public $createdAtAttribute = 'created_at';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['body'], 'string'],
            [['created_at'], 'safe'],
            [['viewed', 'sending_status'], 'integer'],
            // ['viewed', 'compare', 'compareValue' => 1, 'operator' => '===', 'type' => 'number', 'message'=>'Необходимо принять условия пользовательского соглашения'],
            [['name', 'subject', 'country'], 'string', 'max' => 255],
            [['email', 'phone', 'lang'], 'string', 'max' => 32],
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
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'name' => Yii::t('frontend', 'Имя'),
            'email' => Yii::t('frontend', 'Email'),
            'phone' => Yii::t('frontend', 'Телефон'),
            'subject' => Yii::t('frontend', 'Subject'),
            'lang' => Yii::t('frontend', 'Язык'),
            'body' => Yii::t('frontend', 'Body'),
            'viewed' => Yii::t('frontend', 'Viewed'),
            'created_at' => Yii::t('frontend', 'Date'),
            'sending_status' => Yii::t('frontend', 'Sending Status'),
        ];
    }
}
