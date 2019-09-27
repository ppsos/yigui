<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Home extends Controller
{
    public function _initialize()
    {
    	// $map    = array('status' => 1);
     //    $data   = Db::table('ppt_config') -> where($map) -> field('type,name,value')->select();
        
     //    $config = array();
     //    if($data && is_array($data)){
     //        foreach ($data as $value) {
     //            $config[$value['name']] = self::parse($value['type'], $value['value']);
     //        }
     //    }
        
        // config($config); //添加配置
        // if(!config('WEB_SITE_CLOSE')){
        //     $this->error('站点已经关闭，请稍后访问~');
        // }
    }

    /**
     * 根据配置类型解析配置
     * @param  integer $type  配置类型
     * @param  string  $value 配置值
     */
    // private static function parse($type, $value){
    //     switch ($type) {
    //         case 4: //解析数组
    //             $array = preg_split('/[,;\r\n]+/', trim($value, ",;\r\n"));
    //             if(strpos($value,':')){
    //                 $value  = array();
    //                 foreach ($array as $val) {
    //                     list($k, $v) = explode(':', $val);
    //                     $value[$k]   = $v;
    //                 }
    //             }else{
    //                 $value =    $array;
    //             }
    //             break;
    //     }
    //     return $value;
    // }
}
