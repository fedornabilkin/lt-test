<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'lt-test.ru',
    'language' => 'ru-RU',
    'timeZone' => 'Europe/Moscow',

    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'enableStrictParsing' => false,
            'rules' => [
                'vakansii' => 'vacancy/index',
                'vakansii/<alias:[[^a-zA-Z0-9\-]+>' => 'vacancy/view',
                'kompanii' => 'customer/index',
                'kompanii/<alias:[[^a-zA-Z0-9\-]+>' => 'customer/view',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => []
                ]
            ]
        ],

        'view' => [
            'as seo' => [
                'class' => \fedornabilkin\binds\behaviors\SeoBehavior::class,
            ],
        ],
    ],
    'modules' => [
        'user' => [
            // following line will restrict access to admin controller from frontend application
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
            'class' => 'dektrium\user\Module',
        ],
        'treemanager' => [
            'class' => 'kartik\tree\Module',
            'dataStructure' => [
                'keyAttribute' => 'id',
            ],
        ],
    ],
    'params' => $params,
];
