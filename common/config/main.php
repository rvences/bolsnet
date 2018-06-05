<?php
return [
    'name' => 'Bolsa de Trabajo',
    'language' => 'es',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                  'sourcePath' => '../../frontend/web/css/',
                    'css' => ['css.css']
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'correo.nibira.com',  // ej. smtp.mandrillapp.com o smtp.gmail.com
                'username' => 'bolsnet@nibira.com',
                'password' => 'xalapa',
                'port' => '587', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs

            ],
            'useFileTransport' => false,
        ],
    ],

];
