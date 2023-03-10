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
use AmoCRM\OAuth2\Client\Provider\AmoCRM;

use \AmoCRM\Collections\CustomFieldsValuesCollection;
use \AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use \AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use \AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;

use \AmoCRM\Models\CustomFieldsValues\MultitextCustomFieldValuesModel;
use \AmoCRM\Models\CustomFieldsValues\ValueCollections\MultitextCustomFieldValueCollection;
use \AmoCRM\Models\CustomFieldsValues\ValueModels\MultitextCustomFieldValueModel;

use \AmoCRM\Collections\ContactsCollection;
use \AmoCRM\Models\ContactModel;

use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Feedback;
use frontend\models\UserIp;
use frontend\models\SxGeo;
use frontend\models\Key;
use frontend\models\Log;
use yii\web\HttpException;

use League\OAuth2\Client\Grant\AuthorizationCode;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $bodyClass;
    private $formName;
    private $formFields = [];

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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

    // public function events()
	// {
	// 	return [Controller::EVENT_BEFORE_ACTION => 'beforeAction',
	// 			Controller::EVENT_AFTER_ACTION=>'afterAction'];
	// }

    // public function afterAction($event)
    // {
    //     $sdf = 5;
        
    // }

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

        $this->bodyClass = 'wh index';

        return $this->render('index', compact('model'));
    }

    private function country($ip)
    {
        $country = new SxGeo(Yii::getAlias('@webroot') . '/dat/SxGeo.dat', SXGEO_BATCH | SXGEO_MEMORY);

        return $country->getCountry($ip);
    }

    private function geoCity($ip)
    {
        $country = new SxGeo(Yii::getAlias('@webroot') . '/dat/SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);

        return $country->getCityFull($ip);
    }

    public function actionAmocrms()
    {

        $keys = Key::find()->where(['id' => 1])->one();

        $request = Yii::$app->request;

        // $provider = new AmoCRM([
        //     'clientId' => $keys->value,
        //     // 'clientId' => $keys->login,
        //     'clientSecret' => $keys->password,
        //     'redirectUri' => 'https://calligraphy-batumi.com/amocrms',
        // ]);

        // $accessToke = $this->getToken();
        // var_dump('<pre>');
        // var_dump($accessToke->hasExpired());
        // var_dump('</pre>');
        // die;

        $apiClient = new \AmoCRM\Client\AmoCRMApiClient($keys->value, $keys->password, 'https://calligraphy-batumi.com/amocrms');

        $accessToken = $this->getToken();
        // $baseDomain = $provider->getBaseDomain();
        $baseDomain = $accessToken->getValues()['baseDomain'];
        $apiClient->setAccessToken($accessToken)
                ->setAccountBaseDomain($baseDomain);

        if ($accessToken->hasExpired()) {
            $apiClient->onAccessTokenRefresh(
                function (\League\OAuth2\Client\Token\AccessTokenInterface $accessToken, string $baseDomain) {
                    $this->saveToken(
                        [
                            'accessToken' => $accessToken->getToken(),
                            'refreshToken' => $accessToken->getRefreshToken(),
                            'expires' => $accessToken->getExpires(),
                            'baseDomain' => $baseDomain,
                        ]
                    );
                }
            );
        }

        // $this->formFields["1092497"] = "name";
        // $this->formFields["1092577"] = "phone";
        // $this->formFields["1092579"] = "email";
        // $this->formFields["1092595"] = "country";
        // $this->formFields["1092597"] = "by_ip";
        

        // $cookies = Yii::$app->request->cookies;
        // $this->formFields["1019757"] = $cookies->getValue('referrer', '');
        // $this->formFields["1019745"] = $cookies->getValue('utm_source', '');
        // $this->formFields["1019747"] = $cookies->getValue('utm_medium', '');
        // $this->formFields["1019749"] = $cookies->getValue('utm_campaign', '');
        // $this->formFields["1019751"] = $cookies->getValue('utm_term', '');
        // $this->formFields["1019753"] = $cookies->getValue('utm_content', '');
        // $this->formFields["1019755"] = $cookies->getValue('utm_referrer', '');
        // $this->formFields["1019763"] = $cookies->getValue('fb_cl_id', '');
        // $this->formFields["1019759"] = $cookies->getValue('g_client_id', '');
        // $this->formFields["1019761"] = $cookies->getValue('g_cl_id', '');
        // $this->formFields["1019757"] = $_COOKIE["referrer"] ?? "";
        $this->formFields["1019745"] = $_COOKIE["utm_source"] ?? "";
        $this->formFields["1019747"] = $_COOKIE["utm_medium"] ?? "";
        $this->formFields["1019749"] = $_COOKIE["utm_campaign"] ?? "";
        $this->formFields["1019751"] = $_COOKIE["utm_term"] ?? "";
        $this->formFields["1019753"] = $_COOKIE["utm_content"] ?? "";
        $this->formFields["1019755"] = $_COOKIE["utm_referrer"] ?? "";
        $this->formFields["1019763"] = $_COOKIE["fb_cl_id"] ?? "";
        $this->formFields["1019759"] = $_COOKIE["g_client_id"] ?? "";
        $this->formFields["1019761"] = $_COOKIE["g_cl_id"] ?? "";

        // $accessToke = $this->getToken();


        if (!count($this->formFields))
            return;

        $leadsService = $apiClient->leads();
        $lead = new \AmoCRM\Models\LeadModel();

        $leadCustomFieldsValues = new CustomFieldsValuesCollection();

        foreach ($this->formFields as $field => $value) {
            $textCustomFieldValueModel = new TextCustomFieldValuesModel();
            $textCustomFieldValueModel->setFieldId($field);
            $textCustomFieldValueModel->setValues(
                (new TextCustomFieldValueCollection())
                    ->add((new TextCustomFieldValueModel())->setValue($value))
            );
            $leadCustomFieldsValues->add($textCustomFieldValueModel);
            $lead->setCustomFieldsValues($leadCustomFieldsValues);
        }

        switch ($this->formName) {
            case 'pop-up':
                $formName = "Pop-up";
                break;

            case 'promotion':
                $formName = "Pop-up ?? ??????????????????";
                    break;

            default:
                $formName = "???????????? ?????????????????? ??????????";
                break;
        }
        $lead->setName($formName)
            ->setPipelineId(5138575);

        try {
            $lead = $leadsService->addOne($lead);
        } catch (\AmoCRM\ExceptionsAmoCRMApiException $e) {
            throw $e;
            return 0;
        }

        return 10;

        // add contact
        // ->setContacts(
        //     (new ContactsCollection())
        //         ->add(
        //             (new ContactModel())
        //                 ->setFirstName("name")
        //                 // ->setLastName($externalLead['contact']['last_name'])
        //                 ->setCustomFieldsValues(
        //                     (new CustomFieldsValuesCollection())
        //                         ->add(
        //                             (new MultitextCustomFieldValuesModel())
        //                                 ->setFieldCode('PHONE')
        //                                 ->setValues(
        //                                     (new MultitextCustomFieldValueCollection())
        //                                         ->add(
        //                                             (new MultitextCustomFieldValueModel())
        //                                                 ->setValue(125545122410)
        //                                         )
        //                                 )
        //                         )
                                // ->add(
                                //     (new MultitextCustomFieldValuesModel())
                                //         ->setFieldCode('PHONE')
                                //         ->setValues(
                                //             (new MultitextCustomFieldValueCollection())
                                //                 ->add(
                                //                     (new MultitextCustomFieldValueModel())
                                //                         ->setValue(125545122410)
                                //                 )
                                //         )
                                // )
        //                 )
        //         )
        // )
        //end contact




        // $lead = new \AmoCRM\Models\LeadModel();

        // var_dump('<pre>');
        // var_dump($accessToke->hasExpired());
        // var_dump($lead);
        // var_dump($lead->toArray());
        // var_dump('1678116606');
        // var_dump($accessToke->getToken());
        // var_dump($accessToke->getExpires());
        // var_dump($provider->getBaseDomain());
        // var_dump($provider->urlAccount());
        // var_dump($accessToke->getRefreshToken());
        // var_dump('</pre>');

        // die;

        // $provider->setBaseDomain('www.kommo.com');
        // if ($request->post()) {
        //     $accessToken = $provider->getAccessToken(new \League\OAuth2\Client\Grant\AuthorizationCode(), [
        //         'code' => $request->post('code'),
        //     ]);
        // }

        // if ($request->get()) {
        //     $accessToken = $provider->getAccessToken(new \League\OAuth2\Client\Grant\AuthorizationCode(), [
        //         'code' => $request->get('code'),
        //     ]);
        // }


        if (isset($_GET['referer'])) {
            $provider->setBaseDomain($_GET['referer']);
        }
        
        if (!isset($_GET['request']) && false) {
            if (!isset($_GET['code'])) {
                /**
                 * ???????????? ???????????????????? ???????????? ?????????????????????? ?????? ???????????????? ???????????? ?????? ??????????????????????
                 * ????-?????????????????? - ???????????????????? ????????????
                 */
                $session = Yii::$app->session;
                $session->set('oauth2state', bin2hex(random_bytes(16)));
                // $_SESSION['oauth2state'] = bin2hex(random_bytes(16));
                // var_dump($_SESSION['oauth2state']);
                
                if (false) {
                    echo '<div>
                        <script
                            class="kommo_oauth"
                            charset="utf-8"
                            data-client-id="' . $provider->getClientId() . '"
                            data-title="Button"
                            data-compact="false"
                            data-class-name="className"
                            data-color="default"
                            data-state="' . $_SESSION['oauth2state'] . '"
                            data-error-callback="handleOauthError"
                            src="https://www.kommo.com/auth/button.js"
                        ></script>
                        </div>';
                    echo '<script>
                    handleOauthError = function(event) {
                        alert(\'ID ?????????????? - \' + event.client_id + \' ???????????? - \' + event.error);
                    }
                    </script>';
                    die;
            } else {
                    $authorizationUrl = $provider->getAuthorizationUrl(['state' => $_SESSION['oauth2state']]);
                    header('Location: ' . $authorizationUrl);
                }
            } elseif (empty($_GET['state']) || empty($_SESSION['oauth2state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
                unset($_SESSION['oauth2state']);
                exit('Invalid state');
            }
        
            /**
             * ?????????? ???????????????? ??????
             */
            try {
                /** @var \League\OAuth2\Client\Token\AccessToken $access_token */
                $accessToken = $provider->getAccessToken(new \League\OAuth2\Client\Grant\AuthorizationCode(), [
                    'code' => $_GET['code'],
                ]);

                if (!$accessToken->hasExpired()) {
                    $this->saveToken([
                        'accessToken' => $accessToken->getToken(),
                        'refreshToken' => $accessToken->getRefreshToken(),
                        'expires' => $accessToken->getExpires(),
                        'baseDomain' => $provider->getBaseDomain(),
                    ]);
                }
            } catch (Exception $e) {
                die((string)$e);
            }
        
            /** @var \AmoCRM\OAuth2\Client\Provider\AmoCRMResourceOwner $ownerDetails */
            $ownerDetails = $provider->getResourceOwner($accessToken);
        
            printf('Hello, %s!', $ownerDetails->getName());
        } else {
            $accessToken = $this->getToken();
        
            $provider->setBaseDomain($accessToken->getValues()['baseDomain']);

            /**
             * ?????????????????? ?????????????? ???? ?????????? ?? ???????????? ???????????? ?????? ?????????????????? ??????????
             */

            if ($accessToken->hasExpired()) {
                /**
                 * ???????????????? ?????????? ???? ??????????????
                 */

                try {
                    $accessToken = $provider->getAccessToken(new \League\OAuth2\Client\Grant\RefreshToken(), [
                        'refresh_token' => $accessToken->getRefreshToken(),
                    ]);

                    $this->saveToken([
                        'accessToken' => $accessToken->getToken(),
                        'refreshToken' => $accessToken->getRefreshToken(),
                        'expires' => $accessToken->getExpires(),
                        'baseDomain' => $provider->getBaseDomain(),
                    ]);
        
                } catch (Exception $e) {
                    die((string)$e);
                }
            }
        
            $token = $accessToken->getToken();

            try {
                /**
                 * ???????????? ???????????? ?? ??????
                 */
                $data = $provider->getHttpClient()
                    ->request('GET', $provider->urlAccount() . 'api/v2/account', [
                        'headers' => $provider->getHeaders($accessToken)
                    ]);

                $parsedBody = json_decode($data->getBody()->getContents(), true);

                printf('ID ???????????????? - %s, ???????????????? - %s', $parsedBody['id'], $parsedBody['name']);
            } catch (GuzzleHttp\Exception\GuzzleException $e) {
                var_dump((string)$e);
            }
        }

        return;
        // AmoCRM
    }

    protected function saveToken($accessToken)
    {
        if (
            isset($accessToken)
            && isset($accessToken['accessToken'])
            && isset($accessToken['refreshToken'])
            && isset($accessToken['expires'])
            && isset($accessToken['baseDomain'])
        ) {
            $data = [
                'accessToken' => $accessToken['accessToken'],
                'expires' => $accessToken['expires'],
                'refreshToken' => $accessToken['refreshToken'],
                'baseDomain' => $accessToken['baseDomain'],
            ];

            // file_put_contents(TOKEN_FILE, json_encode($data));
            $key = Key::find()->where(['key' => 'date'])->one();
            $key->value = json_encode($data);
            $key->save();
        } else {
            exit('Invalid access token ' . var_export($accessToken, true));
        }
    }

    /**
     * @return \League\OAuth2\Client\Token\AccessToken
     */
    protected function getToken()
    {
        // $accessToken = json_decode(file_get_contents(TOKEN_FILE), true);
        
        $key = Key::find()->where(['key' => 'date'])->one();
        $accessToken = json_decode($key->value, true);
        if (
            isset($accessToken)
            && isset($accessToken['accessToken'])
            && isset($accessToken['refreshToken'])
            && isset($accessToken['expires'])
            && isset($accessToken['baseDomain'])
        ) {
            return new \League\OAuth2\Client\Token\AccessToken([
                'access_token' => $accessToken['accessToken'],
                'refresh_token' => $accessToken['refreshToken'],
                'expires' => $accessToken['expires'],
                'baseDomain' => $accessToken['baseDomain'],
            ]);
        } else {
            exit('Invalid access token ' . var_export($accessToken, true));
        }
    }

    public function actionAjax()
    {

        $mail = User::find(1)
            ->select(['email'])
            ->one();

        $model = new Feedback();

        $request = Yii::$app->request;
        
        if ($request->isPost) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $this->formName = $request->post("body") ?? "";
            $model->name = $this->formFields["1092497"] = $request->post("name");
            $model->phone = $this->formFields["1092577"] = $request->post("phone");
            $model->email = $this->formFields["1092579"] = $request->post("email");
            $model->country = $this->formFields["1092595"] = $request->post("country");
            $model->viewed = $request->post("viewed") == "on" ? 1 : 0;
            $model->lang = Yii::$app->language;
            $ip = $request->userIP;
            $country = $this->geoCity($ip);
            $cntr = '';
            $sity = '';
            if ($country) {
                $cntr = $country["country"]["name_ru"];
                $sity = $country["city"]["name_ru"];
                $this->formFields["1092597"] = implode(",", [$cntr, $sity]);
            }
            $model->body = $request->post("body") . "," . $cntr . "," . $sity;

            $sending_status = 0;
            try {Yii::$app->mailer->compose()
                // ->setTo($mail['email'])
                ->setTo($mail['email'])
                ->setFrom('calligraph@calligraphy-batumi.com')
                ->setSubject('????????????')
                ->setHtmlBody(
                    "<table style='width: 100%;'>
                        <tr style='background-color: #f8f8f8;'>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????:</b></td>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$request->post('name')}</td>
                        </tr>
                        <tr style='background-color: #f8f8f8;'>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????????????:</b></td>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$request->post('phone')}</td>
                        </tr>
                        <tr style='background-color: #f8f8f8;'>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>????????????:</b></td>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$request->post('country')}</td>
                        </tr>
                        <tr style='background-color: #f8f8f8;'>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>{$ip}</b></td>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$cntr},{$sity}</td>
                        </tr>
                        <tr style='background-color: #f8f8f8;'>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>??????????:</b></td>
                            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{$request->post('email')}</td>
                        </tr>
                    </table>")

                ->send();
                $sending_status = 1;
            } catch (\Throwable $th) {
                throw $th;
            }

            $model->sending_status = $sending_status;
            $model->sending_status += $this->actionAmocrms();

            if($model->save()){
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

    public function actionLts()
    {
        $request = Yii::$app->request;
        // $cookies = Yii::$app->request->cookies;
        // $currentLang = $request->cookies->getValue('_locale', 'en-US');

        if ($request->isAjax){
            $slug = $request->post('slug');
            if ($slug === 'block-A') {
                $rds = $this->renderPartial('a');
            }

            if ($slug === 'block-B') {
                $rds = $this->renderPartial('b');
            }

            if ($slug === 'block-C') {
                $rds = $this->renderPartial('c');
            }

            if ($slug === 'block-G') {
                $rds = $this->renderPartial('g');
            }
            
            // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $summ = json_encode(['rds' => $rds]);
            return $rds;
        }

    }

    public function actionSwiper()
    {
        $this->layout = ('@app/views/layouts/swiper');
        return $this->render('swiper');
        // return $this->render('swiper', compact('model'));
    }

    public function actionPrice()
    {
        $this->layout = ('@app/views/layouts/price');

        
        // $model = Yii::$app->db->createCommand('SELECT MIN(floor_num) AS min_floor, MAX(floor_num) AS max_floor, MAX(money_wh_m) AS max_white, MAX(money_m) AS max_turnkey, MAX(en) AS area
        // FROM {{%apartments_c}}
        // -- GROUP BY money_m
        // GROUP BY en, money_m
        // ORDER BY en
        // ')->queryAll();


        $model = Yii::$app->db->createCommand('SELECT MIN(floor_num) AS min_floor, MAX(floor_num) AS max_floor, MAX(money_wh_m) AS max_white, MAX(money_m) AS max_turnkey, MAX(en) AS area
        FROM {{%apartments_c}}
        -- GROUP BY money_m
        GROUP BY en, money_m
        ORDER BY en
        ')->queryAll();
        // var_dump('<pre>');
        // var_dump($model);
        // var_dump('</pre>');
        // die;
        

        // $model = Yii::$app->db->createCommand('SELECT  MIN(floor_num) AS min_floor, MAX(floor_num) AS max_floor, MAX(money_wh_m) AS max_white, MAX(money_m) AS max_turnkey, MAX(en) AS area
        // FROM {{%apartments_c}}
        // WHERE floor_num IN (SELECT MIN(floor_num)
        // FROM {{%apartments_c}}
        // GROUP BY money_m)
        // GROUP BY floor_num, en
        // ')->queryAll();


        return $this->render('price', compact('model'));
    }

    public function actionLayouts($id = 1, $lgg = null, $slug = null, $flr = null)
    {

        $request = Yii::$app->request;
        // $cookies = Yii::$app->request->cookies;
        // $currentLang = $request->cookies->getValue('_locale', 'en-US');

        if ($request->isAjax){
            $slug = $request->post('slug');
            if ($request->post('floor')) {
                $id = $request->post('floor');
            }
        }

        if ($slug === 'block-A' || $slug == NULL) {
            $block = 'a';
            $blocks = FloorA::find()->all();
            if ($flr === null) {
                $floor = FloorA::find()
                    ->where('id=:id')
                    ->addParams([':id' => $id])
                    ->one();
            } else {
                $floor = FloorA::find()
                    ->where('floor=:floor')
                    ->addParams([':floor' => preg_replace("/[^0-9]/", '', $flr)])
                    ->one();
                if ($floor === null) {
                    throw new HttpException(404, '?????????????????????? ???????????????? ???? ??????????????');
                }
            }
            
            $model = ApartmentsA::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor])
                    ->asArray()
                    ->all();
            $mod = ApartmentsA::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor]);
            $rd = $this->renderPartial('_a');
            $rds = $this->renderPartial('a');
        }

        if ($slug === 'block-B') {
            $block = 'b';
            $blocks = FloorB::find()->all();
            if ($flr === null) {
                $floor = FloorB::find()
                    ->where('id=:id')
                    ->addParams([':id' => $id])
                    ->one();
            } else {
                $floor = FloorB::find()
                    ->where('floor=:floor')
                    ->addParams([':floor' => preg_replace("/[^0-9]/", '', $flr)])
                    ->one();
                if ($floor === null) {
                    throw new HttpException(404, '?????????????????????? ???????????????? ???? ??????????????');
                }
            }
            
            $model = ApartmentsB::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor])
                    ->asArray()
                    ->all();
            $mod = ApartmentsB::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor]);
            $rd = $this->renderPartial('_b');
            $rds = $this->renderPartial('b');
        }

        if ($slug === 'block-C') {
            $block = 'c';
            // for del
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
            $mod = ApartmentsB::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor]);
            // $blocks = FloorC::find()->all();
            // $floor = FloorC::find()
            //         ->where('id=:id')
            //         ->addParams([':id' => $id])
            //         ->one();
            // $model = ApartmentsC::find()
            //         ->where('floor_num=:floor_num')
            //         ->addParams([':floor_num' => $floor->floor])
            //         ->asArray()
            //         ->all();
            // $mod = ApartmentsC::find()
            //         ->where('floor_num=:floor_num')
            //         ->addParams([':floor_num' => $floor->floor]);
            $rd = $this->renderPartial('_c');
            $rds = $this->renderPartial('c');
        }

        if ($slug === 'block-G') {

            $block = 'g';
            $blocks = FloorC::find()->all();
            if ($flr === null) {
                $floor = FloorC::find()
                    ->where('id=:id')
                    ->addParams([':id' => $id])
                    ->one();
            } else {
                $floor = FloorC::find()
                    ->where('floor=:floor')
                    ->addParams([':floor' => preg_replace("/[^0-9]/", '', $flr)])
                    ->one();
                if ($floor === null) {
                    throw new HttpException(404, '?????????????????????? ???????????????? ???? ??????????????');
                }
            }

            // var_dump('<pre>');
            // var_dump($blocks);
            // var_dump('</pre>');
            // die;

            $model = ApartmentsC::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor])
                    ->asArray()
                    ->all();
            $mod = ApartmentsC::find()
                    ->where('floor_num=:floor_num')
                    ->addParams([':floor_num' => $floor->floor]);
            $rd = $this->renderPartial('_g');
            $rds = $this->renderPartial('g');
        }

        $status = [];
        foreach ($model as $key => $value) {
            $status[$key] = $this->translate($value["status"], $request->post('lgg'));

            // $state[$value["num"]] = $value;
            // switch ($value["status"]) {
            //     case '1':
            //         $status[$key] = Yii::t('frontend', '??????????????????????????????');
            //         break;
            //     case '2':
            //         $status[$key] = Yii::t('frontend', '??????????????');
            //         break;
            //     default:
            //         $status[$key] = Yii::t('frontend', '????????????????');
            //         break;
            // }

        }
        

        // $min = $mod->min('money');
        $flats = $mod->count();
        $flats_free = $mod->andWhere(['status' => 0])->count();

        // $model = json_encode($model);
        // $blocks = json_encode($blocks);
        
        if ($request->isAjax){
            $summ = json_encode(['model' => $model, 'blocks' => $blocks, 'flats' => $flats, 'flats_free' => $flats_free, 'status' => $status, 'rd' => $rd, 'rds' => $rds]);
            // $summ = json_encode(['model'=>$model, 'blocks'=>$blocks]);
            return $summ;
        }


        $summ = json_encode(['model' => $model, 'blocks' => $blocks, 'flats' => $flats, 'flats_free' => $flats_free, 'status' => $status]);

        $floor_img = $this->flrs($block, $id);
        $floor_num = $floor->floor;
        
        $indx = $floor->id - 1;

        $this->bodyClass = 'other bl';

        return $this->render('layouts', compact('model', 'block', 'floor_num', 'floor_img', 'indx', 'summ', 'blocks', 'flats', 'flats_free', 'status'));
    }

    public function flrs($block, $floor)
    {

        $fls = 0;
    
        if ($block === 'a') {
            if (!$floor) return [$block, $fls = 11];
            switch ($floor) {
                case 1:
                    $fls = 11;
                    break;
                case 24:
                    $fls = 34;
                    break;
                case 25:
                    $fls = 35;
                    break;
                default:
                    $fls = 12;
                    break;
            }
        }
        if ($block === 'b') {
            if (!$floor) return [$block, $fls = 2];
            switch ($floor) {
                case 1:
                    $fls = 2;
                    break;
                case 2:
                    $fls = 3;
                    break;
                case 3:
                    $fls = 4;
                    break;
                case 8:
                case 15:
                    $fls = 9;
                    break;
                case 4:
                    $fls = 5;
                    break;
                case 27:
                case 28:
                    $fls = 29;
                    break;
                case 29:
                    $fls = 30;
                    break;
                case 30:
                case 31:
                case 32:
                case 33:
                case 34:
                    $fls = 32;
                    // $fls = 36;
                    break;
                case 35:
                    $fls = 37;
                    break;
                case 36:
                    $fls = 38;
                    break;
                // case 37:
                    // $fls = 38;
                    // break;
                case 23:
                case 24:
                case 25:
                case 26:
                case 37:
                    $fls = 39;
                    break;
                case 38:
                case 39:
                case 40:
                case 41:
                case 42:
                    $fls = 40;
                    break;
                case 43:
                    $fls = 44;
                    break;
                case 44:
                    $fls = 45;
                    break;
                case 45:
                    $fls = 46;
                    break;
                case 46:
                    $fls = 47;
                    break;
                default:
                    $fls = 6;
                    break;
            }
        }
        if ($block === 'g') {
            if (!$floor) return [$block, $fls = 11];
            switch ($floor) {
                case 1:
                    $fls = 11;
                    break;
                case 30:
                    $fls = 40;
                    break;
                case 31:
                    $fls = 41;
                    break;
                default:
                    $fls = 11;
                    break;
            }
        }
    
        return $fls;
    }

    public function translate($key, $lgg)
    {
        $currentLang = $lgg === null ? Yii::$app->language : $lgg;
        if ($key == 1) {
            switch ($currentLang) {
                case 'ru-RU':
                    return '??????????????????????????????';
                    break;
                case 'en-US':
                    return 'reserved';
                    break;
                default:
                    return '?????????????????????';
                    break;
            }
        }
        if ($key == 0) {
            switch ($currentLang) {
                case 'ru-RU':
                    return '????????????????';
                    break;
                case 'en-US':
                    return 'available';
                    break;
                default:
                    return '???????????????????????????????????????';
                    break;
            }
        }
        if ($key == 2) {
            switch ($currentLang) {
                case 'ru-RU':
                    return '??????????????';
                    break;
                case 'en-US':
                    return 'sold';
                    break;
                default:
                    return '?????????????????????';
                    break;
            }
        }
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

    public function actionVideoReport()
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

    public function actionPrivacyPolicy()
    {

        $this->bodyClass = 'other bl';

        return $this->render('policy');
    }

    public function actionContacts()
    {

        $model = new Feedback();

        $this->bodyClass = 'other bl';

        return $this->render('contacts', compact('model'));
    }

    public function actionPdf()
    {
        $request = Yii::$app->request;
        $block = $request->get('block');
        $floor = $request->get('floor');
        $flat = $request->get('flat');
        $img = $request->get('img');
        $view = $request->get('view');

        // ?block=a&floor=11&flat=1
        $model='';
        if ($block === 'a') {
            $model = ApartmentsA::find();
        } elseif ($block === 'b') {
            $model = ApartmentsB::find();
        } elseif ($block === 'g') {
            $model = ApartmentsC::find();
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = $model->where('floor_num=:floor_num')
                        ->addParams([':floor_num' => $floor])
                        ->andWhere('num=:num')
                        ->addParams([':num' => $flat])
                        ->exists();

        if (!$model || $img > 26) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $this->bodyClass = 'other bl';

        return $this->renderPartial('pdf', compact('block', 'floor', 'flat', 'img', 'view'));
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    // public function actionLogin()
    // {
    //     if (!Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }

    //     $model = new LoginForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //         return $this->goBack();
    //     }

    //     $model->password = '';

    //     return $this->render('login', [
    //         'model' => $model,
    //     ]);
    // }

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
    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
    //             Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
    //         } else {
    //             Yii::$app->session->setFlash('error', 'There was an error sending your message.');
    //         }

    //         return $this->refresh();
    //     }

    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    // public function actionSignup()
    // {
    //     $model = new SignupForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->signup()) {
    //         Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
    //         return $this->goHome();
    //     }

    //     return $this->render('signup', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    // public function actionRequestPasswordReset()
    // {
    //     $model = new PasswordResetRequestForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         if ($model->sendEmail()) {
    //             Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

    //             return $this->goHome();
    //         }

    //         Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
    //     }

    //     return $this->render('requestPasswordResetToken', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    // public function actionResetPassword($token)
    // {
    //     try {
    //         $model = new ResetPasswordForm($token);
    //     } catch (InvalidArgumentException $e) {
    //         throw new BadRequestHttpException($e->getMessage());
    //     }

    //     if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
    //         Yii::$app->session->setFlash('success', 'New password saved.');

    //         return $this->goHome();
    //     }

    //     return $this->render('resetPassword', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    // public function actionVerifyEmail($token)
    // {
    //     try {
    //         $model = new VerifyEmailForm($token);
    //     } catch (InvalidArgumentException $e) {
    //         throw new BadRequestHttpException($e->getMessage());
    //     }
    //     if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
    //         Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
    //         return $this->goHome();
    //     }

    //     Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
    //     return $this->goHome();
    // }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    // public function actionResendVerificationEmail()
    // {
    //     $model = new ResendVerificationEmailForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         if ($model->sendEmail()) {
    //             Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
    //             return $this->goHome();
    //         }
    //         Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
    //     }

    //     return $this->render('resendVerificationEmail', [
    //         'model' => $model
    //     ]);
    // }
}
