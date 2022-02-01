<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%apartment_translation}}".
 *
 * @property int $id
 * @property int $translation_id
 * @property string|null $name
 * @property string|null $description
 *
 * @property Apartments $translation
 */
class ApartmentTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartment_translation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['translation_id'], 'required'],
            [['translation_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['translation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartments::className(), 'targetAttribute' => ['translation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'translation_id' => 'Translation ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Translation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        return $this->hasOne(Apartments::className(), ['id' => 'translation_id']);
    }
}
