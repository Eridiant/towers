<?php
if (\frontend\models\Key::find()->where(['key' => 'mail'])->one()) {
    $key = \frontend\models\Key::find()->where(['key' => 'mail'])->one();
    $mail = $key->password;
}
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' =>[
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'hostde14.fornex.org',
                'username' => 'calligraph@calligraphy-batumi.com',
                'password' => $mail ?? "",
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'languageSelector' => [
            'class' => 'common\components\LanguageSelector',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    // исходный язык, на котором изначально
                    // написаны фразы в приложении
                    'sourceLanguage' => 'ru-RU',
                    'sourceMessageTable' => '{{%lg_source_message}}',
                    'messageTable' => '{{%lg_message}}'
                ],
            ],
        ],
    ],
];
