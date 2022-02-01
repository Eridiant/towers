<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cali_floor_a".
 *
 * @property int $id
 * @property int $floor
 * @property string|null $ru
 * @property string|null $en
 * @property string|null $ge
 * @property string|null $he
 * @property int|null $price
 *
 * @property ApartmentsA[] $apartmentsAs
 */
class FloorA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_floor_a';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor'], 'required'],
            [['floor', 'price'], 'integer'],
            [['ru', 'en', 'ge', 'he'], 'string'],
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
            'floor' => 'Floor',
            'ru' => 'Ru',
            'en' => 'En',
            'ge' => 'Ge',
            'he' => 'He',
            'price' => 'Цена за м2',
        ];
    }

    /**
     * Gets query for [[ApartmentsAs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentsAs()
    {
        return $this->hasMany(ApartmentsA::className(), ['floor_num' => 'floor']);
    }
}
