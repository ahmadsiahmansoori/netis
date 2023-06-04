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
    'modules' => [

        'fanavaran' => [
            'class' => 'app\modules\Fanavaran\Fanavaran',
        ],

        'vehicle' => [
            'class' => 'app\modules\vehicle\Vehicle',
        ],


        'common' => [
            'class' => 'app\modules\common\Common',
        ],


        'thirdParty' => [
            'class' => 'app\modules\thirdParty\ThirdParty',
        ],

        'bodyPart' => [
            'class' => 'app\modules\bodyPart\BodyPart',
        ],

        'order' => [
            'class' => 'app\modules\order\Order',
        ],


        'fileManager' => [
            'class' => 'app\modules\fileManager\FileManager',
        ],


        'payment' => [
            'class' => 'app\modules\payment\Payment',
        ],

    ],
    'components' => [


        'request' => [
            'cookieValidationKey'    => 'xx2QZdKBHravCmHfdsfsvTOnUzRvThAR8PbPV42',
            'parsers' => [
                'multipart/form-data' => 'yii\web\MultipartFormDataParser',
                'application/json' => 'yii\web\JsonParser',
            ],

            'enableCsrfValidation'   => false,
            'enableCookieValidation' => false,


            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Auth',
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
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'order/info' => 'order/info',
                        'common/accessory' => 'common/accessory-kind',
                        'common/additional-cov' => 'common/additional-cov',
                        'common/basic-cov' => 'common/basic-cov',
                        'common/driver-type' => 'common/driver-type',
                        'common/dmg-case-type' => 'common/dmg-case-type',
                        'common/losses-history' => 'common/losses-history',
                        'vehicle/type' => 'vehicle/vehicle-use-type',
                        'vehicle/hull-discount' => 'vehicle/vehicle-hull-discounts',
                        'vehicle/group' =>'vehicle/vehicle-group',
                        'vehicle/system' => 'vehicle/vehicle-system',
                        'vehicle/kind' => 'vehicle/vehicle-kind',
                        'vehicle/fuel' => 'vehicle/vehicle-fuel-type',
                        'plaque/kind' => 'vehicle/plaque-kind',
                        'plaque/letter' => 'vehicle/plaque-letter',
                        'plaque/design' => 'vehicle/plaque-design',
                        'plaque/sample' => 'vehicle/plaque-sample',
                        'common/insurance-corp' => 'common/insurance-corp',
                        'common/has' => 'common/has',
                        'common/country' => 'common/country',
                        'common/province' => 'common/province',
                        'common/city' => 'common/city',
                        'common/area' => 'common/areas',
                        'common/calc' => 'common/calc-kind',
                    ],
                    'except' => ['delete', 'option', 'create', 'update'],
                    'pluralize' => false,

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'third-party/inquiry' => 'thirdParty/inquiry',
                    ],
                    'except' => ['delete' , 'option', 'update'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        "POST insert" => 'insert'
                    ]

                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'body/inquiry' => 'bodyPart/inquiry',
                    ],
                    'except' => ['delete' , 'option', 'update'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        "POST insert" => 'insert'
                    ]

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'order' => 'order/order',
                    ],
                    'except' => ['delete' , 'option', 'update'],
                    'pluralize' => false,
                    'extraPatterns' => [
                        "POST insert" => 'insert'
                    ]

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'third-party' => 'thirdParty/third-party',
                    ],
                    'except' => ['delete' , 'option', 'update'],
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'file' => 'fileManager/file',
                    ],
                    'except' => ['delete', 'index' , 'option', 'update'],
                    'pluralize' => false,
                ],


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
