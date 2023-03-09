<?php

namespace backend\models;

use Yii;

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
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['viewed', 'sending_status'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'subject', 'country'], 'string', 'max' => 255],
            [['email', 'phone', 'lang'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'subject' => 'Subject',
            'lang' => 'Lang',
            'country' => 'country',
            'body' => 'Body',
            'viewed' => 'Viewed',
            'created_at' => 'Created At',
            'sending_status' => 'Sending Status',
        ];
    }
}
