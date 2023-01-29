<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
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
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Feedback;
use frontend\models\UserIp;
use frontend\models\SxGeo;
use frontend\models\TelegramLog;
use yii\web\HttpException;
use Longman\TelegramBot\Telegram;

/**
 * Site controller
 */
class BotController extends Controller
{

    public function beforeAction($action)//Обязательно нужно отключить Csr валидацию, так не будет работать
    {
        // $this->enableCsrfValidation = ($action->id !== "webhook");
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['webhook'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    public function actionBot()
    {
        $user_info = \common\models\UserInfo::find()->where(['user_id' => 1])->one();
        $request = Yii::$app->request;

        $bot_api_key  = $user_info->mail;
        $bot_username = 'clgf_bot';
        $hook_url     = $request->absoluteUrl;

        // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = json_decode(file_get_contents('php://input'), TRUE);

        $model = new TelegramLog();

        $model->data = json_encode($data);
        $model->save();

        $data = $data['callback_query'] ? $data['callback_query'] : $data['message'];
        $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');

        $send_data = [
            'video'   => 'https://chastoedov.ru/video/amo.mp4',
            'caption' => 'Вот мое видео',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => 'Кнопка 1'],
                        ['text' => 'Кнопка 2'],
                    ],
                    [
                        ['text' => 'Кнопка 3'],
                        ['text' => 'Кнопка 4'],
                    ]
                ]
            ]
        ];

        # Добавляем данные пользователя
        $send_data['chat_id'] = $data['chat']['id'];

        $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_api_key . '/' . $method,
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
            ]);   
            
            $result = curl_exec($curl);
            curl_close($curl);
            return (json_decode($result, 1) ? json_decode($result, 1) : $result);

        // try {
        //     // Create Telegram API object
        //     $telegram = new Telegram($bot_api_key, $bot_username);

        //     // Set webhook
        //     $result = $telegram->setWebhook($hook_url);
        //     if ($result->isOk()) {
        //         echo $result->getDescription();
        //     }
        // } catch (Longman\TelegramBot\Exception\TelegramException $e) {
        //     // log telegram errors
        //     // echo $e->getMessage();
        // }

        return;
    }
}