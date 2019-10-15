<?php

$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'Sclad',
    'basePath' => dirname(__DIR__),
    'name'=>'sklad v0.1',
    'defaultRoute' => 'site/index',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [

            'cookieValidationKey' => 'Igre6BSwHCV9bBf7VfMU1lW7MvMba5cG',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => array('/site/login'),
        ],
        'authManager' => [

            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin','manager','employee'],

        ],
        'db' => $db,





    ],

];

return $config;