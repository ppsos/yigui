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
        return $this -> fetch("",[
            'data' => $data,
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
}
