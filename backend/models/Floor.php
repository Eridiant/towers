<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%floor}}".
 *
 * @property int $id
 * @property string $floor
 *
 * @property Apartments[] $apartments
 */
class Floor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%floor}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor'], 'required'],
            [['floor'], 'string', 'max' => 24],
            [['floor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor' => 'Этаж',
        ];
    }

    /**
     * Gets query for [[Apartments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartments::className(), ['floor_num' => 'floor']);
    }
}
