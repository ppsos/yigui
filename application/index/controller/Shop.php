<?php
namespace app\index\controller;
use \think\Controller;

class Shop extends Home
{
    public function index()
    {
    	$lists = db('document') -> select();
        return $this -> fetch('',[
            'lists' => $lists,
        ]);
    }

    public function entry(){
    	if (!user_is_login()) {
            $this->error('还没登录，即将跳转到登录页面',url('index/user/login'));
        }

        $uid  = session('uid');
        $user = db('shop')-> where('uid',$uid) -> find();
        if ($user) {
            $this -> error('您已提交过入驻资料!');
        }

        if (request()->isPost()) {
            $data = input('post.');
            $data['uid']  = $uid;

            if (db('shop')->insert($data)) {
                $this -> success('数据添加成功!','user/index');
            }else{
                $this -> error('数据添加失败!');
            }
        }else{
            return $this -> fetch();
        }
    }
}
