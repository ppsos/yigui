<?php
namespace app\index\controller;
use \think\Controller;

class User extends Home
{
    public function login()
    {
        return $this -> fetch();
    }

    public function reg()
    {
        return $this -> fetch();
    }

    public function index()
    {
        return $this -> fetch();
    }

    // 订单管理
    public function order(){
    	return $this -> fetch();
    }

    // 产品管理
    public function product(){
    	$list = db('product') -> where('status',1) -> order('id desc') -> paginate(10);
    	return $this -> fetch('',[
    		'list' => $list
    	]);
    }

    // 添加产品
    public function product_add(){
    	if (request()->isPost()) {
            $data = input('post.');

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
}
