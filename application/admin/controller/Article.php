<?php
namespace app\admin\controller;
use \think\Controller;

class Article extends Base
{
    public function lists()
    {
    	$data = db('document') -> order('sort desc') -> select();
        foreach ($data as $k => $va) {
            $cate = db('category') -> field('name') -> find($va['category_id']);
            $data[$k]['category'] = $cate['name'];
        }
        $category = db('category') -> order("sort desc") -> where("status",1) -> select();
        return $this -> fetch("",[
            'data' => $data,
            'category' => $category
        ]);
    }

    // 资讯添加
    public function add(){
        if (request()->isPost()) {
            $data = input('post.');
            if (!empty($data['status'])) {
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }
            if (!empty($data['is_index'])) {
                $data['is_index'] = 1;
            }else{
                $data['is_index'] = 0;
            }
            $data['create_time'] = time();
            $res = db('document') -> order('id desc') -> find();
            $res['id'] = $res['id'] + 1 ;
            $data['url'] = 'https://www.17pptmoban.com/index/article/detail/id/'.$res['id'].'.html';

            // print_r($data);exit;
            if (db('document')->insert($data)) {
                $this -> success('文章添加成功!');
            }else{
                $this -> error('文章添加失败!');
            }
        }else{
            $category = db('category') -> order("sort desc") -> where("status",1) -> select();
            return $this -> fetch('',[
                'category' => $category
            ]);
        }
    }

    // 资讯修改
    public function edit($id){
        if (request()->isPost()) {
            $data = input('post.');
            if (!empty($data['status'])) {
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }
            if (!empty($data['is_index'])) {
                $data['is_index'] = 1;
            }else{
                $data['is_index'] = 0;
            }

            if (db('document')->where('id',$id)->update($data)) {
                $this -> success('文章修改成功!');
            }else{
                $this -> error('文章修改失败!');
            }
        }else{
            $res = db('document') -> find($id);
            $category = db('category') -> order("sort desc") -> where("status",1) -> select();
            return $this -> fetch("",[
                'res' => $res,
                'category' => $category,
            ]);
        }
    }

    // 删除
    public function del(){
        $data = input('post.');
        $ids  = $data['id'];
        
        if (db('document')->delete($ids)) {
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
        if (db('document')->where('id',$id)->setField('status',$status)) {
            $this -> success('修改成功!');
        }else{
            $this -> error('修改失败!');
        }
    }
}
