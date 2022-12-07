<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%message}}".
 *
 * @property int $id
 * @property int $language_id
 * @property int $source_id
 * @property string|null $text
 * @property int $show
 * @property int $format
 *
 * @property Language $language
 * @property Source $source
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language_id', 'source_id'], 'required'],
            [['language_id', 'source_id', 'show', 'format'], 'integer'],
            [['text'], 'string'],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['language_id' => 'id']],
            [['source_id'], 'exist', 'skipOnError' => true, 'targetClass' => Source::class, 'targetAttribute' => ['source_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => 'Language ID',
            'source_id' => 'Source ID',
            'text' => 'Text',
            'show' => 'Show',
            'format' => 'Format',
        ];
    }

    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::class, ['id' => 'language_id']);
    }

    /**
     * Gets query for [[Source]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::class, ['id' => 'source_id']);
    }
}
