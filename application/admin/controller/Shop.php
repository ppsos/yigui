<?php
namespace app\admin\controller;
use \think\Controller;

class Shop extends Base
{
    public function index()
    {
        $list = db('shop') -> order('id desc') -> select();
        return $this -> fetch('',[
            'list' => $list
        ]);
    }

    // 修改状态
    public function get_status($id,$status){
        if (!$id) {
            $this -> error('数据错误!');
        }

        if (db('shop')->where('id',$id)->setField('status',$status)) {
            $this -> success('数据修改成功!');
        }else{
            $this -> error('数据修改失败!');
        }
    }

    // 删除数据
    public function del(){
        $data = input('param.');
        $ids  = $data['id'];
        
        if (db('shop')->delete($ids)) {
            $this -> success('数据删除成功!');
        }else{
            $this -> error('数据删除失败!');
        }
    }
}
