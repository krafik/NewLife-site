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
    'bootstrap' => ['log', 'debug'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module'
        ]
    ],
    'components' => [

        'request' => [
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
            'enableStrictParsing' => true,
            'rules' => [
//                [
//                    'class'=>app\components\PageRule::class,
//                    'pattern'=>'catalog/<FilterForm:\w+>/<cat_name:\w+>',
//                    'route'=>'catalog/index'
//                ],
                [
                    'pattern'=>'catalog/product/<url>',
                    'route'=>'catalog/view'
                ],
                [
                    'pattern'=>'about',
                    'route'=>'site/about',
//                    'suffix'=>'.php'
                ],
                '/'=>'site/index',
//                'about'=>'site/about',
//                '<action:\w+>' => 'site/<action>',
                'catalog' => 'catalog/index',
//                'catalog/<FilterForm>' => 'catalog/index',
//                '<controller:catalog>'=>'catalog/index',
//                'catalog/index/<FilterForm:\w+>'=>'',
//                'catalog/<FilterForm>' => 'catalog/index',
//                'catalog/product/<url>' => 'catalog/view',
//                'catalog/<filter>'=>'catalog[FilterForm]',
//                'catalog/<id:\d+>/page/<page:\d+>' => 'catalog/index',
//                'catalog/<url:\w+>' => 'catalog/view',
//                'news/page/<page:\d+>'=>'news/index',
            ],
        ],
        'assetManager' => [
            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'js'=>[]
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'js'=>[]
//                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],

            ],
        ],

    ],
    'params' => $params,

];
