<?php
namespace app\index\controller;
use \think\Controller;

class Aliyun extends Home
{
    public function send_sms()
    {
    	if (request()->isPost()) {
    		$mobile = input('mobile');
    		$code = rand(100000,999999);

    		$data = array(
    			'mobile' => $mobile,
    			'code'   => $code,
    			'send_time' => time()
    		);

    		if ($this -> CheckUser($mobile)) {
                $this->error('用户已存在！');
            }

    		$code_status = $this -> CheckSmsCodeTime($data['mobile']);
    		if (!$code_status) {
                $this->error('请不要频繁发送验证码！');
            }

    		// 正式发送验证码
    		$send = ali_send_sms($mobile,'1',$code);
    		if ($send['Message'] != 'OK') {
    			$this -> error('短信发送失败！');
    		}else{
    			db('sms') -> insert($data);
    			$this -> success('短信发送成功！');
    		}
    	}
    }

    // 检测用户是否注册
    private function CheckUser($mobile){
        $res = db('user') -> where('mobile',$mobile) -> find();
        if ($res) {
            return true;
        }else{
            return false;
        }
    }

    // 短信验证时间
    private function CheckSmsCodeTime($mobile){
        $res = db('sms') -> where('mobile',$mobile) -> order('send_time desc') -> find();
        if ($res) {
            $send_time = $res['send_time'];
            $disp_time = time() - $send_time;

            if ($disp_time < 60) {
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }
}
