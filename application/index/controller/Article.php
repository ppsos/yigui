<?php
namespace app\index\controller;
use \think\Controller;

class Article extends Home
{
    public function index(){
        $lists = db('document') -> select();
        return $this -> fetch('',[
            'lists' => $lists,
        ]);
    }

    public function detail($id)
    {
    	if (!$id) {
    		$this -> error('数据获取错误！');
    	}
    	$res = db('document') -> find($id);
    	return $this -> fetch('',[
    		'res' => $res,
        ]);
    }
}
