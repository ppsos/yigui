<?php
namespace app\admin\controller;
use \think\Controller;

class Category extends Base
{
    public function lists()
    {
        if (request()->isPost()) {
    		$data = input('post.');
    		$data['sort'] = 0;
    		$data['status'] = 1;

    		if (db('category')->insert($data)) {
                $this -> success('分类添加成功!');
            }else{
                $this -> error('分类添加失败!');
            }
    	}else{
    		$data = db('category') -> order('id desc') -> select();
    		return $this -> fetch("",[
    			'data' => $data,
    		]);
    	}
    }

    // 修改
    public function edit($id){
    	if (request()->isPost()) {
    		$data = input('post.');
            if (!empty($data['status'])) {
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }

            if (db('category')->where('id',$id)->update($data)) {
                $this -> success('分类修改成功!');
            }else{
                $this -> error('分类修改失败!');
            }
    	}else{
    		$res = db('category') -> find($id);
    		return $this -> fetch("",[
    			'res' => $res,
    		]);
    	}
    }

    // 删除
    public function del(){
        $data = input('post.');
        $ids  = $data['id'];
        
        if (db('category')->delete($ids)) {
            $this -> success('数据删除成功!');
        }else{
            $this -> error('数据删除失败!');
        }
    }

    // 停用启用功能
    public function get_status($id,$status){
        if (!$id) {
            $this -> error('数据错误!');
        }
        if (db('category')->where('id',$id)->setField('status',$status)) {
            $this -> success('分类修改成功!');
        }else{
            $this -> error('分类修改失败!');
        }
    }
}
