<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Feedback;
use backend\models\News;

/**
 * News controller
 */
class NewsController extends Controller
{

    public $bodyClass;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales'=> \yii\helpers\ArrayHelper::getColumn(\backend\modules\language\models\Language::find()->select('key')->asArray()->all(), 'key'),
            ],
        ];
    }

    // function beforeAction() {

    //     $cs = Yii::app()->getClientScript();

    //     $cs->registerCssFile('');

    // }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $cookies = Yii::$app->request->cookies;
        $lang = $cookies->getValue('_locale', 'en-US');

        $lang = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $lang])->one();
        $code = $lang->code;
        $title = "title_{$code}";

        var_dump('<pre>');
        var_dump($code);
        var_dump('</pre>');
        die;
        

        $model = News::find()
            // ->where(['IS NOT', $title, null])
            ->where(['active' => 1])
            ->andWhere(['not', [$title => null]])
            ->all();

        $this->bodyClass = 'other bl';

        return $this->render('index', compact('model', 'code', 'title'));
    }

    public function actionView($slug)
    {
        $cookies = Yii::$app->request->cookies;
        $lang = $cookies->getValue('_locale', 'en-US');

        $lang = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $lang])->one();
        $code = $lang->code;
        $title = "title_{$code}";

        $model = News::find()
            ->where('slug=:slug', [':slug' => $slug])
            ->andWhere(['active' => 1])
            ->andWhere(['not', [$title => null]])
            ->one();

        $this->bodyClass = 'other bl';

        return $this->render('view', compact('model', 'code', 'title'));
    }

}