<?php

namespace common\behaviors;

use Yii;
use yii\base\Behavior;
use yii\web\Application;

/**
 * Class LocaleBehavior
 * @package common\behaviors
 */
class LocaleBehavior extends Behavior
{
    /**
     * @var string
     */
    public $cookieName = '_locale';

    /**
     * @var bool
     */
    public $enablePreferredLanguage = false;

    /**
     * @return array
     */
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'beforeRequest'
        ];
    }

    /**
     * Resolve application language by checking user cookies, preferred language and profile settings
     */
    public function beforeRequest()
    {
        $hasCookie = Yii::$app->getRequest()->getCookies()->has($this->cookieName);
        $forceUpdate = Yii::$app->session->hasFlash('forceUpdateLocale');
        if ($hasCookie && !$forceUpdate) {
            $locale = Yii::$app->getRequest()->getCookies()->getValue($this->cookieName);
        } else {
            $locale = $this->resolveLocale();
        }
        $request = Yii::$app->request;
        $langerhans = explode("/", $request->url)[1];
        $langerhans = substr($langerhans, 0, 2);

        if ($langerhans != explode("-", $locale)[0]) {
            switch ($langerhans) {
                case 'ru':
                    Yii::$app->language = 'ru-RU';
                    break;
                case 'en':
                    Yii::$app->language = 'en-US';
                    break;
                default:
                    Yii::$app->language = 'ka-GE';
                    break;
            }
        } else {
            Yii::$app->language = $locale;
        }
        
        
    }

    public function resolveLocale()
    {
        $locale = Yii::$app->language;
        /*
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->userProfile->locale) {
            $locale = Yii::$app->user->getIdentity()->userProfile->locale;
        } elseif ($this->enablePreferredLanguage) {
            $locale = Yii::$app->request->getPreferredLanguage($this->getAvailableLocales());
        }*/

        return $locale;
    }

    /**
     * @return array
     */
    protected function getAvailableLocales()
    {
        return array_keys(Yii::$app->params['availableLocales']);
    }
}
