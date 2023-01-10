<?php

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../config/components.php'),
    require(__DIR__ . '/../config/api.php'),
    require(__DIR__ . '/../config/api-local.php')
);

(new yii\web\Application($config))->run();
