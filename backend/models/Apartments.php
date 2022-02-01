<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%apartments}}".
 *
 * @property int $id
 * @property string $floor_num
 * @property string|null $num
 * @property int $status
 *
 * @property ApartmentGallery[] $apartmentGalleries
 * @property ApartmentInfo[] $apartmentInfos
 * @property ApartmentTranslation[] $apartmentTranslations
 * @property Floor $floorNum
 */
class Apartments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor_num'], 'required'],
            [['status'], 'integer'],
            [['num'], 'unique'],
            [['floor_num', 'num'], 'string', 'max' => 24],
            [['floor_num'], 'exist', 'skipOnError' => true, 'targetClass' => Floor::className(), 'targetAttribute' => ['floor_num' => 'floor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor_num' => 'Этаж',
            'num' => 'Квартира',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[ApartmentGalleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentGalleries()
    {
        return $this->hasMany(ApartmentGallery::className(), ['gallery_id' => 'id']);
    }

    /**
     * Gets query for [[ApartmentInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentInfos()
    {
        return $this->hasMany(ApartmentInfo::className(), ['apartment_id' => 'id']);
    }

    /**
     * Gets query for [[ApartmentTranslations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentTranslations()
    {
        return $this->hasMany(ApartmentTranslation::className(), ['translation_id' => 'id']);
    }

    /**
     * Gets query for [[FloorNum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFloorNum()
    {
        return $this->hasOne(Floor::className(), ['floor' => 'floor_num']);
    }
}
