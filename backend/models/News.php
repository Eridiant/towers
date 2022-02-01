<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
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
 * @property int $created_at
 * @property int $updated_at
 */
class News extends ActiveRecord
{

    public $createdAtAttribute = 'created_at';
    public $updatedAtAttribute = 'updated_at';
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
            // [['image'], 'file', 'extensions' => 'png, jpg'],
            [['active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_en', 'title_ge', 'title_he', 'slug'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
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

    public function upload(){
        if($this->validate()){
            if (!empty($this->image)) {
                // var_dump($this->image);
                $file_name_g = substr(md5(microtime() . rand(0, 9999)), 0, 5) . '-' . $this->image->baseName . '.' . $this->image->extension;
                $path = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/uploads/' . $file_name_g;
                $this->image->saveAs($path);

                return $file_name_g;
            }
            
        }else{
            return false;
        }
    }
}
