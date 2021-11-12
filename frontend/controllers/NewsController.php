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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $this->bodyClass = 'other bl';

        return $this->render('index');
    }

    public function actionView($slug)
    {

        $this->bodyClass = 'other bl';

        return $this->render('view', compact('slug'));
    }

}