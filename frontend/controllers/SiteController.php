<?php

namespace frontend\controllers;

use Yii;
use backend\models\FloorA;
use backend\models\FloorB;
use backend\models\FloorC;
use backend\models\ApartmentsA;
use backend\models\ApartmentsB;
use backend\models\ApartmentsC;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
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
 * Site controller
 */
class SiteController extends Controller
{

    public $bodyClass;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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

    // function beforeAction($action) {

    //     // $cs = Yii::$app->getClientScript();

        


    //     $cookies = Yii::$app->request->cookies;
    //     $lang = $cookies->getValue('_locale', 'en-US');

    //     $lang = \backend\modules\language\models\Language::find()->where(['deleted_at' => null, 'key' => $lang])->one();
    //     $code = $lang->code;
    //     $title = "title_{$code}";

    //     // var_dump('<pre>');
    //     // var_dump($code);
    //     // var_dump('</pre>');
    //     // die;
    //     \yii\helpers\Html::cssFile()($code);
    // }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Feedback();

        $request = Yii::$app->request;
        if ($request->isPost && $model->load($request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model->lang = Yii::$app->language;
            
            if($model->save()){
                return ['data' => ['success' => true]];
            }
            return ['data' => ['success' => true]];
        }

        $this->bodyClass = 'wh';

        return $this->render('index', compact('model'));
    }

    public function actionAjax()
    {
        $model = new Feedback();

        $request = Yii::$app->request;
        
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model->name = $request->post("name");
            $model->phone = $request->post("phone");
            $model->viewed = $request->post("viewed") == "on" ? 1 : 0;
            $model->lang = Yii::$app->language;
            
            if($model->save()){
                // Yii::$app->mailer->compose()
                //     // ->setTo($mail['email'])
                //     ->setTo('info@calligraphy-towers.com')
                //     ->setFrom('bitcoin@eridiante.bhuser.ru')
                //     ->setSubject('заявка')
                //     ->setTextBody('Имя: ' . $request->post("name") . ' Телефон ' . $request->post("phone"))
                //     ->send();
                return ['data' => ['success' => true]];
            }

            return ['data' => ['success' => false]];
        }
    }

    public function actionInfrastructure()
    {

        $this->bodyClass = 'wh';

        return $this->render('infrastructure');
    }

    public function actionLayouts($id = 1, $slug = null)
    {
        $request = Yii::$app->request;

        if ($request->isAjax){
            $slug = $request->post('slug');
            if ($request->post('floor')) {
                $id = $request->post('floor');
            }
        }

        if ($slug === 'block-A' || $slug == NULL) {
            $block = 'a';
            $blocks = FloorA::find()->all();
            $floor = FloorA::find()
                    ->where('id=:id')
                    ->addParams([':id' => $id])
                    ->one();
            $model = ApartmentsA::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor])
                    ->asArray()
                    ->all();
        }

        if ($slug === 'block-B') {
            $block = 'b';
            $blocks = FloorB::find()->all();
            $floor = FloorB::find()
                    ->where('id=:id')
                    ->addParams([':id' => $id])
                    ->one();
            $model = ApartmentsB::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor])
                    ->asArray()
                    ->all();
        }

        if ($slug === 'block-C') {
            $block = 'c';
            $blocks = FloorC::find()->all();
            $floor = FloorC::find()
                    ->where('id=:id')
                    ->addParams([':id' => $id])
                    ->one();
            $model = ApartmentsC::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor])
                    ->asArray()
                    ->all();
        }

        // $model = json_encode($model);
        // $blocks = json_encode($blocks);
        $summ = json_encode(['model'=>$model, 'blocks'=>$blocks]);

        if ($request->isAjax){
            $summ = json_encode(['model'=>$model, 'blocks'=>$blocks]);
            return $summ;
        }

        $floor_num = $floor->floor;
        // var_dump('<pre>');
        // var_dump($summ);
        // var_dump('</pre>');
        // die;
        

        $this->bodyClass = 'other bl';

        return $this->render('layouts', compact('model', 'block', 'floor_num', 'summ', 'blocks'));
    }

    public function actionGallery()
    {

        $this->bodyClass = 'other bl';

        $rend = '_gallery';

        return $this->render('gallery', compact('rend'));
    }

    public function actionBatumi()
    {

        $this->bodyClass = 'other bl';

        $rend = '_batumi';

        return $this->render('gallery', compact('rend'));
    }

    public function actionConstructionProgress()
    {

        $this->bodyClass = 'other bl';

        $rend = '_progress';

        return $this->render('gallery', compact('rend'));
    }

    public function actionOurTeam()
    {

        $this->bodyClass = 'other bl';

        $rend = '_team';

        return $this->render('gallery', compact('rend'));
    }

    public function actionVideo()
    {

        $this->bodyClass = 'other bl';

        $rend = '_video';

        return $this->render('gallery', compact('rend'));
    }

    public function actionAbout()
    {

        $this->bodyClass = 'other bl';

        return $this->render('about');
    }

    public function actionContacts()
    {

        $this->bodyClass = 'other bl';

        return $this->render('contacts');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
