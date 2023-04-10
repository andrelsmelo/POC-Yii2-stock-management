<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dhWnhPdQvUzXedojPnci3Bfe9rNyubGk',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //Categorias
                'category/index' => 'category/index',
                'category/create' => 'category/create',
                'category/update/<id:\d+>' => 'category/update',
                'category/delete/<id:\d+>' => 'category/delete',
                'category/<id:\d+>' => 'category/view',
                'category' => 'category/index',
                //Produtos
                'product/index' => 'product/index',
                'product/create' => 'product/create',
                'product/update/<id:\d+>' => 'product/update',
                'product/delete/<id:\d+>' => 'product/delete',
                'product/<id:\d+>' => 'product/view',
                'product' => 'product/index',
                //Fornecedor
                'supplier/index' => 'supplier/index',
                'supplier/create' => 'supplier/create',
                'supplier/update/<id:\d+>' => 'supplier/update',
                'supplier/delete/<id:\d+>' => 'supplier/delete',
                'supplier/<id:\d+>' => 'supplier/view',
                'supplier' => 'supplier/index',
                //Estoque
                'stock/index' => 'stock/index',
                'stock/create' => 'stock/create',
                'stock/update/<id:\d+>' => 'stock/update',
                'stock/delete/<id:\d+>' => 'stock/delete',
                'stock/<id:\d+>' => 'stock/view',
                'stock' => 'stock/index',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
