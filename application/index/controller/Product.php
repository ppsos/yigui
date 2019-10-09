<?php
namespace app\index\controller;
use \think\Controller;

class Product extends Home
{
    public function index()
    {
    	$product = db('product') -> where('status',1) -> order('id desc') -> select();
        return $this -> fetch('',[
        	'product' => $product
        ]);
    }
}
