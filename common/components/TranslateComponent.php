<?php

    namespace common\components;

    use Yii;
    use yii\base\Component;

    class TranslateComponent extends Component
    {
        /*
         * Возвращает переводимый текст по ключу
         */
        public function returnTranslateByKey ($key, $lang = "", $defaultText = "") {
			$lang = Yii::$app->language;
			$defaultText = $key;
			
            $translate_value = Yii::$app->db->createCommand(
                'SELECT *
                  FROM {{%translation}} as pf
                  WHERE pf.key = "'.$key.'" AND pf.lang="'.$lang.'" '
            )->queryOne()['text'];
			
            if(!Yii::$app->user->isGuest && Yii::$app->request->get('edit_mode')){
                if ( Yii::$app->user->can("canAdmin") ) {
                    //Enter text
                    if ($translate_value)
                        return "<div style='display:inline-block;' class='site-text-translate' key='$key'>".$translate_value."</div>";
                    else
                        return
                            "<div style='display:inline-block;' class='site-text-translate not-text' key='$key'>$defaultText</div>";
                } else
                    return $translate_value ? $translate_value : $defaultText;
            } else
                return $translate_value ? $translate_value : $defaultText;
        }
        /*
         *
         */
    }