<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "cali_apartments_a".
 *
 * @property int $id
 * @property int $floor_num
 * @property int $num
 * @property float|null $money
 * @property float|null $total_area
 * @property float|null $living_space
 * @property float|null $balcony_area
 * @property string|null $ru
 * @property string|null $en
 * @property string|null $ge
 * @property string|null $he
 * @property int $status
 *
 * @property FloorA $floorNum
 */
class ApartmentsA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_apartments_a';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor_num', 'num'], 'required'],
            [['floor_num', 'num', 'status'], 'integer'],
            [['money', 'total_area', 'living_space', 'balcony_area'], 'number'],
            [['ru', 'en', 'ge', 'he'], 'string'],
            [['floor_num'], 'exist', 'skipOnError' => true, 'targetClass' => FloorA::className(), 'targetAttribute' => ['floor_num' => 'floor']],
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
            'money' => 'Стоимость',
            'total_area' => 'Общая площадь',
            'living_space' => 'Жилая площадь',
            'balcony_area' => 'Балкон',
            'ru' => 'Ru',
            'en' => 'En',
            'ge' => 'Ge',
            'he' => 'He',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[FloorNum]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getFloorNum()
    {
        return $this->hasOne(FloorA::className(), ['floor' => 'floor_num']);
    }
}
