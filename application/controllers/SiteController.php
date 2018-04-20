<?php

namespace app\controllers;

use Thrift\Protocol\TSimpleJSONProtocol;
use Yii;
use yii\web\Controller;
use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Protocol\TJSONProtocol;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $url = Yii::$app->request->url;
        $arr = explode('/', trim($url, '/'));
        $project_name = $arr[0];
        $server_name = $arr[1];
        $class_name = $server_name . 'Impl';
        $class_name = 'app\\classes\\member\\' . $class_name;
        $loader = new ThriftClassLoader();
        $server_member_path = YII_USER_APP . 'vendor/service/' . $project_name . '/php/service/' . $project_name . '/';
        $loader->registerDefinition('service\\member\\', $server_member_path);
        $handler = new $class_name();
        $processor_class = '\\service\\' . $project_name . '\\' . $server_name . 'Processor';
        $processor = new $processor_class($handler);
        $transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
        $content_type = $_SERVER['HTTP_CONTENT_TYPE'];
        list($content_type) = explode(";", trim($content_type));
        if ('application/json' === $content_type) {
            $protocol = new TJSONProtocol($transport);
        } elseif ('application/simple_json' === $content_type) {
            $protocol = new TSimpleJSONProtocol($transport);
        } else {
            $protocol = new TBinaryProtocol($transport, true, true);
        }
        $transport->open();
        $processor->process($protocol, $protocol);
        $transport->close();
    }

    public function actionError()
    {
        return 'forbid access by get method';
    }
}
