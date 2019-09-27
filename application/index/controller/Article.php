<?php
namespace app\index\controller;
use \think\Controller;

class Article extends Home
{
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
