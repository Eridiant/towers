<?php
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
                'host' => 'smtp.beget.com',
                'username' => 'calligraphy@calligraphy-batumi.com',
                'password' => '0239qgsl2A',
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
