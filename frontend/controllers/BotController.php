<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
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
use yii\helpers\HtmlPurifier;
use frontend\models\telegram\TelegramContent;
use frontend\models\telegram\TelegramQuery;
use frontend\models\telegram\TelegramVideo;
use frontend\models\telegram\TelegramImage;
use frontend\models\telegram\TelegramMessage;
use frontend\models\telegram\TelegramUser;
use frontend\models\telegram\TelegramChat;
use frontend\models\telegram\TelegramInfo;
/**
 * Site controller
 */
class BotController extends Controller
{

    private $bot_api_key;
    private $chat_id;
    private $query;
    private $user;
    private $update;


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

    public function beforeAction($action)//Обязательно нужно отключить Csr валидацию, так не будет работать
    {
        // $this->enableCsrfValidation = ($action->id !== "webhook");
        $this->enableCsrfValidation = false;

        $user_info = \common\models\UserInfo::find()->where(['user_id' => 1])->one();

        $this->bot_api_key = $user_info->mail;

        // try {
        //     $model = new TelegramLog();
        //     $model->data1 = $action->id;
        //     $model->save();
        // } catch (\Throwable $th) {
        //     $model = new TelegramLog();
        //     $model->data = json_encode($th->getMessage());
        //     $model->save();
        // }

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
        ];
    }

    protected function sendPhoto($parse_mode = 'HTML', $headers = [])
    {

        if (!empty($this->query->content->id)) {
            $content = TelegramImage::find()->where(['content_id' => $this->query->content->id, 'lang' => 'ru'])->one();
        }

        if (empty($content->caption)) {
            $content = TelegramImage::find()->where(['content_id' =>2, 'lang' => 'ru'])->one();
        };

        if (!empty($content->pre_markup) && isset($this->query->query)) {
            $this->sendIntermediateMessage($this->query->query, $content->pre_markup);
        }

        if (empty($content->photo)) {
            if (empty($this->query->content->photo)) {
                $photo = 'AgACAgQAAxkDAAIC2mPb6jnlvTf5PzSIuHOpRZGhR-e-AAJLsDEbRie9UjIzSd969FPbAQADAgADeQADLgQ';
            } else {
                $photo = $this->query->content->photo;
            }
        } else {
            $photo = $content->photo;
        }

        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendPhoto([
                'chat_id' => $this->chat_id,
                'parse_mode' => $parse_mode,
                'caption' => $content->caption,
                'photo' => $photo,
                'reply_markup' => $content->reply_markup,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();
        }
    }

    protected function sendAnimation($parse_mode = 'HTML', $headers = [])
    {

        if (!empty($this->query->content->id)) {
            $content = TelegramImage::find()->where(['content_id' => $this->query->content->id, 'lang' => 'ru'])->one();
        }

        if (empty($content->caption)) {
            $content = TelegramImage::find()->where(['content_id' =>2, 'lang' => 'ru'])->one();
        };

        if (!empty($content->pre_markup) && isset($this->query->query)) {
            $this->sendIntermediateMessage($this->query->query, $content->pre_markup);
        }

        if (empty($content->photo)) {
            if (empty($this->query->content->photo)) {
                $photo = 'AgACAgQAAxkDAAIC2mPb6jnlvTf5PzSIuHOpRZGhR-e-AAJLsDEbRie9UjIzSd969FPbAQADAgADeQADLgQ';
            } else {
                $photo = $this->query->content->photo;
            }
        } else {
            $photo = $content->photo;
        }

        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendAnimation([
                'chat_id' => $this->chat_id,
                'parse_mode' => $parse_mode,
                'caption' => $content->caption,
                'animation'   => $photo,
                'reply_markup' => $content->reply_markup,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();
        }
    }

    protected function sendVideo($parse_mode = 'HTML', $headers = [])
    {

        if (!empty($this->query->content->id)) {
            $content = TelegramImage::find()->where(['content_id' => $this->query->content->id, 'lang' => 'ru'])->one();
        }

        if (empty($content->caption)) {
            $content = TelegramImage::find()->where(['content_id' =>2, 'lang' => 'ru'])->one();
        };

        if (!empty($content->pre_markup) && isset($this->query->query)) {
            $this->sendIntermediateMessage($this->query->query, $content->pre_markup);
        }

        if (empty($content->photo)) {
            if (empty($this->query->content->photo)) {
                $photo = 'AgACAgQAAxkDAAIC2mPb6jnlvTf5PzSIuHOpRZGhR-e-AAJLsDEbRie9UjIzSd969FPbAQADAgADeQADLgQ';
            } else {
                $photo = $this->query->content->photo;
            }
        } else {
            $photo = $content->photo;
        }

        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendVideo([
                'chat_id' => $this->chat_id,
                'parse_mode' => $parse_mode,
                'caption' => $content->caption,
                'video'   => $photo,
                'reply_markup' => $content->reply_markup,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();
        }
    }

    protected function sendMessage($parse_mode = 'HTML', $headers = [])
    {

        if (!empty($this->query->content->id)) {
            $content = TelegramMessage::find()->where(['content_id' => $this->query->content->id, 'lang' => 'ru'])->one();
        }

        if (empty($content->text)) {
            $content = TelegramImage::find()->where(['content_id' =>2, 'lang' => 'ru'])->one();
        };

        if (!empty($content->pre_markup) && isset($this->query->query)) {
            $this->sendIntermediateMessage($this->query->query, $content->pre_markup);
        }

        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendMessage([
                'chat_id' => $this->chat_id,
                'parse_mode' => $parse_mode,
                'text'   => $content->text,
                'reply_markup' => $content->reply_markup,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();
        }
    }

    protected function sendLocation()
    {
        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendLocation([
                'chat_id' => $this->chat_id,
                'latitude' => 41.63658205509769,
                'longitude' => 41.621193980941854,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();
        }
    }

    protected function sendIntermediateMessage($query, $pre_markup, $parse_mode = 'HTML', $headers = [])
    {
        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendMessage([
                'chat_id' => $this->chat_id,
                'parse_mode' => $parse_mode,
                'disable_notification' => 0,
                'text'   => $query,
                'reply_markup' => $pre_markup,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();
        }
    }

    public function actionBot()
    {

        // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $update = json_decode(file_get_contents('php://input'), true);

        $model = new TelegramLog();

        // $message = isset($update['message']) ? $update['message'] :  $update['callback_query'];
        if (isset($update['message'])) {
            $message = $update['message'];
            // Get chat ID and message text
            $this->chat_id = $message['chat']['id'];

            $this->update = $update['message'];
        } else if (isset($update['callback_query'])) {
            $message = $update['callback_query'];
            $this->chat_id = $message['message']['chat']['id'];
            // $message = $message['data'];
            $model->data2 = json_encode($message);

            $this->update = $update['callback_query'];
        }

        $this->getUserById();

        $text = isset($message['text']) ? $message['text'] : $message['data'];
        if ($text === "Оставить заявку" || $this->user->status === 1) {
            $this->fillContactForm();
            return;
        }


        $model->data = json_encode($update);
        $model->data1 = mb_strtolower($text, 'UTF-8');

        $name = $update['message']['from']['first_name'] ?? 'клиент';

        if (ctype_digit($text)) {
            $this->query = TelegramQuery::find()->where('id = :id', [':id' => $text])->one();
        } else {
            if ($text === "Назад" || $text === "Назад") {
                // $query = TelegramQuery::find()->where('query = :query', [':query' => $text])->one();

                $parent_id = TelegramContent::find()->where('id = :id', [':id' => $this->user->last_visited_id ?? 0])->one()->parent_id ?? 0;

                $this->query = TelegramQuery::find()
                    ->where('content_id = :content_id')
                    ->andWhere('lang = :lang')
                    ->addParams([':content_id' => $parent_id, ':lang' => 'ru'])
                    ->one();
            } else {
                $this->query = TelegramQuery::find()->where('query = :query', [':query' => $text])->one();
            }
        }

        $this->user->last_visited_id = $this->query->content->id ?? 2;
        $this->user->save();

        $model->data2 = isset($this->query->content->type_name) ? $this->query->content->type_name : "qqqqq";
        $model->save();

        switch (isset($this->query->content->type_name) ? $this->query->content->type_name : "qqqqq") {
            case 'image':
                $this->sendPhoto();
                break;

            case 'message':
                $this->sendMessage();
                break;

            case 'animation':
                $this->sendAnimation();
                break;

            case 'video':
                $this->sendVideo();
                break;

            case 'location':
                $this->sendLocation();
                break;

            default:
                $this->sendPhoto();
                break;
        }

        return;

    }

    protected function getUserById()
    {
        if (TelegramUser::find($this->update["from"]["id"])->exists()) {
            return $this->user = TelegramUser::find($this->update["from"]["id"])->one();
        }

        $this->user = new TelegramUser();
        $this->user->id = $this->update["from"]["id"];
        $this->user->username = $this->update["from"]["username"];
        $this->user->first_name = $this->update["from"]["first_name"];
        $this->user->last_visited_id = 0;
        $this->user->lang = $this->update["from"]["language_code"];
    }

    protected function fillContactForm()
    {
        $inf = TelegramInfo::find()
        ->where(['user_id' => $this->user->id, 'num_attempts' => [0, 1, 2]])
        // ->andWhere(['>=', 'created_at', time() - 900])
        ->exists();
        if ($inf) {
            $inf = TelegramInfo::find()
                ->where(['user_id' => $this->user->id, 'num_attempts' => [0, 1, 2]])
                // ->andWhere(['>=', 'created_at', time() - 900])
                ->one();
        } else {
            $inf = new TelegramInfo();
            $reply = "Введите пожалуйста Ваш номер телефона:";
            $inf->user_id = $this->user->id;
            $this->user->status = 1;
            $this->sendAnswer($reply);
            $inf->save();
            $this->user->save();
            return;
        }

        if (is_null($inf->phone)) {
            if (preg_match("/\+?\d{11}/", $this->update["text"], $matches)) {
                $inf->phone = $matches[0];
                $inf->num_attempts = 0;
                if ($inf->save()) {
                    $reply = "Введите пожалуйста Ваш емайл:";
                    $this->sendAnswer($reply);
                    return;
                }
            }
            $inf->num_attempts = isset($inf->num_attempts) ? $inf->num_attempts + 1 : 0;
            if ($this->errorCounter($inf->num_attempts)) {
                $reply = "Не правильный формат, попробуйте еще раз";
                $this->sendAnswer($reply);
                $inf->num_attempts += 1;
                $inf->save();
            }
            return;
        }

        if (is_null($inf->mail)) {
            if (filter_var($this->update["text"], FILTER_VALIDATE_EMAIL) || true) {
                $inf->mail = $this->update["text"];
                $inf->num_attempts = 0;
                if ($inf->save()) {
                    $reply = "Введите пожалуйста Ваше имя:";
                    $this->sendAnswer($reply);
                    return;
                }
            } else if ($this->errorCounter($inf->num_attempts)) {
                $reply = "Не правильный формат, попробуйте еще раз";
                $this->sendAnswer($reply);
                $inf->num_attempts += 1;
                $inf->save();
            }
            return;
        }

        if (is_null($inf->name)) {

            $inf->num_attempts = 5;
            $inf->num_attempts = HtmlPurifier::process($inf->name);
            if ($inf->save()) {
                $reply = "Ваша заявка принята";
                $this->sendAnswer($reply);
                $this->user->status = 0;
                $this->user->save();
                return;
            }
        } else if ($this->errorCounter($inf->num_attempts)) {
            $reply = "Введите не пустое имя";
            $this->sendAnswer($reply);
            $inf->num_attempts += 1;
            $inf->save();
            return;
        }



        
    }

    protected function errorCounter($error)
    {
        if ($error > 2){
            $this->sendPhoto();
            $this->user->status = 0;
            $this->user->save();
            return 0;
        }
        return 1;
    }

    protected function sendAnswer($answer)
    {
        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendMessage([
                'chat_id' => $this->chat_id,
                'text' => $answer,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $model = new TelegramLog();
            $model->data = $e->getMessage();
            $model->save();
        }
    }

    private function trash()
    {

        // $array = array(
        //     'update_id' => '79576717',
        //     'callback_query' => array(
        //         'id' => '4599696022370985036',
        //         'from' => array(
        //             'id' => '1070950185',
        //             'is_bot' => '',
        //             'first_name' => 'Eridiant',
        //             'username' => 'Eridiant',
        //             'language_code' => 'en'
        //         ),
        //         'message' => array(
        //             'message_id' => '532',
        //             'from' => array(
        //                 'id' => '5851685742',
        //                 'is_bot' => '1',
        //                 'first_name' => 'clgfBot',
        //                 'username' => 'clgf_bot'
        //             ),
        //             'chat' => array(
        //                 'id' => '1070950185',
        //                 'first_name' => 'Eridiant',
        //                 'username' => 'Eridiant',
        //                 'type' => 'private'
        //             ),
        //             'date' => '1675344032',
        //             'photo' => array(
        //                 '0' => array(
        //                     'file_id' => 'AgACAgQAAxkDAAICFGPbuKB1D_capOHLdE4sYQoJHR8EAAJLsDEbRie9UjIzSd969FPbAQADAgADcwADLgQ',
        //                     'file_unique_id' => 'AQADS7AxG0YnvVJ4',
        //                     'file_size' => '948',
        //                     'width' => '90',
        //                     'height' => '51'
        //                 ),
        //                 '1' => array(
        //                     'file_id' => 'AgACAgQAAxkDAAICFGPbuKB1D_capOHLdE4sYQoJHR8EAAJLsDEbRie9UjIzSd969FPbAQADAgADbQADLgQ',
        //                     'file_unique_id' => 'AQADS7AxG0YnvVJy',
        //                     'file_size' => '9529',
        //                     'width' => '320',
        //                     'height' => '180'
        //                 ),
        //                 '2' => array(
        //                     'file_id' => 'AgACAgQAAxkDAAICFGPbuKB1D_capOHLdE4sYQoJHR8EAAJLsDEbRie9UjIzSd969FPbAQADAgADeAADLgQ',
        //                     'file_unique_id' => 'AQADS7AxG0YnvVJ9',
        //                     'file_size' => '38939',
        //                     'width' => '800',
        //                     'height' => '450'
        //                 ),
        //                 '3' => array(
        //                     'file_id' => 'AgACAgQAAxkDAAICFGPbuKB1D_capOHLdE4sYQoJHR8EAAJLsDEbRie9UjIzSd969FPbAQADAgADeQADLgQ',
        //                     'file_unique_id' => 'AQADS7AxG0YnvVJ-',
        //                     'file_size' => '85653',
        //                     'width' => '1280',
        //                     'height' => '720'
        //                 ),
        //                 '4' => array(
        //                     'file_id' => 'AgACAgQAAxkDAAICFGPbuKB1D_capOHLdE4sYQoJHR8EAAJLsDEbRie9UjIzSd969FPbAQADAgADdwADLgQ',
        //                     'file_unique_id' => 'AQADS7AxG0YnvVJ8',
        //                     'file_size' => '88082',
        //                     'width' => '1920',
        //                     'height' => '1080'
        //                 )
        //             ),
        //             'caption' => '“Grand Maison”',
        //             'reply_markup' => array(
        //                 'inline_keyboard' => array(
        //                     '0' => array(
        //                         '0' => array(
        //                             'text' => 'Ответ 1',
        //                             'callback_data' => 'ansv-1'
        //                         ),
        //                         '1' => array(
        //                             'text' => 'Ответ 2',
        //                             'callback_data' => 'ansv-2'
        //                         )
        //                     )
        //                 )
        //             )
        //         ),
        //         'chat_instance' => '6088013493985124044',
        //         'data' => 'ansv-1'
        //     )
        // );


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
        //             ['text' => 'Корпусы ЖК'],
        //             ['text' => 'Контакты'],
        //             ['text' => 'Назад'],
        //         ],
        //     ]
        // ];

        // $method = 'sendMessage';
        // $send_data = [
        //     'text'   => "Вот мои кнопки $text",
        // ];
        // $headers = [];

        // $curl = curl_init();
        // curl_setopt_array($curl, [
        //     CURLOPT_POST => 1,
        //     CURLOPT_HEADER => 0,
        //     CURLOPT_RETURNTRANSFER => 1,
        //     CURLOPT_URL => "https://api.telegram.org/bot$bot_api_key/$method",
        //     CURLOPT_POSTFIELDS => json_encode($send_data),
        //     CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), $headers)
        // ]);   
        
        // $result = curl_exec($curl);
        // curl_close($curl);

        // return;


        // $data = isset($data['callback_query']) ? $data['callback_query'] : $data['message'];
        // // $data = $data['message'];
        // $message = mb_strtolower(($data['text'] ? $data['text'] : $data['data']),'utf-8');

        // $method = 'sendMessage';
        // $send_data = [
        //     'text'   => 'Вот мои кнопки',
        //     'reply_markup' => [
        //         'resize_keyboard' => true,
        //         'keyboard' => [
        //             [
        //                 ['text' => 'Видео'],
        //                 ['text' => 'Кнопка 2'],
        //             ],
        //             [
        //                 ['text' => 'Кнопка 3'],
        //                 ['text' => 'Кнопка 4'],
        //             ]
        //         ]
        //     ]
        // ];

        // # Добавляем данные пользователя
        // $send_data['chat_id'] = $data['chat']['id'];

        // $res = sendTelegram($method, $send_data, $bot_api_key);
        // $model->data1 = json_encode($message);
        // $model->data2 = json_encode($res);
        // $model->save();
        // return;
    }
}