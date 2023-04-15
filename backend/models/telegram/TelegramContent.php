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
            [['media', 'caption', 'text', 'inquiry', 'textReply', 'textInline', 'mediaReply', 'mediaInline'], 'safe'],
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
    private $_textReply;
    private $_textInline;
    public function getTextReply()
    {
        $lang = Yii::$app->request->get('lang');

        if ($this->_textReply === null && !is_null($this->getMessages()->andWhere(['lang' => $lang])->one())) {
            $this->_textReply = $this->getMessages()->andWhere(['lang' => $lang])->one()->reply_markup;
        }

        return $this->_textReply;
    }
    public function getTextInline()
    {
        $lang = Yii::$app->request->get('lang');

        if ($this->_textInline === null && !is_null($this->getMessages()->andWhere(['lang' => $lang])->one())) {
            $this->_textInline = $this->getMessages()->andWhere(['lang' => $lang])->one()->pre_markup;
        }

        return $this->_textInline;
    }
    public function setTextReply($value)
    {
        $this->_textReply = $value;
    }
    public function setTextInline($value)
    {
        $this->_textInline = $value;
    }
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
            $media->reply_markup = $this->getTextReply();
            $media->pre_markup = $this->getTextInline();

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

    private $_inquiry;
    public function getInquiry()
    {
        $lang = Yii::$app->request->get('lang');

        if ($this->_inquiry === null && !is_null($this->getQueries()->andWhere(['lang' => $lang])->one())) {
            $this->_inquiry = $this->getQueries()->andWhere(['lang' => $lang])->one()->query;
        }

        return $this->_inquiry;
    }
    public function setInquiry($value)
    {
        $this->_inquiry = $value;
    }
    public function updateInquiry()
    {
        if ($this->inquiry) {

            if (!TelegramQuery::find()->where(['content_id' => $this->id, 'lang' => Yii::$app->request->get('lang')])->exists()) {
                $media = new TelegramQuery();
                $media->content_id = $this->id;
                $media->lang = Yii::$app->request->get('lang');
            } else {
                $media = TelegramQuery::find()->where(['content_id' => $this->id, 'lang' => Yii::$app->request->get('lang')])->one();
            }

            $media->query = $this->getInquiry();

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
    private $_mediaReply;
    private $_mediaInline;
    public function getMedia()
    {
        return $this->_media;
    }
    public function setMedia($value)
    {
        $this->_media = $value;
    }
    public function getMediaReply()
    {
        $lang = Yii::$app->request->get('lang');

        if ($this->_mediaReply === null && !is_null($this->getImages()->andWhere(['lang' => $lang])->one())) {
            $this->_mediaReply = $this->getImages()->andWhere(['lang' => $lang])->one()->reply_markup;
        }

        return $this->_mediaReply;
    }
    public function getMediaInline()
    {
        $lang = Yii::$app->request->get('lang');

        if ($this->_mediaInline === null && !is_null($this->getImages()->andWhere(['lang' => $lang])->one())) {
            $this->_mediaInline = $this->getImages()->andWhere(['lang' => $lang])->one()->pre_markup;
        }

        return $this->_mediaInline;
    }
    public function setMediaReply($value)
    {
        $this->_mediaReply = $value;
    }
    public function setMediaInline($value)
    {
        $this->_mediaInline = $value;
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
            $media->reply_markup = $this->getMediaReply();
            $media->pre_markup = $this->getMediaInline();


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
        $this->updateInquiry();

        // var_dump('<pre>');
        // var_dump($this);
        // var_dump('</pre>');
        // die;
        
        return parent::beforeSave($insert);
    }
}
