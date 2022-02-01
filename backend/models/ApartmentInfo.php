<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%apartment_info}}".
 *
 * @property int $id
 * @property int $apartment_id
 * @property float|null $area
 * @property float|null $price
 * @property string|null $img
 *
 * @property Apartments $apartment
 */
class ApartmentInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartment_info}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apartment_id'], 'required'],
            [['apartment_id'], 'integer'],
            [['area', 'price'], 'number'],
            [['img'], 'string', 'max' => 255],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartments::className(), 'targetAttribute' => ['apartment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartment_id' => 'Apartment ID',
            'area' => 'Area',
            'price' => 'Price',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Apartment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartment()
    {
        return $this->hasOne(Apartments::className(), ['id' => 'apartment_id']);
    }
}
