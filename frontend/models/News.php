<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cali_news".
 *
 * @property int $id
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $title_ge
 * @property string|null $title_he
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $ru
 * @property string|null $en
 * @property string|null $ge
 * @property string|null $he
 * @property int $active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class News extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cali_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ru', 'en', 'ge', 'he'], 'string'],
            [['active'], 'integer'],
            [['title_ru', 'title_en', 'title_ge', 'title_he', 'slug', 'image'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'string', 'max' => 22],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'title_ge' => 'Title Ge',
            'title_he' => 'Title He',
            'slug' => 'Slug',
            'image' => 'Image',
            'ru' => 'Ru',
            'en' => 'En',
            'ge' => 'Ge',
            'he' => 'He',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}