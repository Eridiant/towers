<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'languageSelector'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<language:(ru|en)>' => 'site/index',
                'index' => 'site/index',
                '<language:(ru|en)>/index' => 'site/index',
                'infrastructure' => 'site/infrastructure',
                '<language:(ru|en)>/infrastructure' => 'site/infrastructure',
                'pdf' => 'site/pdf',
                '<language:(ru|en)>/pdf' => 'site/pdf',
                'layouts' => 'site/layouts',
                '<language:(ru|en)>/layouts' => 'site/layouts',
                'layouts/<slug:[\w-]+>' => 'site/layouts',
                '<language:(ru|en)>/layouts/<slug:[\w-]+>' => 'site/layouts',
                'layouts/<slug:[\w-]+>/<flr:[\w-]+>' => 'site/layouts',
                '<language:(ru|en)>/layouts/<slug:[\w-]+>/<flr:[\w-]+>' => 'site/layouts',
                'gallery' => 'site/gallery',
                '<language:(ru|en)>/gallery' => 'site/gallery',
                'construction-progress' => 'site/construction-progress',
                '<language:(ru|en)>/construction-progress' => 'site/construction-progress',
                'batumi' => 'site/batumi',
                '<language:(ru|en)>/batumi' => 'site/batumi',
                'our-team' => 'site/our-team',
                '<language:(ru|en)>/our-team' => 'site/our-team',
                'video-report' => 'site/video-report',
                '<language:(ru|en)>/video-report' => 'site/video-report',
                'contacts' => 'site/contacts',
                '<language:(ru|en)>/contacts' => 'site/contacts',
                'about' => 'site/about',
                '<language:(ru|en)>/about' => 'site/about',
                'privacy-policy' => 'site/privacy-policy',
                '<language:(ru|en)>/privacy-policy' => 'site/privacy-policy',
                'news' => 'news/index',
                '<language:(ru|en)>/news' => 'news/index',
                '<url:\w+>' => 'page/index',
                'site/set-locale' => 'site/set-locale',
                'news/<slug:[\w-]+>' => 'news/view',
                '<language:(ru|en)>/news/<slug:[\w-]+>' => 'news/view',
                '<controller:\w+>' => '<controller>/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'languageSelector' => [
            'class' => 'common\components\LanguageSelector',
        ],
    ],
    'as locale' => [
        'class' => common\behaviors\LocaleBehavior::class,
        'enablePreferredLanguage' => true
    ], 
    'params' => $params,
];
