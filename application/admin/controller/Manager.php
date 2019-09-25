<?php
namespace app\admin\controller;
use \think\Controller;
use \think\captcha\Captcha;

class Manager extends Controller
{
    public function login()
    {
    	if (request()->isPost()) {
    		$data = input('param.');

    		$validate = validate('Manager');
	    	if (!$validate->check($data)) {
	    		$this -> error($validate -> getError());
	    	}

    		if(!captcha_check($data['captcha'])){
			$this -> error('验证码错误!');
			};
            
			$res = model('Manager')->login($data['name'],$data['password']);

    		if ((int)$res > 0) {
    			$this -> success('登录成功!','admin/index/index');
    		}else{
    			switch($res) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
    			$this -> error($error);
    		}
    	}else{
    		return $this -> fetch();
    	}
    }

    public function index(){
        $res = model('Manager') -> GetManager();
        $count = count($res);
        return $this -> fetch('',[
            'res'   => $res,
            'count' => $count,
        ]);
    }

    // 添加管理员
    public function add(){
        if (request()->isPost()) {
            $data = input('param.');
            if (empty($data['pwd'])) {
                $this -> error('密码不能为空!');
            }
            if (empty($data['pwd2'])) {
                $this -> error('确认密码不能为空!');
            }
            if ($data['pwd'] != $data['pwd2']) {
                $this -> error('两次密码不一致!');
            }

            if (model('Manager') -> FindManager($data['name'])) {
                $this -> error('该管理员已存在!');
            }

            $data['pwd'] = model('Manager') -> setPasswordAttr($data['pwd2']);
            $data['status'] = 1;
            unset($data['pwd2']);

            if (db('Manager')->insert($data)) {
                $this -> success('管理员信息添加成功!');
            }else{
                $this -> error('管理员信息添加失败!');
            }
        }else{
            return $this -> fetch();
        }
    }

    // 修改商品
    public function edit($id){
        if (!$id) {
            $this -> error('商品获取失败!');
        }
        if (request()->isPost()) {
            $data = input('param.');

            if (isset($data['pwd']) && isset($data['pwd'])) {
                if (empty($data['pwd'])) {
                    $this -> error('密码不能为空!');
                }
                if (empty($data['pwd2'])) {
                    $this -> error('确认密码不能为空!');
                }
                if ($data['pwd'] != $data['pwd2']) {
                    $this -> error('两次密码不一致!');
                }
                $data['pwd'] = model('Manager') -> setPasswordAttr($data['pwd2']);
                unset($data['pwd2']);
            }

            if (db('Manager')->where('id',$id)->update($data)) {
                $this -> success('管理员信息修改成功!');
            }else{
                $this -> error('管理员信息修改失败!');
            }
        }else{
            $res = db('Manager')->find($id);
            return $this -> fetch('',[
                'res' => $res
            ]);
        }
    }

    // 删除数据
    public function del(){
        $data = input('param.');
        $ids  = $data['ids'];
        
        if (db('Manager')->delete($ids)) {
            $this -> success('数据删除成功!');
        }else{
            $this -> error('数据删除失败!');
        }
    }

    public function get_status($id,$status){
        if (!$id) {
            $this -> error('数据错误!');
        }
        if (db('Manager')->where('id',$id)->setField('status',$status)) {
            $this -> success('数据修改成功!');
        }else{
            $this -> error('数据修改失败!');
        }
    }

    public function captcha()
    {
    	$config =    [
		    // 验证码字体大小
		    'fontSize'    =>    20,    
		    // 验证码位数
		    'length'      =>    4,   
		    // 关闭验证码杂点
		    'useNoise'    =>    false, 
		    'imageW'      =>    205,
		    'imageH'      =>    40,
		    'reset'       =>    false,
		];
        $captcha = new Captcha($config);
        $captcha->codeSet = '23456789';
		return $captcha->entry();
    }
}
