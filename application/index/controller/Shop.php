<?php
namespace app\index\controller;
use \think\Controller;

class Shop extends Home
{
    public function index()
    {
    	$lists = db('shop') -> where('status',1) -> select();
        return $this -> fetch('',[
            'lists' => $lists,
        ]);
    }

    public function detail($id){
        if (!$id) {
            $this->error('数据出错，请重新进入！');
        }

        $where = array(
            'uid'  => $id,
            'status' => 1
        );
        $lists = db('product') -> where($where) -> select();

        $uid = session('uid');
        $username = session('username');
        $where1 = array(
            'uid'  => $uid,
            'username' => $username,
            'status' => 1
        );
        $address = db('address') -> where($where1) -> select();

        // print_r($lists);exit;
        
        return $this -> fetch('',[
            'lists' => $lists,
            'address' => $address,
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
            print_r($data);exit;
            if (db('shop')->insert($data)) {
                $this -> success('数据添加成功!','user/index');
            }else{
                $this -> error('数据添加失败!');
            }
        }else{
            return $this -> fetch();
        }
    }

    public function down(){
        if (request()->isPost()) {
            if (!user_is_login()) {
                $this->error('您未登录！');
            }
            $data = input('post.');
            // print_r($data);exit;
            $shop = db('product') -> find($data['product_id']);
            if ($shop) {
                if ($shop['uid'] == session('uid')) {
                    $this -> error('请不要下单自己店铺的商品!');
                }
            }

            $map = array(
                'uid' => session('uid'),
                'product_id' => $data['product_id'],
                'order_status' => 0
            );

            if (db('order') -> where($map) -> find()) {
                $this -> error('请不要重复下单!');
            }

            if ($data['address_id'] == '0') {
                $this -> error('请选择正确地址!');
            }
            
            $data['uid'] = session('uid');
            $data['orderid'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT).mt_rand(10000, 99999);
            $data['create_time'] = time();
            $data['shop_id'] = $shop['uid'];
            $data['status'] = 1;

            $res = session('username');
            $usermoney = db('user') -> where('mobile',$res) -> value('money');

            if ($usermoney < $data['price']) {
                $this -> error('余额不足,请前往充值!');
            }
            $list['money'] = $usermoney - $data['price']; 

            if (db('order')->insert($data)) {
                db('user') ->where('mobile',$res) ->update($list);
                $this -> success('下单成功!');
            }else{
                $this -> error('下单失败!');
            }
        }
    }
}
