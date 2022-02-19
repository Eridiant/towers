<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\User;
use common\models\UserInfo;
use backend\models\Scripts;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'scripts'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $user = Yii::$app->user->identity;
        $info = UserInfo::find()
                ->where(['user_id' => $user->id])
                ->one();
        // $info = new UserInfo();
        // var_dump('<pre>');
        // var_dump($user->id);
        // var_dump('</pre>');
        // die;

        $request = Yii::$app->request;
        if ($request->isPost && $info->load(Yii::$app->request->post())) {
            $info->user_id = $user->id;

            if ($info->save()) {
                Yii::$app->session->setFlash('success', 'Информация обновлена');
            }
        }
        

        return $this->render('index', compact('user', 'info'));
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

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
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionScripts()
    {
        $model = Scripts::find(1)->one();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if ($model->getErrors()) {
                var_dump($model->getErrors());
            }
        }

        return $this->render('scripts', [
            'model' => $model,
        ]);
    }
}
