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
    ],
];
