<?php
namespace app\admin\controller;
use \think\Controller;

class Banner extends Base
{
    public function index()
    {
    	$banner = db('banner') -> order('sort desc') -> select();
        return $this -> fetch("",[
            'banner' => $banner
        ]);
    }

    // 添加幻灯片
    public function add(){
        if (request()->isPost()) {
            $data = input('post.');

            if (!empty($data['status'])) {
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }
            if (!empty($data['target'])) {
                $data['target'] = 1;
            }else{
                $data['target'] = 0;
            }
            $data['create_time'] = time();

            if (db('banner')->insert($data)) {
                $this -> success('幻灯片添加成功!');
            }else{
                $this -> error('幻灯片添加失败!');
            }
        }else{
            return $this -> fetch();
        }
    }

    // 添加幻修改
    public function edit($id){
        if (request()->isPost()) {
            $data = input('post.');
            if (!empty($data['status'])) {
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }
            if (!empty($data['target'])) {
                $data['target'] = 1;
            }else{
                $data['target'] = 0;
            }

            if (db('banner')->where('id',$id)->update($data)) {
                $this -> success('幻灯片修改成功!');
            }else{
                $this -> error('幻灯片修改失败!');
            }
        }else{
            $res = db('banner') -> find($id);
            return $this -> fetch("",[
                'res' => $res
            ]);
        }
    }

    // 删除
    public function del(){
        $data = input('post.');
        $ids  = $data['id'];
        
        if (db('banner')->delete($ids)) {
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
        if (db('banner')->where('id',$id)->setField('status',$status)) {
            $this -> success('修改成功!');
        }else{
            $this -> error('修改失败!');
        }
    }
}
