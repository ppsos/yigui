<?php
namespace app\admin\controller;
use \think\Controller;

class Product extends Base
{
    public function index()
    {
        $res = db('product') -> order('id desc') -> select();
        return $this -> fetch('',[
            'res' => $res,
        ]);
    }

    // 添加
    public function add(){
    	if (request()->isPost()) {
            $data = input('post.');
            
            if (!isset($data['status'])) {
                $data['status'] = 0;
            }
            print_r($data);exit;

            if (db('product')->insert($data)) {
                $this -> success('设备添加成功!');
            }else{
                $this -> error('设备添加失败!');
            }
        }else{
            return $this -> fetch();
        }
    }

    // 修改设备
    public function edit($id){
    	if (request()->isPost()) {
    		$data = input('post.');
            if (!empty($data['status'])) {
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }

            if (db('product')->where('id',$id)->update($data)) {
                $this -> success('设备修改成功!');
            }else{
                $this -> error('设备修改失败!');
            }
    	}else{
    		$res = db('product') -> find($id);
    		return $this -> fetch("",[
    			'res' => $res,
    		]);
    	}
    }

    // 修改状态
    public function get_status($id,$status){
        if (!$id) {
            $this -> error('数据错误!');
        }

        if (db('product')->where('id',$id)->setField('status',$status)) {
            $this -> success('数据修改成功!');
        }else{
            $this -> error('数据修改失败!');
        }
    }

    // 删除数据
    public function del(){
        $data = input('param.');
        $ids  = $data['id'];
        
        if (db('product')->delete($ids)) {
            $this -> success('数据删除成功!');
        }else{
            $this -> error('数据删除失败!');
        }
    }

    public function getRandom($param){
	    $str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $key = "";
	    for($i=0;$i<$param;$i++)
	     {
	         $key .= $str{mt_rand(0,32)};    //生成php随机数
	     }
	     return $key;
	 }
}
