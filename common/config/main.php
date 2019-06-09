<?php
$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'),
        require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/params.php'),
        require(__DIR__ . '/params-local.php')
);
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        'request' => [
            'baseUrl' => $baseUrl,
        ],
        'helper' => [
            'class' => 'frontend\components\Helper',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
