<?php
namespace app\admin\controller;
use \think\Controller;
use \think\captcha\Captcha;

class User extends Controller
{
    public function index(){
        if (!is_login()) {
            $this->error('还没登录...，即将跳转到登录页面',url('manager/login'));
        }

        $res = db('user') ->order('id','desc')-> select();
        return $this -> fetch('',[
            'res'   => $res
        ]);
    }

    // 添加管理员
    public function add(){
        if (request()->isPost()) {
            $data = input('param.');
            if (empty($data['pwd'])) {
                $this -> error('密码不能为空!');
            }
            if (empty($data['pwd2'])) {
                $this -> error('确认密码不能为空!');
            }
            if ($data['pwd'] != $data['pwd2']) {
                $this -> error('两次密码不一致!');
            }

            if (db('user') -> find($data['name'])) {
                $this -> error('该管理员已存在!');
            }

            $data['pwd'] = db('user') -> md5($data['pwd2']);
            $data['status'] = 1;
            unset($data['pwd2']);

            if (db('user')->insert($data)) {
                $this -> success('管理员信息添加成功!');
            }else{
                $this -> error('管理员信息添加失败!');
            }
        }else{
            return $this -> fetch();
        }
    }

    // 修改
    public function edit($id){
        if (!$id) {
            $this -> error('用户获取失败!');
        }
        if (request()->isPost()) {
            $data = input('param.');

            if (isset($data['pwd']) && isset($data['pwd'])) {
                if (empty($data['pwd']) && empty($data['pwd2'])) {
                    unset($data['pwd']);
                    unset($data['pwd2']);
                }

                if (isset($data['pwd'])) {
                    if ($data['pwd'] != $data['pwd2']) {
                        $this -> error('两次密码不一致!');
                    }
                }
                if (isset($data['pwd'])) {
                    $data['pwd'] = db('user') -> md5($data['pwd2']);
                    unset($data['pwd2']);
                }
            }

            if (db('user')->where('id',$id)->update($data)) {
                $this -> success('管理员信息修改成功!');
            }else{
                $this -> error('管理员信息修改失败!');
            }
        }else{
            $res = db('user')->find($id);
            return $this -> fetch('',[
                'res' => $res
            ]);
        }
    }

    // 删除数据
    public function del(){
        $data = input('param.');
        $ids  = $data['id'];
        
        if (db('Manager')->delete($ids)) {
            $this -> success('数据删除成功!');
        }else{
            $this -> error('数据删除失败!');
        }
    }

    public function get_status($id,$status){
        if (!$id) {
            $this -> error('数据错误!');
        }
        if (db('Manager')->where('id',$id)->setField('status',$status)) {
            $this -> success('数据修改成功!');
        }else{
            $this -> error('数据修改失败!');
        }
    }
}
