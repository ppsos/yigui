<?php
namespace app\index\controller;
use \think\Controller;

class Aliyun extends Home
{
    public function send_sms()
    {
    	if (request()->isPost()) {
    		$mobile = input('mobile');
    		$send = send_sms($mobile,'1','123456');
    		if ($send['Message'] != 'OK') {
    			$this -> error('短信发送失败！');
    		}else{
    			$this -> success('短信发送成功！');
    		}
    	}
    }
}
