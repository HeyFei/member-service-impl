<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

define('YII_SYSTEM_APP',dirname(dirname(__DIR__)) . '/vendor/yiisoft/yii2-app-basic/');
define('YII_USER_APP',dirname(__DIR__)) . '/';

require YII_SYSTEM_APP.'vendor/autoload.php';
require YII_SYSTEM_APP.'vendor/yiisoft/yii2/Yii.php';

$config = require YII_USER_APP. '/config/test.php';

(new yii\web\Application($config))->run();
