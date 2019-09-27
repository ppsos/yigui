<?php
namespace app\index\controller;
use \think\Controller;

class Index extends Home
{
    public function index()
    {
    	$banner = db('banner') -> where('status',1) -> order('sort desc') -> select();
    	$document = db('document') -> where('status',1) -> order('sort desc') -> select();
        return $this -> fetch('',[
        	'banner' => $banner,
        	'document' => $document
        ]);
    }
}
