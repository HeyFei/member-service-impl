<?php
namespace app\classes\member\utils;
use \service\member\constant\Constant;

/**
 * 错误信息操作
 */
class Error
{
    /**
     * 通过错误码获取错误信息
     * @param  int $code 结果code
     * @return string 结果描述
     */
    public static function getErrorMsg($code)
    {
        $message_const = Constant::get('ERROR_CODE_MESSAGE');
        $message = $message_const[$code];
        return $message;
    }
}