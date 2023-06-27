<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
             'class' => \kartik\grid\Module::class,
             //'class' => '\kartik\grid\Module'
             'bsVersion' => '5.x', 
                    ],
             'mimin' => [
                    'class' => '\hscstudio\mimin\Module',
                ],      
    ],
    'components' => [
        'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@app/themes/lte3/views'
             ],
         ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'assetManager' => [
        'bundles' => [
            'kartik\form\ActiveFormAsset' => [
                'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
            /*'yii\bootstrap\BootstrapPluginAsset' => [
                        'js'=>[]
                    ],
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],                    */
            ],
        ],
         'i18n' => [
            'translations' => [
                 'app' => [
                        'class' => 'yii\i18n\PhpMessageSource',
                        //'basePath' => '@app/messages',
                        //'sourceLanguage' => 'en-US',
                ],
                'yii2-ajaxcrud' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2ajaxcrud/ajaxcrud/messages',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'id',
                ],
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
