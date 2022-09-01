<?php
namespace app\api\controller;
use \think\Controller;

/**
 *设备api 
 */
class Shebei extends Controller
{
    public function login(){
        if (request()->isPost()) {
            $data = input('post.');
            if (!isset($data['mobile'])) {
                $this->error('请输入手机号码！');
            }
            if (!isset($data['password'])) {
                $this->error('请输入密码！');
            }

            $code = $this -> ChenkUserPwd($data['mobile'],$data['password']);
// print_r($code);exit;
            if ($code < 0) {
                switch($code) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; 
                }
                $this->result('', '1', $error, 'json');
            }else{
                $user = session('username');
                $res = db('user') -> where('mobile',$user) -> select();
                $this->result($res, '0', '登录成功！！', 'json');
            }
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
            $data = input('post.');
            // print_r($data);exit;
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
                 $this->result('', '0', 'zhuce成功！！', 'json');
            }else{
                 $this->result('', '1', '登录失败！！', 'json');
            }
        }
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

    //查询所有商铺
    public function shop(){
        // $lists = db('shop') -> select();
        $res = Db('shop')
              ->alias("a") //取一个别名
              //与category表进行关联，取名i，并且a表的categoryid字段等于category表的id字段
              ->join('picture i','a.cover_id = i.id')
              //想要的字段
              // ->field('a.path')
              //查询
              ->select();
        // $res = db('picture') ->
        return json($res);
    }
    //返回所有商品信息
    public function product(){
        $res = Db('shop')
              ->alias("a") //取一个别名
              //与category表进行关联，取名i，并且a表的categoryid字段等于category表的id字段
              ->join('product i','a.uid = i.uid')
              ->join('picture w','i.cover_id = w.id')
              //想要的字段
              // ->field('a.path')
              //查询
              ->select();
        // $res1 = db('product')
        //       ->alias("q") //取一个别名
        //       //与category表进行关联，取名i，并且a表的categoryid字段等于category表的id字段
        //       ->join('picture w','q.cover_id = w.id')
        //       ->select();
        return json($res);
        // return json($res1);
    }
    public function addresslist(){
        // $uid  = session('uid');
        // $where = array(
        //     'uid' => $uid,
        //     'status' => 1
        // );
        // $address = db('address') -> where($where) -> order('id desc') -> select();
        $address = db('address') -> order('id desc') ->  select();
        return json($address);
    }
    public function addressadd(){
        if (request()->isGet()) {
            $data['uid'] = input('uid');
            $data['name'] = input('name');
            $data['mobile'] = input('mobile');
            $data['address'] = input('address');
            $data['status'] = input('status');

            if (db('address')->insert($data)) {
                $this->result('', '1', '添加成功！', 'json');
            }else{
                $this->result('', '0', '添加失败！', 'json');
            }
        }else{
            
        }
    }
    public function addressedit(){
        if (request()->isGet()){
            $data['id'] = input('id');
            $res = db('address') -> where('id',$data['id']) -> select();
            if ($res) {
                $data['uid'] = input('uid');
                $data['name'] = input('name');
                $data['mobile'] = input('mobile');
                $data['address'] = input('address');
                $data['status'] = input('status');

                if (db('address') -> where('id',$data['id']) -> update($data))
                {
                    $this->result('', '1', '修改成功！', 'json');
                }else{
                    $this->result('', '0', '修改失败！', 'json');
                }
            }else{
                $this->result('', '0', '没有此数据！', 'json');
            }
            }else{

        }
    }

    public function addressdelete(){
        if (request()->isGet()) {
            $data['uid'] = input('uid');
            $data['id'] = input('id');
            $res =  db('address')
                    ->where('id',$data['id'])
                    ->where('uid',$data['uid'])
                    ->delete($data);
            if ($res){
                 $this->result('', '1', '删除成功！', 'json');
            }else{
                 $this->result('', '0', '删除失败！', 'json');
            }
        }
    }

    public function loginOut(){
        session('username', null);
        session('uid', null);
        $this->result('', '0', '已经退出！', 'json');
    }

    public function shebeilist(){
        $fan = db('fac') -> select();
        return json($fan);
    }
    public function led_status(){
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }
        if (request()->isGet()) {
            $data = input('get.');
            // print_r($data);exit;
            if (db('fac')->where('id',$data['id'])->where('uid',$data['uid'])->select()) {
                db('fac')->where('id',$data['id'])->where('uid',$data['uid'])->update($data);
            }
        }
    }

    public function hot_status(){
        if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }
        if (request()->isGet()) {
            $data = input('get.');
            // print_r($data);exit;
            if (db('fac')->where('id',$data['id'])->where('uid',$data['uid'])->select()) {
                db('fac')->where('id',$data['id'])->where('uid',$data['uid'])->update($data);
            }
        }
    }
}