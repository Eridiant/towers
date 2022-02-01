<?php


namespace app\models;

use yii\base\Model;
use backend\models\UploadFiles;

class UploadImage extends Model{

    public $image;

    public function rules(){
        return[
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function upload(){
        if($this->validate()){
            var_dump($this->image);
        }else{
            return false;
        }
    }

}