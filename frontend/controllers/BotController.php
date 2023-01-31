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
use Longman\TelegramBot\Request;
use frontend\models\telegram\TelegramContent;
use frontend\models\telegram\TelegramQuery;
use frontend\models\telegram\TelegramVideo;
use frontend\models\telegram\TelegramImage;
use frontend\models\telegram\TelegramMessage;
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

    protected function sendPhoto($chat_id, $caption, $photo, $reply_markup, $parse_mode = 'HTML', $headers = [])
    {
        try {
            // Create Telegram API object
                // 'reply_markup' => json_decode($content->reply_markup, true),
            $telegram = new \Longman\TelegramBot\Telegram($bot_api_key);

            if ($method === 'image') {
                $result = Request::sendPhoto([
                    'chat_id' => $chat_id,
                    'parse_mode' => $parse_mode,
                    'caption' => $caption,
                    'photo'   => $photo,
                    'reply_markup' => $reply_markup,
                ]);
            }

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            // log telegram errors
            // echo $e->getMessage();

            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();

            $reply = 'Hello, your message is: ' . $text;
            file_get_contents("https://api.telegram.org/bot$API_KEY/sendMessage?chat_id=$chat_id&text=$reply");
        }
        return ;
    }

    public function actionBot()
    {
        $user_info = \common\models\UserInfo::find()->where(['user_id' => 1])->one();
        $request = Yii::$app->request;

        $bot_api_key  = $user_info->mail;
        $bot_username = 'clgf_bot';
        $hook_url     = $request->absoluteUrl;

        // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $API_KEY = $bot_api_key;
        $update = json_decode(file_get_contents('php://input'), true);


        $model = new TelegramLog();


        $model->data3 = json_encode($update);

        // $message = isset($update['message']) ? $update['message'] :  $update['callback_query'];
        if (isset($update['message'])) {
            $message = $update['message'];
            // Get chat ID and message text
            $chat_id = $message['chat']['id'];
        } else if (isset($update['callback_query'])) {
            $message = $update['callback_query'];
            $chat_id = $message['message']['chat']['id'];
            $model->data2 = json_encode($message);
        }

        $text = isset($message['text']) ? $message['text'] : 'text';

        $model->data = json_encode($update);
        $model->data1 = mb_strtolower($text, 'UTF-8');
        $model->save();

        $name = $update['message']['from']['first_name'] ?? 'клиент';


        $query = TelegramQuery::find()->where('query = :query', [':query' => $text])->one();


        

        switch ($query->content->type_name) {
            case 'image':

                if (isset($query->content)) {
                    $content = TelegramImage::find()->where(['content_id' => $query->content->id, 'lang' => 'ru'])->one();
        
                    if (!isset($content->caption)) {
                        $content = TelegramImage::find()->where(['content_id' => 1, 'lang' => 'ru'])->one();
                    };
                } else {
                    $content = TelegramImage::find()->where(['content_id' => 1, 'lang' => 'ru'])->one();
                }

                $this->sendPhoto($chat_id, $content->caption, $content->photo, $content->reply_markup);
                break;
            
            default:
                if (isset($query->content)) {
                    $content = TelegramImage::find()->where(['content_id' => $query->content->id, 'lang' => 'ru'])->one();
        
                    if (!isset($content->caption)) {
                        $content = TelegramImage::find()->where(['content_id' => 1, 'lang' => 'ru'])->one();
                    };
                } else {
                $content = TelegramImage::find()->where(['content_id' => 1, 'lang' => 'ru'])->one();
            }

                $this->sendPhoto($chat_id, $content->caption, $content->photo, $content->reply_markup);
                break;
        }

        


        // try {
        //     sendMessage
        //     $result = Request::sendMessage([
        //         'chat_id' => $chat_id,
        //         'text'    => "Your utf8 text $text",
        //     ]);
        // } catch (\Throwable $th) {
        //     $model = new TelegramLog();
        //     $model->data = json_encode($th);
        //     $model->save();

        //     $reply = 'Hello, your message is: ' . $text;
        //     file_get_contents("https://api.telegram.org/bot$API_KEY/sendMessage?chat_id=$chat_id&text=$reply");
        // }


        return;


        // 'inline_keyboard' => [
        //     [
        //         ['text' => 'Текст описание', 'callback_data' => '1'],
        //         ['text' => 'Презентация', 'callback_data' => '2'],
        //     ],
        //     [
        //         ['text' => 'Видео', 'callback_data' => '3'],
        //         ['text' => 'Сайт', 'callback_data' => '4'],
        //     ],
        // ],
        // "update_id":79576522,
        // "message":{
        //     "message_id":177,
        //     "from":{
        //         "id":1070950185,
        //         "is_bot":false,
        //         "first_name":"Eridiant",
        //         "username":"Eridiant",
        //         "language_code":"ru"
        //     },
        //     "chat":{
        //         "id":1070950185,
        //         "first_name":"Eridiant",
        //         "username":"Eridiant",
        //         "type":"private"
        //     },
        //     "date":1675022380,
        //     "text":"\u041e \u0437\u0430\u0441\u0442\u0440\u043e\u0439\u0449\u0438\u043a\u0435 \u0438 \u043f\u0440\u043e\u0435\u043a\u0442\u0435"
        // }

        // $method = 'sendMessage';
        // $send_data = [
        //     'text'   => "your message is: $text",
        // ];

        // $send_data['chat_id'] = $data['chat']['id'];

        // $res = $this->sendTelegram($method, $send_data, $bot_api_key);

        // return;

        // Send a reply message

        return;

        // 'reply_markup' => [
        //     'keyboard' => [
        //         [
        //             ['text' => 'Вопрос 1'],
        //             ['text' => 'Вопрос 2'],
        //         ],
        //     ],
        //     'inline_keyboard' => [
        //         [
        //             ['text' => 'Ответ 1', 'callback_data' => 'ansv-1'],
        //             ['text' => 'Ответ 2', 'callback_data' => 'ansv-2'],
        //         ],
        //     ],
        // ]

        // [
        //     'resize_keyboard' => true,
        //     'keyboard' => [
        //         [
        //             ['text' => 'О застройщике и проекте'],
        //         ],
        //         [
        //             ['text' => 'Тип отделки и планировки'],
        //         ],
        //         [
        //             ['text' => 'Галерея'],
        //             ['text' => 'Инфраструктура'],
        //         ],
        //         [
        //             ['text' => 'Консультация online'],
        //             ['text' => 'Оставить заявку'],
        //         ],
        //         [
        //             ['text' => 'Вопросы и ответы'],
        //             ['text' => 'Изучить документацию'],
        //         ],
        //         [
        //             ['text' => 'Корпусы ЖК'],
        //             ['text' => 'Контакты'],
        //             ['text' => 'Назад'],
        //         ],
        //     ]
        // ];

        $method = 'sendMessage';
        $send_data = [
            'text'   => "Вот мои кнопки $text",
        ];
        $headers = [];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://api.telegram.org/bot$bot_api_key/$method",
            CURLOPT_POSTFIELDS => json_encode($send_data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
        ]);   
        
        $result = curl_exec($curl);
        curl_close($curl);

        return;


        $data = isset($data['callback_query']) ? $data['callback_query'] : $data['message'];
        // $data = $data['message'];
        $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');

        $method = 'sendMessage';
        $send_data = [
            'text'   => 'Вот мои кнопки',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => 'Видео'],
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

        $res = sendTelegram($method, $send_data, $bot_api_key);
        $model->data1 = json_encode($message);
        $model->data2 = json_encode($res);
        $model->save();
        return;
    }
}