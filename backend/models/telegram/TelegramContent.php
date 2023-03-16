<?php

namespace backend\models\telegram;

use Yii;

/**
 * This is the model class for table "cali_telegram_content".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $type
 * @property string|null $type_name
 * @property string|null $photo
 * @property string|null $video
 *
 * @property TelegramImage[] $telegramImages
 * @property TelegramMessage[] $telegramMessages
 * @property TelegramQuery[] $telegramQueries
 * @property TelegramVideo[] $telegramVideos
 */
class TelegramContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%telegram_content}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'type'], 'integer'],
            [['photo', 'video'], 'string'],
            [['type_name'], 'string', 'max' => 255],
            [['media', 'caption', 'text'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'type' => 'Type',
            'type_name' => 'Type Name',
            'photo' => 'Photo',
            'video' => 'Video',
        ];
    }

    /**
     * Gets query for [[TelegramImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(TelegramImage::class, ['content_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramMessages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(TelegramMessage::class, ['content_id' => 'id']);
    }

    /**
     * Gets query for [[TelegramQueries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQueries()
    {
        return $this->hasMany(TelegramQuery::class, ['content_id' => 'id']);
    }
    public function getParent()
    {
        return $this->hasOne(TelegramContent::class, ['id' => 'parent_id']);
    }
    public function getQuery()
    {
        return $this->hasOne(TelegramQuery::class, ['content_id' => 'id'])->andWhere(['lang' => 'ru']);
    }

    /**
     * Gets query for [[TelegramVideos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(TelegramVideo::class, ['content_id' => 'id']);
    }

    // private $_lang;
    // public function getLang()
    // {
    //     return $this->_media;
    // }

    private $_text;
    public function getText()
    {
        $lang = Yii::$app->request->get('lang');

        if ($this->_text === null && !is_null($this->getMessages()->andWhere(['lang' => $lang])->one())) {
            $this->_text = $this->getMessages()->andWhere(['lang' => $lang])->one()->text;
        }

        return $this->_text;
    }
    public function setText($value)
    {
        $this->_text = $value;
    }

    public function updateMessage()
    {
        if ($this->text) {

            if (!TelegramMessage::find()->where(['content_id' => $this->id, 'lang' => Yii::$app->request->get('lang')])->exists()) {
                $media = new TelegramMessage();
                $media->content_id = $this->id;
                $media->lang = Yii::$app->request->get('lang');
            } else {
                $media = TelegramMessage::find()->where(['content_id' => $this->id, 'lang' => Yii::$app->request->get('lang')])->one();
            }

            $media->text = $this->getText();

            if ($media->save()) {
                return;
            } else {
                var_dump('<pre>');
                var_dump($media->getErrors());
                var_dump('</pre>');
                die;
            }
        }
    }



    private $_media;
    private $_caption;
    public function getMedia()
    {
        return $this->_media;
    }
    public function setMedia($value)
    {
        $this->_media = $value;
    }
    public function getCaption()
    {
        $lang = Yii::$app->request->get('lang');

        if ($this->_caption === null && !is_null($this->getImages()->andWhere(['lang' => $lang])->one())) {
            $this->_caption = $this->getImages()->andWhere(['lang' => $lang])->one()->caption;
        }

        return $this->_caption;
    }
    public function setCaption($value)
    {
        $this->_caption = $value;
    }

    public function updateMedia()
    {
        if ($this->caption) {

            if (!TelegramImage::find()->where(['content_id' => $this->id, 'lang' => Yii::$app->request->get('lang')])->exists()) {
                $media = new TelegramImage();
                $media->content_id = $this->id;
                $media->lang = Yii::$app->request->get('lang');
            } else {
                $media = TelegramImage::find()->where(['content_id' => $this->id, 'lang' => Yii::$app->request->get('lang')])->one();
            }

            $media->caption = $this->getCaption();


            if ($media->save()) {
                return;
            } else {
                var_dump('<pre>');
                var_dump($media->getErrors());
                var_dump('</pre>');
                die;
            }
        }
    }




    public function beforeSave($insert)
    {
        $this->updateMedia();
        $this->updateMessage();

        // var_dump('<pre>');
        // var_dump($this);
        // var_dump('</pre>');
        // die;
        
        return parent::beforeSave($insert);
    }
}
