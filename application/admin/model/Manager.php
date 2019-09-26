<?php
namespace app\admin\model;
use think\Model;

class Manager extends Model
{
    // protected $autoWriteTimestamp = true;
    /*
    * 登录
    */
    public function login($name,$pwd){
        $user = $this->FindManager($name); // 通过用户名查询数据

        if ($user) {
            if ($this -> setPasswordAttr($pwd) != $user['pwd']) {
                return -2;
            }else{
                // session('user_id', $user['id']);
                $this->autoLogin($user);
                return true;
            }
        }else{
            return -1;
        }
    }
    
    // 生成密码规则
    public function setPasswordAttr($value)
    {
        return md5($value);
    }

    public function autoLogin($user){
        /* 更新登录信息 */
        $data = array(
            'last_login_time' => time(),
            'last_login_ip'   => request()->ip(1),
            'login_times'     => $user['login_times'] + 1,
        );
        $this->save($data,['id' => $user['id']]);
        session('user_id', $user['id']);
    }

    /*
    * 检查用户名是否存在
    存在返回数据，不存在则放回false
    */
    public function FindManager($name){
        $map['name'] = $name;
        $map['status'] = 1;

        $user = $this -> where($map) -> find();
        if ($user) {
            return $user;
        }else{
            return false;
        }
    }

    // 返回管理员列表
    public function GetManager(){
        $order = [
            'id' => 'desc'
        ];

        return $this -> order($order) -> select();
    }



}
