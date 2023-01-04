<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%apartments_c}}".
 *
 * @property int $id
 * @property int $floor_num
 * @property int $num
 * @property float|null $money
 * @property int|null $money_m
 * @property int|null $money_wh
 * @property int|null $money_wh_m
 * @property float|null $total_area
 * @property float|null $living_space
 * @property float|null $balcony_area
 * @property int|null $img
 * @property string|null $ru
 * @property string|null $en
 * @property string|null $ge
 * @property string|null $he
 * @property int $status
 */
class ApartmentsC extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartments_c}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor_num', 'num'], 'required'],
            [['id', 'floor_num', 'num', 'money_m', 'money_wh', 'money_wh_m', 'img', 'status'], 'integer'],
            [['money', 'total_area', 'living_space', 'balcony_area'], 'number'],
            [['ru', 'en', 'ge', 'he'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor_num' => 'Floor Num',
            'num' => 'Num',
            'money' => 'Money',
            'money_m' => 'Money M',
            'money_wh' => 'Money Wh',
            'money_wh_m' => 'Money Wh M',
            'total_area' => 'Total Area',
            'living_space' => 'Living Space',
            'balcony_area' => 'Balcony Area',
            'img' => 'Img',
            'ru' => 'Ru',
            'en' => 'En',
            'ge' => 'Ge',
            'he' => 'He',
            'status' => 'Status',
        ];
    }
}
