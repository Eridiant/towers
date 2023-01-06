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
class FloorC extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%floor_c}}';
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
     * Gets query for [[ApartmentsCs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentsCs()
    {
        return $this->hasMany(ApartmentsC::className(), ['floor_num' => 'floor']);
    }
}
