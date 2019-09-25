<?php
namespace app\admin\validate;

use think\Validate;

class Manager extends Validate
{
    protected $rule = [
        ['name','require|max:10','管理员名称不能为空！|管理员名称不能超过10个字！'],
        ['password','require','密码不能为空！'],
    ];
}