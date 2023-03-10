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
use frontend\models\Log;
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
use frontend\models\telegram\TelegramLog;
use frontend\models\telegram\TelegramAdmin;
use frontend\models\telegram\TelegramWaitingList;
/**
 * Site controller
 */
class BotController extends Controller
{

    private $bot_api_key;
    private $chat_id;
    private $query;
    private $user;
    private $text;
    private $update;
    private $log = [];
    const REQUEST_TRANSFER_STATUS = 1;
    const REQUEST_CONSULTATION_STATUS = 2;
    const ADMINISTRATOR_STATUS = 5;
    const REQUEST_STATUS = 0;
    const BANNED = 9;

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

    public function beforeAction($action)//?????????????????????? ?????????? ?????????????????? Csr ??????????????????, ?????? ???? ?????????? ????????????????
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
            $content = TelegramImage::find()->where(['content_id' => 2, 'lang' => 'ru'])->one();
            // if ($this->query->content->id === 1) {
            //     $content->caption = str_replace('name', $this->update["from"]["first_name"] ?? $this->update["from"]["username"] ?? '????????????', $content->caption);
            // }
        };

        $qr = $this->query->query ?? isset($this->update['text']) && $this->update['text'] == "exit";
        if (!empty($content->pre_markup) && $qr) {
            $this->sendIntermediateMessage($qr, $content->pre_markup);
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
                'caption' => isset($this->query->content->id) && $this->query->content->id === 1 ? str_replace('name', $this->update["from"]["first_name"] ?? $this->update["from"]["username"] ?? '????????????', $content->caption) : $content->caption,
                'photo' => $photo,
                'reply_markup' => $content->reply_markup,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $this->log["error"] = $e->getMessage();
            $this->log();
            Yii::error($th);
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
            $this->log["error"] = $e->getMessage();
            $this->log();
            Yii::error($e);
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

        $qr = $this->query->query ?? isset($this->update['text']) && $this->update['text'] == "exit";
        if (!empty($content->pre_markup) && $qr) {
            $this->sendIntermediateMessage($qr, $content->pre_markup);
        }

        if (empty($content->photo)) {
            if (empty($this->query->content->photo)) {
                $photo = 'https://calligraphy-batumi.com/tg/output_video1.mp4';
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
            $this->log["error"] = $e->getMessage();
            $this->log();
            Yii::error($e);
        }
    }

    protected function sendMediaGroup($parse_mode = 'HTML', $headers = [])
    {
        if (!empty($this->query->content->id)) {
            $content = TelegramImage::find()->where(['content_id' => $this->query->content->id, 'lang' => 'ru'])->one();
        }

        // $rslt = [
        //     'chat_id' => $this->chat_id,
        //     'media' => json_encode($this->query->content->video),
        // ];
        // foreach (json_decode($this->query->content->photo) as $key => $value) {
        //     $rslt += [$key => $value];
        // }
        // $firstKey = array_key_first($this->query->content->photo);
        // $arr = explode(",", $this->query->content->photo);

        $mediaItems = explode(",", $this->query->content->photo);

        $firstItem = isset($content->caption);
        foreach ($mediaItems as $key => $value) {
            if ($firstItem) {
                $media[] = [
                    'type' => 'photo',
                    'media' => $value,
                    'caption' => $content->caption,
                ];
                $firstItem = false;
            } else {
                $media[] = [
                    'type' => 'photo',
                    'media' => $value,
                ];
            }
        }

        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendMediaGroup([
                'chat_id' => $this->chat_id,
                'media' => $media,
            ]);
            
            // $result = Request::sendMediaGroup([
            //     'chat_id' => $this->chat_id,
            //     'media' => [
            //         ['type' => 'photo', 'media' => 'https://calligraphy-batumi.com/tg/example-1.jpg', 'caption' => 'ok cap'],
            //         ['type' => 'photo', 'media' => 'https://calligraphy-batumi.com/tg/example-2.jpg'],
            //         ['type' => 'photo', 'media' => 'http://www.alcan5000.com/JPG/64Caliente.jpg']
            //     ],
            // ]);
            // $result = Request::sendMediaGroup([
            //     'chat_id' => $this->chat_id,
            //     'media'   => [
            //         new InputMediaPhoto(['media' => 'https://calligraphy-batumi.com/tg/example-1.jpg']),
            //         new InputMediaPhoto(['media' => 'https://calligraphy-batumi.com/tg/example-2.jpg']),
            //     ],
            // ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $this->log["error"] = $e->getMessage();
            $this->log();
            Yii::error($e);
        }
    }

    protected function sendMessage($ms = null, $parse_mode = 'HTML', $headers = [])
    {

        if (!empty($this->query->content->id)) {
            $content = TelegramMessage::find()->where(['content_id' => $this->query->content->id, 'lang' => 'ru'])->one();
        }

        if (empty($content->text)) {
            $content = TelegramImage::find()->where(['content_id' => 2, 'lang' => 'ru'])->one();
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
                'text'   => $this->text ?? $content->text,
                'reply_markup' => $content->reply_markup ?? "",
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $this->log["error"] = $e->getMessage();
            $this->log();
            Yii::error($e);
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
            $this->log["error"] = $e->getMessage();
            $this->log();
            Yii::error($e);
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
            $this->log["error"] = $e->getMessage();
            $this->log();
            Yii::error($e);
        }
    }

    public function actionBot()
    {

        // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $this->log["query"] = '';
        $update = json_decode(file_get_contents('php://input'), true);

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

            $this->update = $update['callback_query'];
        }

        $this->getUserById();

        // if ($this->user->status === self::BANNED) {
        //     return;
        // }

        if (!isset($message['text']) && !isset($message['data'])) {
            $this->sendAnswer("?????????????????? ???? ????????????????????");
            $this->log["user_id"] = $this->user->id;
            $this->log["data"] = json_encode($update);
            $this->log();
            return;
        }

        $text = isset($message['text']) ? $message['text'] : $message['data'];

        if ($this->isAdmin())
        $text = '/' . $text;
        else $text = ltrim($text, '/');

        if ($text === "???????????????????????? online" || $text === "exit"){
            if ($this->canAdmin() && $text === "???????????????????????? online"){
                $text = '/' . $text;
                $this->switchAdmin();
            } else if ($text === "exit"){
                $this->consultationRequest(0);
            } else {
                $this->consultationRequest();
            }
        }


        if ($text === "/exit" && $this->canAdmin())
        $this->switchAdmin(0);

        if ($this->isAdmin() && $this->isAdminCommand($this->update)) {
            return;
        }

        if ($this->user->status === self::REQUEST_CONSULTATION_STATUS && isset($this->user->operator)) {
            $this->consultationCommunication();
            return;
        }

        if ($this->user->status === self::ADMINISTRATOR_STATUS && isset($this->user->admin->current_user_id)) {
            $this->consultationCommunication();
            return;
        }

        $name = $update['message']['from']['first_name'] ?? '????????????';

        if (ctype_digit($text)) {
            $this->query = TelegramQuery::find()->where('id = :id', [':id' => $text])->one();
        } else {
            if ($text === "??????????" || $text === "??????????") {
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

        if ($text === "???????????????? ????????????" || $this->user->status === self::REQUEST_TRANSFER_STATUS) {
            if (isset($this->query->content) && $this->query->content->id !== 8 && $this->user->status === self::REQUEST_TRANSFER_STATUS) {
                $this->user->status = self::REQUEST_STATUS;
                try {
                    $inf = TelegramInfo::find()
                    ->where(['user_id' => $this->user->id, 'num_attempts' => [0, 1, 2, 3]])->one()->delete();
                } catch (\Throwable $th) {
                    Yii::error($th);
                }
            } else {
                $this->fillContactForm();
                return;
            }
        }

        $this->user->last_visited_id = $this->query->content->id ?? 2;
        try {
            $this->user->save();
        } catch (\Throwable $th) {
            Yii::error($th);
        }

        $this->log["user_id"] = $this->user->id;
        $this->log["data"] = json_encode($update);
        $this->log["query"] .= mb_strtolower($text, 'UTF-8');
        $this->log["lang"] = $message["from"]["language_code"] ?? 'hz';
        $qw = $this->query->content->id ?? "error_id";
        $this->log["query"] .= "|{$qw}";

        // $model->data3 = $this->query->id ?? "qu";
        // $model->save();

        switch (isset($this->query->content->type_name) ? $this->query->content->type_name : "error_type_name") {
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

            case 'group':
                $this->sendMediaGroup();
                break;

            case 'command':
                break;

            default:
                $this->sendVideo();
                break;
        }

        $this->log();

        return;

    }

    protected function log()
    {
        try {
            $lg = new TelegramLog();
            $lg->user_id = $this->log["user_id"];
            $lg->data = $this->log["data"] ?? "";
            $lg->query = $this->log["query"] ?? "";
            $lg->lang = $this->log["lang"] ?? "";
            $lg->error = $this->log["error"] ?? "";
            $lg->save();
        } catch (\Throwable $th) {
            Yii::error($th);
        }
    }

    protected function getUserById($id = null)
    {
        // if (TelegramUser::find($this->update["from"]["id"])->exists()) {
        //     return $this->user = TelegramUser::find($this->update["from"]["id"])->one();
        // }
        if (TelegramUser::find()->where(['id' => $id ?? $this->update["from"]["id"]])->exists()) {
            return $this->user = TelegramUser::find()->where(['id' => $id ?? $this->update["from"]["id"]])->one();
        }

        $this->user = new TelegramUser();
        $this->user->id = $this->update["from"]["id"];
        $this->user->username = $this->update["from"]["username"] ?? "_";
        $this->user->first_name = $this->update["from"]["first_name"] ?? "_";
        $this->user->last_visited_id = 0;
        $this->user->lang = $this->update["from"]["language_code"] ?? "ru";
    }

    protected function fillContactForm()
    {
        $inf = TelegramInfo::find()
            ->where(['user_id' => $this->user->id, 'num_attempts' => [0, 1, 2, 3]])
            // ->andWhere(['>=', 'created_at', time() - 900])
            ->exists();
        if ($inf) {
            $inf = TelegramInfo::find()
                ->where(['user_id' => $this->user->id, 'num_attempts' => [0, 1, 2, 3]])
                // ->andWhere(['>=', 'created_at', time() - 900])
                ->one();
            if ($inf->num_attempts > 2) {
                $inf->delete();
            }
        } else {
            $inf = new TelegramInfo();
            $reply = "?????????????? ???????????????????? ?????? ?????????? ????????????????:";
            $inf->user_id = $this->user->id;
            $this->user->status = 1;
            $this->sendAnswer($reply, $this->chat_id, '{"inline_keyboard": [[{"text": "??????????????????","callback_data": "skip"}]]}');
            $inf->save();
            try {
                $this->user->save();
            } catch (\Throwable $th) {
                // $model = new TelegramLog();
                // $model->error = json_encode($th->getMessage());
                // $model->save();
            }
            return;
        }

        if (is_null($inf->phone)) {
            if (($this->update["data"] ?? "" == "skip") || preg_match("/\+?\d{11}/", $this->update["text"] ?? "", $matches)) {
                $inf->phone = $matches[0] ?? "skip";
                $inf->num_attempts = 0;
                if ($inf->save()) {
                    $reply = "?????????????? ???????????????????? ?????? ??????????:";
                    if ($this->update["data"] ?? "" == "skip") {
                        $this->sendAnswer($reply);
                    } else {
                        $this->sendAnswer($reply, $this->chat_id, '{"inline_keyboard": [[{"text": "??????????????????","callback_data": "sk"}]]}');
                    }
                    return;
                }
            }
            if ($this->errorCounter($inf->num_attempts)) {
                $reply = "???? ???????????????????? ???????????? ????????????????, ???????????????????? ?????? ??????";
                $this->sendAnswer($reply);
                $inf->num_attempts += 1;
                $inf->save();
            }
            return;
        }

        if (is_null($inf->mail)) {
            if (filter_var($this->update["text"] ?? "", FILTER_VALIDATE_EMAIL) || ($this->update["data"] ?? "" == "sk") ) {
                $inf->mail = $this->update["text"] ?? "skip";
                $inf->num_attempts = 0;
                if ($inf->save()) {
                    $reply = "?????????????? ???????????????????? ???????? ??????:";
                    $this->sendAnswer($reply);
                    return;
                }
            } else if ($this->errorCounter($inf->num_attempts)) {
                $reply = "???? ???????????????????? ???????????? ??????????, ???????????????????? ?????? ??????";
                $this->sendAnswer($reply);
                $inf->num_attempts += 1;
                $inf->save();
            }
            return;
        }

        if (is_null($inf->name)) {

            $inf->num_attempts = 5;
            $inf->name = HtmlPurifier::process($this->update["text"]);
            // $inf->name = $this->update["text"];

            
            try {
                $mail = User::find(1)
                    ->select(['email'])
                    ->one();
                Yii::$app->mailer->compose()
                    // ->setTo($mail['email'])
                    ->setTo($mail['email'])
                    ->setFrom('calligraph@calligraphy-batumi.com')
                    ->setSubject('bot')
                    ->setHtmlBody(
                        "<table style='width: 100%;'>
                            <tr style='background-color: #f8f8f8;'>
                                <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????:</b></td>
                                <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$inf->name}</td>
                            </tr>
                            <tr style='background-color: #f8f8f8;'>
                                <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????????????:</b></td>
                                <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$inf->phone}</td>
                            </tr>
                            <tr style='background-color: #f8f8f8;'>
                                <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????????:</b></td>
                                <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$inf->mail}</td>
                            </tr>
                        </table>")

                    ->send();
            } catch (\Throwable $th) {
                // $model = new TelegramLog();
                // $model->error = json_encode($th->getMessage());
                // $model->save();
            }
            
            if ($inf->save()) {
                $reply = "???????? ???????????? ??????????????";
                $this->sendAnswer($reply);
                $this->user->status = 0;
                try {
                    $this->user->save();
                } catch (\Throwable $th) {
                    // $model = new TelegramLog();
                    // $model->error = json_encode($th->getMessage());
                    // $model->save();
                }
                return;
            } else if ($this->errorCounter($inf->num_attempts)) {
                $reply = "?????????????? ???? ???????????? ??????";
                $this->sendAnswer($reply);
                $inf->num_attempts += 1;
                $inf->save();
            }
            return;
        }
    }

    protected function errorCounter($error)
    {
        if ($error > 2){
            $this->user->status = 0;
            try {
                $this->user->save();
            } catch (\Throwable $th) {
                // $model = new TelegramLog();
                // $model->error = json_encode($th->getMessage());
                // $model->save();
            }
            $this->sendPhoto();
            return 0;
        }
        return 1;
    }

    protected function sendAnswer($answer, $chat_id = null, $reply_markup = null)
    {
        try {
            // Create Telegram API object
            $telegram = new \Longman\TelegramBot\Telegram($this->bot_api_key);

            $result = Request::sendMessage([
                'chat_id' => $chat_id ?? $this->chat_id,
                'text' => $answer,
                'reply_markup' => $reply_markup,
            ]);

        } catch (Longman\TelegramBot\Exception\TelegramException $e) {
            $this->log["error"] = $e->getMessage();
        }
    }

    protected function consultationRequest($flag = self::REQUEST_CONSULTATION_STATUS)
    {
        // $anwer = $flag ? "?????? ???????????????? ???????????????? ?? ????????" : "??????????????????";
        // $this->sendAnswer($anwer);
        try {
            if (isset($this->user->request)) {
                // $request = TelegramWaitingList::find()->where(["user_id" => $this->user->id])->one();
            } else {
                $request = new TelegramWaitingList();
                // $request->user_id = $this->user->id;
                $request->request_time = time();
            }
        } catch (\Throwable $th) {
            Yii::error($th);
        }

        
        $this->user->status = $flag;
        try {
            $this->user->save();


            // $this->text = "???????????????? ?????????? ???????????? ?????????????????? ??????????, ???????????????? ?????? ?????????????? ??????????????????????";
            if ($flag) {
                $this->user->link('request', $request);
                // $request->save();
            } else {
                // $request->delete();
                $this->user->request->delete();
                $admin = TelegramAdmin::find()->where(["current_user_id" => $this->chat_id])->one();
                $admin->current_user_id = null;
                $admin->save();
            }
        } catch (\Throwable $th) {
            Yii::error($th);
        }

        $admins = TelegramUser::find()->where(['status' => self::ADMINISTRATOR_STATUS])->all();
        $user = $this->user->first_name ?? $this->user->username;

        if (TelegramUser::find()->where(['status' => self::ADMINISTRATOR_STATUS])->exists() && $flag === 2) {
            $this->text = "???????????????? ?????????? ???????????? ?????????????????? ??????????, ???????????????? ?????? ?????????????? ??????????????????????";
            foreach ($admins as $value) {
                $this->sendAnswer("?????????????????? ??????????????????: ???????????????????????? {$user} ???????????????? ????????????????????????", $value->id);
            }
        } else {
            foreach ($admins as $value) {
                $this->sendAnswer("?????????????????? ??????????????????: ???????????????????????? {$user} ?????????? ???? ????????", $value->id);
            }
        }
        return;
    }

    protected function canAdmin()
    {
        if (isset($this->user->admin))
        return true;
    }

    protected function isAdmin()
    {
        if ($this->user->status === self::ADMINISTRATOR_STATUS)
        return true;
    }

    protected function switchAdmin($flag = self::ADMINISTRATOR_STATUS)
    {
        if (!isset($this->user->admin))
        return false;

        try {
            $this->user->status = $flag;
            $this->user->save();
            $this->log["query"] .= "{$flag}|";
        } catch (\Throwable $th) {
            Yii::error($th);
        }
        // $anwer = $flag ? "??????????????????" : "????????????????";
        // $this->sendAnswer($anwer);
    }

    protected function isAdminCommand($command)
    {
        if ((($command["text"] ?? "") == "???????????? ????????????????") && TelegramUser::find()->where(['status' => self::REQUEST_CONSULTATION_STATUS])->exists()) {
            $users = TelegramUser::find()->where(['status' => self::REQUEST_CONSULTATION_STATUS])->all();

            $reply_markup["inline_keyboard"] = [];
            foreach ($users as $value) {
                if (isset($value->operator->current_user_id))
                    continue;
                // $reply_markup["inline_keyboard"]["text"] = $value->first_name;
                // $reply_markup["inline_keyboard"]["callback_data"] = $value->id;
                $reply_markup["inline_keyboard"][] = [["text" => $value->first_name, "callback_data" => $value->id]];
            }
            // $this->sendAnswer(json_encode($reply_markup), $this->chat_id);
            $this->sendAnswer("???????????? ????????????????:", $this->chat_id, json_encode($reply_markup));
            return true;
        }

        if ((($command["text"] ?? "") == "?????????????????? ??????")) {
            if (isset($this->user->admin->current_user_id)) {
                $this->sendAnswer("???????????? ????????????????", $this->user->admin->current_user_id);
                $user = $this->getUserById($this->user->admin->current_user_id);
                try {
                    $user->status = self::REQUEST_STATUS;
                    $user->request->delete();
                    $user->save();
                    $admin = TelegramAdmin::find($this->chat_id)->one();
                    $admin->current_user_id = null;
                    $admin->save();
                } catch (\Throwable $th) {
                    Yii::error($th);
                }
                $this->adminRiply("?????? ?? ?????????????????????????? ????????????????");
            }
            return true;
        }

        // if ((($command["text"] ?? "") == "?????????????????????????? ????????????????????????")) {
        //     if (isset($this->user->admin->current_user_id)) {
        //         $user = $this->getUserById($this->user->admin->current_user_id);
        //         try {
        //             $user->status = self::BANNED;
        //             $user->save();
        //             $admin = TelegramAdmin::find($this->chat_id)->one();
        //             $admin->current_user_id = null;
        //             $admin->save();
        //         } catch (\Throwable $th) {
        //             Yii::error($th);
        //         }
        //         $this->adminRiply("???????????????????????? ????????????????????????");
        //     }
        //     return true;
        // }

        if ((($command["text"] ?? "") == "?????????? ???? ????????")) {
            try {
                $admin = TelegramAdmin::find($this->chat_id)->one();
                $admin->current_user_id = null;
                $admin->save();
            } catch (\Throwable $th) {
                Yii::error($th);
            }
            $this->adminRiply("???? ?????????? ???? ????????");
            return true;
        }

        if (isset($command["data"])) {
            if (TelegramAdmin::find()->where(["current_user_id" => 5369774973])->exists()) {
                $this->sendAnswer("???????????????????????? ?????? ?????????????????? ?? ??????????????????");
                return true;
            }
            try {
                $admin = TelegramAdmin::find($this->chat_id)->one();
                $admin->current_user_id = $command["data"];
                $admin->save();
            } catch (\Throwable $th) {
                Yii::error($th);
            }
            $reply_markup = '{
                "resize_keyboard": true,
                "keyboard": [
                    [
                    {
                        "text": "?????????????????? ??????"
                    },
                    {
                        "text": "?????????? ???? ????????"
                    }]
                ]
            }';

            $history = $this->getHistory($this->user->admin->current_user_id);
            if (empty($history)) $history = "?????? ??????????????";
            $this->sendAnswer($history, $this->chat_id, $reply_markup);
            
            return true;
        }
    }

    protected function getHistory($id)
    {
        $history = TelegramChat::find()->where(["user_id" => $id])->orderBy(['id' => SORT_DESC])->limit(10)->all();

        $arr = [];
        foreach ($history as $value) {
            $arr[] = Yii::$app->formatter->asDate($value->created_at, 'php:d.m.y h:i') . ": " . $value->text;
        }

        $text = implode(PHP_EOL, array_reverse($arr));

        return mb_substr($text, -2000);
    }

    protected function adminRiply($message, $chat_id = null, $reply_markup = null){
        $reply_markup = $reply_markup ?? '{
            "resize_keyboard": true,
            "keyboard": [
                [
                {
                    "text": "???????????? ????????????????"
                },
                {
                    "text": "exit"
                }]
            ]
        }';
        $this->sendAnswer($message, $chat_id ?? $this->chat_id, $reply_markup);

    }

    public function actionTest()
    {
        // $this->getUserById(1070950185);

        // $this->getUserById(5369774973);

        // operator

        

        // $users = TelegramUser::find()->where(['status' => self::REQUEST_CONSULTATION_STATUS])->all();

        // foreach ($users as $value) {
        //     var_dump('<pre>');
        //     var_dump();
        //     var_dump('</pre>');
        //     // die;
        // }

        // echo $this->getHistory();
        // try {
            
        //     $this->user->request->delete();
        // } catch (\Throwable $th) {
        //     // Yii::error($th);
        //     var_dump($th);
            
        // }
        // var_dump('<pre>');
        // var_dump(isset($this->user->admin->currentUser->status));
        // var_dump('</pre>');
        die;
        
        $this->consultationCommunication();
        die;
        return;
    }

    protected function consultationCommunication()
    {
        $current_user_id = $this->user->admin->current_user_id ?? null;
        if ($current_user_id == 536977497311 || $current_user_id == 536977497322) {
            $this->sendAnswer("????????", $this->chat_id);
            return;
        }

        if (isset($this->user->admin->currentUser->status) && $this->user->admin->currentUser->status !== self::REQUEST_CONSULTATION_STATUS) {
            $this->sendAnswer("???????? ?????????????? ??????");
            return;
        }

        try {
            $log = new Log();
            $log->name = "currentUser->status";
            // $log->error = json_encode(isset($this->user->admin->currentUser));
            $log->error = isset($this->user->admin);
            // $log->value = $this->user->admin->currentUser->status;

            $log->save();
        } catch (\Throwable $th) {
            Yii::error($th);
        }

        // if (TelegramUser::find()->where(["id" => $this->user->admin->current_user_id])->one()->status == REQUEST_CONSULTATION_STATUS)

        if (isset($this->user->admin->id)) {
            $this->sendAnswer($this->update['text'], $current_user_id);
        } else if(isset($this->user->operator->user_id)){
            $this->sendAnswer($this->update['text'], $this->user->operator->user_id);
        }
        $this->saveAnswer($this->update['text'], $current_user_id ?? null);
        return;
    }

    private function saveAnswer($answer, $user_id = null)
    {

        $chat = new TelegramChat();
        $chat->user_id = $user_id ?? $this->user->id;
        $chat->text = isset($user_id) ? "{$this->user->first_name}:{$answer}" : "????????????:{$answer}";
        $chat->type = isset($user_id) ? 1 : 0;
        if ($chat->save()) return;

        $log = new Log();
        $log->name = "bot";
        $log->error = "save chat error";
        try {
            $log->save();
        } catch (\Throwable $th) {
            //throw $th;
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
        //             'caption' => '???Grand Maison???',
        //             'reply_markup' => array(
        //                 'inline_keyboard' => array(
        //                     '0' => array(
        //                         '0' => array(
        //                             'text' => '?????????? 1',
        //                             'callback_data' => 'ansv-1'
        //                         ),
        //                         '1' => array(
        //                             'text' => '?????????? 2',
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
        //         ['text' => '?????????? ????????????????', 'callback_data' => '1'],
        //         ['text' => '??????????????????????', 'callback_data' => '2'],
        //     ],
        //     [
        //         ['text' => '??????????', 'callback_data' => '3'],
        //         ['text' => '????????', 'callback_data' => '4'],
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
        //             ['text' => '???????????? 1'],
        //             ['text' => '???????????? 2'],
        //         ],
        //     ],
        //     'inline_keyboard' => [
        //         [
        //             ['text' => '?????????? 1', 'callback_data' => 'ansv-1'],
        //             ['text' => '?????????? 2', 'callback_data' => 'ansv-2'],
        //         ],
        //     ],
        // ]

        // [
        //     'resize_keyboard' => true,
        //     'keyboard' => [
        //         [
        //             ['text' => '?? ?????????????????????? ?? ??????????????'],
        //         ],
        //         [
        //             ['text' => '?????????????? ????'],
        //             ['text' => '????????????????'],
        //             ['text' => '??????????'],
        //         ],
        //     ]
        // ];

        // $method = 'sendMessage';
        // $send_data = [
        //     'text'   => "?????? ?????? ???????????? $text",
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
        //     'text'   => '?????? ?????? ????????????',
        //     'reply_markup' => [
        //         'resize_keyboard' => true,
        //         'keyboard' => [
        //             [
        //                 ['text' => '??????????'],
        //                 ['text' => '???????????? 2'],
        //             ],
        //             [
        //                 ['text' => '???????????? 3'],
        //                 ['text' => '???????????? 4'],
        //             ]
        //         ]
        //     ]
        // ];

        // # ?????????????????? ???????????? ????????????????????????
        // $send_data['chat_id'] = $data['chat']['id'];

        // $res = sendTelegram($method, $send_data, $bot_api_key);
        // $model->data1 = json_encode($message);
        // $model->data2 = json_encode($res);
        // $model->save();
        // return;
    }
}