<?php
namespace app\index\controller;
use \think\Controller;

class User extends Home
{
    public function login()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if (!isset($data['mobile'])) {
                $this->error('请输入手机号码！');
            }
            if (!isset($data['password'])) {
                $this->error('请输入密码！');
            }

            $code = $this -> ChenkUserPwd($data['mobile'],$data['password']);

            if ($code < 0) {
                switch($code) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; 
                }
                $this -> error($error);
            }else{
                $this -> success('登录成功！','index/user/index');
            }
        }else{
            return $this -> fetch();
        }
    }

    public function reg()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if (!isset($data['code'])) {
                $this->error('请输入验证码！');
            }

            $code_status = $this -> CheckSmsCode($data['mobile'],$data['code']);
            if (!$code_status) {
                $this->error('短信验证码错误！');
            }

            if ($data['password'] != $data['repassword']) {
                $this->error('两次密码输入不正确！');
            }

            unset($data['repassword']);
            unset($data['code']);
            $data['password'] = md5($data['password']);
            $data['create_time'] = time();
            $data['status'] = 1;

            if (db('user') -> insert($data)) {
                $this -> success('注册成功！','index/user/login');
            }else{
                $this->error('注册失败，请重新填写内容！');
            }

        }else{
            return $this -> fetch();
        }
    }

    // 检查用户登录情况
    private function ChenkUserPwd($mobile,$password){
        $map['mobile'] = $mobile;
        $map['status'] = 1;
        $user = db('user') -> where($map) -> find();

        if ($user) {
            if (md5($password) != $user['password']) {
                return -2;
            }else{
                // 登录成功之后的操作
                $this->autoLogin($user);
                return true;
            }
        }else{
            return -1;
        }
    }

    // 用户登录操作
    private function autoLogin($user){
        /* 更新登录信息 */
        $data = array(
            'last_login_time' => time(),
            'last_login_ip'   => request()->ip(1),
            'login_times'     => $user['login_times'] + 1,
        );
        db('user')->where('id',$user['id'])->update($data);
        session_start();
        session('username', $user['mobile']);
        session('uid', $user['id']);
    }

    // 短信验证
    private function CheckSmsCode($mobile,$code){
        $data = array(
            'mobile' => $mobile,
            'code'   => $code,
        );
        $res = db('sms') -> where($data) -> order('send_time desc') -> find();
        if ($res) {
            return true;
        }else{
            return false;
        }
    }

    public function index()
    {
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }
        $id       = session('uid');
        $username = session('username');

        $where = array(
            'mobile' => $username,
            'id' => $id,
        );
        $list = db('user') -> where($where) -> select();
        // print_r($list);exit;
        return $this -> fetch('',[
            'lists' => $list,
        ]);
        return $this -> fetch();
    }

    // 订单管理
    public function order(){
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }
        $uid  = session('uid');
        $where = array(
            'shop_id' => $uid
        );
        $list = db('order') -> where($where) -> select();

        foreach ($list as $key => $value) {
            $res  = db('product') -> find($value['product_id']);
            $list[$key]['product'] = $res['title'];


            $user = db('user') -> find($value['uid']);
            $list[$key]['username'] = $user['mobile'];

            $address = db('address') -> find($value['address_id']);
            $list[$key]['address'] = $address['address'];

            $user_mobile = db('address') -> find($value['address_id']);
            $list[$key]['mobile'] = $user_mobile['mobile'];
        }
    	return $this -> fetch('',[
            'list' => $list
        ]);
    }

    // 我的订单(客户)
    public function user_order(){
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }
        $uid  = session('uid');
        $where = array(
            'uid' => $uid
        );
        $list = db('order') -> where($where) -> select();
        foreach ($list as $key => $value) {
            $res = db('product') -> find($value['product_id']);
            $list[$key]['product'] = $res['title'];
            $user = db('user') -> find($value['uid']);
            $list[$key]['username'] = $user['mobile'];
        }
        return $this -> fetch('',[
            'list' => $list
        ]);
    }

    // 商家发货
    public function orderstatus(){
        if (request()->isPost()) {
            $data = input('post.');

            if (db('order')->where('id',$data['id'])->update($data)) {
                $this -> success('已发货!');
            }else{
                $this -> error('发货失败!');
            }
        }
    }

    // 产品管理
    public function product(){
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }
        $uid  = session('uid');
        $where = array(
            'uid'  => $uid,
            'status' => 1
        );
        $user = db('shop')-> where($where) -> find();
        if (!$user) {
            $this -> error('您店铺未审核!');
        }

        $data = array(
            'uid'  => $uid,
            'status' => 1
        );
    	$list = db('product') -> where($data) -> order('id desc') -> paginate(100);
    	return $this -> fetch('',[
    		'list' => $list
    	]);
    }

    // 添加产品
    public function product_add(){
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }

        $uid  = session('uid');
        $where = array(
            'uid' => $uid,
            'status' => 1
        );
        $user = db('shop')-> where($where) -> find();
        if (!$user) {
            $this -> error('您店铺未审核!');
        }

    	if (request()->isPost()) {
            $data = input('post.');
            $data['uid']  = $uid;

            if (db('product')->insert($data)) {
                $this -> success('数据添加成功!','user/product');
            }else{
                $this -> error('数据添加失败!');
            }
        }else{
            return $this -> fetch();
        }
    }

    // 修改产品
    public function product_edit($id){
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }

        $uid  = session('uid');
        $where = array(
            'uid' => $uid,
            'status' => 1
        );
        $user = db('shop')-> where($where) -> find();
        if (!$user) {
            $this -> error('您店铺未审核!');
        }
        
		if (request()->isPost()) {
            $data = input('post.');

            if (db('product')->where('id',$id)->update($data)) {
                $this -> success('数据修改成功!','user/product');
            }else{
                $this -> error('数据修改失败!');
            }
        }else{
            $res = db('product') -> find($id);
            return $this -> fetch("",[
                'res' => $res
            ]);
        }
    }

    // 退出登录
    public function loginOut(){
        session('username', null);
        session('uid', null);

        $this->redirect(url('index/user/login'));
    }
}
