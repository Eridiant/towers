<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $value
 * @property string|null $value1
 * @property string|null $value2
 * @property string|null $value3
 * @property string|null $value4
 * @property string|null $error
 * @property string|null $error1
 * @property string|null $error2
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'value1', 'value2', 'value3', 'value4', 'error', 'error1', 'error2'], 'string'],
            [['name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'value' => 'Value',
            'value1' => 'Value1',
            'value2' => 'Value2',
            'value3' => 'Value3',
            'value4' => 'Value4',
            'error' => 'Error',
            'error1' => 'Error1',
            'error2' => 'Error2',
        ];
    }
}
