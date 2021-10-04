<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string|null $subject
 * @property string|null $lang
 * @property string|null $body
 * @property int|null $viewed
 * @property string $created_at
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
            [['name', 'email', 'phone'], 'required'],
            [['body'], 'string'],
            [['viewed'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'subject'], 'string', 'max' => 255],
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
            'body' => 'Body',
            'viewed' => 'Viewed',
            'created_at' => 'Created At',
        ];
    }
}
