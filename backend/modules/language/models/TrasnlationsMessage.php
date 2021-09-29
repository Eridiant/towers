<?php


namespace backend\modules\language\models;


use yii\db\ActiveRecord;

class TrasnlationsMessage extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%lg_message}}';
    }

    public function rules()
    {
        return [
            [['language', 'translation', 'id'], 'required'],
            [['translation'], 'string'],
            [['language'], 'exist', 'targetClass'=> Language::className(), 'targetAttribute'=>'key']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '№',
            'language' => 'Язык',
            'translation' => 'Перевод',
        ];
    }

}