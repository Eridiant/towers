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
use frontend\models\News;

/**
 * News controller
 */
class NewsController extends Controller
{

    public $bodyClass;

    function beforeAction($action) {

        $currentLang = Yii::$app->language;

        switch ($currentLang) {
            case 'ru-RU':
                $curLangUrl = "/" . explode("-", $currentLang)[0];
                break;
            case 'en-US':
                $curLangUrl = "/" . explode("-", $currentLang)[0];
                break;
            default:
                $curLangUrl = "";
                break;
        }

        Yii::$app->params['curLangUrl'] = $curLangUrl;
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            // 'captcha' => [
            //     'class' => 'yii\captcha\CaptchaAction',
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            // ],
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
        $lang = Yii::$app->language;

        $lang = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $lang])->one();
        $code = $lang->code;
        $title = "title_{$code}";

        $request = Yii::$app->request;
        if ($request->isPost) {

            $add = $request->post("add") / 4;

            $model = News::find()
                ->where(['active' => 1])
                ->andWhere(['not', [$title => null]])
                ->orderBy(['id' => SORT_DESC]);

            $count = floor($model->count() / (($add + 1) * 4));

            $model = $model->limit(4)->offset(4*$add)->all();

            return json_encode([$count, $this->renderPartial('_news', compact('model', 'code', 'title'))]);

        } else {

            $model = News::find()
                ->where(['active' => 1])
                ->andWhere(['not', [$title => null]])
                ->orderBy(['id' => SORT_DESC]);

            $count = floor($model->count() - 4) > 0 ? 1 : 0 ;

            $model = $model->limit(4)->all();
        }

        $this->bodyClass = 'other bl';

        return $this->render('index', compact('model', 'code', 'title', 'count'));
    }

    public function actionView($slug)
    {
        $lang = Yii::$app->language;;

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