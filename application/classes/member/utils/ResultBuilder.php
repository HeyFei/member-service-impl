<?php
namespace app\classes\member\utils;
use \service\member\constant\ErrorCode;
use app\classes\member\utils\Error as Service_Member_Utils_Error;

class ResultBuilder
{
    /**
     * @var string
     */
    private static $result_class = '';

    /**
     * @return string
     */
    public static function getResultClass()
    {
        return self::$result_class;
    }

    /**
     * @param string $result_class
     */
    public static function setResultClass($result_class)
    {
        self::$result_class = $result_class;
    }

    /**
     * 组装结果
     *
     * @param  int          $code 结果码
     * @param  array|object $data 结果数据
     *
     * @return mixed
     */
    public static function buildResult($code = ErrorCode::SUCCESS, $data = [])
    {
        $class = self::getResultClass();
        if (! $class || ! class_exists($class)) {
            throw new InvalidArgumentException("{$class} not exists, fail to build result.");
        }
        $result = new $class;
        $result->code = $code;
        $result->message = Service_Member_Utils_Error::getErrorMsg($code);
        if ($code == ErrorCode::SUCCESS) {
            $result->data = $data;
        }
        return $result;
    }
}
