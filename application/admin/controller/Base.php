<?php
namespace app\admin\controller;
use \think\Controller;

class Base extends Controller
{
    public function _initialize(){
        if(defined('UID')) return ;
        define('UID',is_login());
        if( !UID ){ // 还没登录 跳转到登录页面
            $this->error('还没登录，即将跳转到登录页面',url('manager/login'));
        }
	}
}
