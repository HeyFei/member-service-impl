<?php
namespace app\classes\member; 
use \service\member\BaseMemberServiceIf; 
use service\member\constant\ErrorCode; 
use app\classes\member\utils\ResultBuilder; 
use \service\member\object\base\BaseForList; 
use service\member\object\base\ListBaseResult; 
class BaseMemberServiceImpl implements BaseMemberServiceIf {
    public function getSimpleInfoListByIds(array $requests) {
        ResultBuilder::setResultClass(ListBaseResult::class); 
        $base_for_list = new BaseForList(); 
        $base_for_list->id = 1; 
        $base_for_list->real_name = '张三'; 
        $data = [$base_for_list]; 
        $ret = ResultBuilder::buildResult(ErrorCode::SUCCESS, $data); 
        return $ret; 
    }
}