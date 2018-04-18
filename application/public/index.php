<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

define('YII_SYSTEM_APP',dirname(dirname(__DIR__)) . '/vendor/yiisoft/yii2-app-basic/');
define('YII_USER_APP',dirname(__DIR__)) . '/';

require YII_SYSTEM_APP.'vendor/autoload.php';
require dirname(YII_USER_APP) . '/vendor/autoload.php';
require YII_SYSTEM_APP.'vendor/yiisoft/yii2/Yii.php';

$config = require YII_USER_APP. '/config/web.php';

(new yii\web\Application($config))->run();
