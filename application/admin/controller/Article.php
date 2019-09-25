<?php
namespace app\admin\controller;
use \think\Controller;

class Article extends Base
{
    public function lists()
    {
        return $this -> fetch();
    }
}
