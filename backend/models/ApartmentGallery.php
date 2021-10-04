<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%apartment_gallery}}".
 *
 * @property int $id
 * @property int $gallery_id
 * @property string|null $gallery
 *
 * @property Apartments $gallery
 */
class ApartmentGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartment_gallery}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gallery_id'], 'required'],
            [['gallery_id'], 'integer'],
            [['gallery'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartments::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'Gallery ID',
            'gallery' => 'Gallery',
        ];
    }

    /**
     * Gets query for [[Gallery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Apartments::className(), ['id' => 'gallery_id']);
    }
}
