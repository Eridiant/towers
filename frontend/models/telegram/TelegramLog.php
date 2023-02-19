<?php

namespace frontend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_log".
 *
 * @property int $id
 * @property string|null $data
 * @property string|null $data1
 * @property string|null $data2
 * @property string|null $data3
 */
class TelegramLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_telegram_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'data1', 'data2', 'data3'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'data1' => 'Data1',
            'data2' => 'Data2',
            'data3' => 'Data3',
        ];
    }
}
