<?php
namespace app\api\controller;
use \think\Controller;

/**
 *设备api 
 */
class Shebei extends Controller
{
    //设备查询
	public function shebeixx(){
		$lists = db('fac') -> select();
        return json($lists);
	}
    //新闻查询
	public function newxx(){
		$lists = db('document') -> select();
		return json($lists);
	}
    //注册测试接收阶段
	public function reg()
    {
        if (request()->isPost()) {
            $data1 = input('param.');
            // $data2 = input('sex');

            // $res = array(

            // )
            return json($data1);

        //     if (!isset($data['code'])) {
        //         $this->error('请输入验证码！');
        //     }

        //     $code_status = $this -> CheckSmsCode($data['mobile'],$data['code']);
        //     if (!$code_status) {
        //         $this->error('短信验证码错误！');
        //     }

        //     if ($data['password'] != $data['repassword']) {
        //         $this->error('两次密码输入不正确！');
        //     }

        //     unset($data['repassword']);
        //     unset($data['code']);
        //     $data['password'] = md5($data['password']);
        //     $data['create_time'] = time();
        //     $data['status'] = 1;

        //     if (db('user') -> insert($data)) {
        //         $this->result('', '0', '注册成功！', 'json');
        //     }else{
        //     	$this->result('', '0', '注册失败，请重新填写内容！', 'json');
        //     }

        // }else{
            
        }
    }

	// public function login()
 //    {
 //        if (request()->isPost()) {
 //            $data = input('post.');
 //            if (!isset($data['mobile'])) {
 //                $this->error('请输入手机号码！');
 //            }
 //            if (!isset($data['password'])) {
 //                $this->error('请输入密码！');
 //            }

 //            $code = $this -> ChenkUserPwd($data['mobile'],$data['password']);

 //            if ($code < 0) {
 //                switch($code) {
 //                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
 //                    case -2: $error = '密码错误！'; break;
 //                    default: $error = '未知错误！'; break; 
 //                }
 //                $this -> error($error);
 //            }else{
 //                $this -> success('登录成功！','index/user/index');
 //            }
 //        }else{
 //            return $this -> fetch();
 //        }
 //    }



}