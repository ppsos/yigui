<?php
namespace app\admin\controller;
use \think\Controller;

class Update extends Base
{
    public function image(){
        $file = request()->file('file'); // 获取表单上传文件 例如上传了001.jpg
        
        if ($file) {
            // 先判断哈希值是否存在再进行文件移动
            $sha1 = $file->hash('sha1');
            $sha1Status = model('File') -> sha1Status($sha1);

            if ($sha1Status) {
                // 已经上传过该图片，直接返回数据就好了
                $return = array('code'=>0,'msg'=>'上传成功','data'=>array('src'=> model('File') -> get_cover($sha1Status,'path'),'cover_id'=>$sha1Status));
                return json($return);
            }else{
                if ($file) {
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                    if($info){
                        $file = str_replace('\\','/',$info->getSaveName());

                        $data = array(
                            'path' => $file, // 图片路径
                            'md5'  => $info->hash('md5'), // 图片MD5加密
                            'sha1' => $info->hash('sha1'), // sha1编码
                            'status'=>1,
                            'create_time' => time(),
                        );

                        $picId = model('File') -> upload($data);
                        if ($picId) {
                            $return = array('code'=>0,'msg'=>'上传成功','data'=>array('src'=> model('File') -> get_cover($picId,'path'),'cover_id'=>$picId));
                            return json($return);
                        }else{
                            $return = array('code'=>1,'msg'=>'上传失败','data'=>array('src'=> model('File') -> get_cover($picId,'path')));
                            return json($return);
                        }
                    }else{
                        $return = array('code'=>1,'msg'=>'上传失败','data'=>array('src'=> model('File') -> get_cover($picId,'path')));
                        return json($return);
                    }
                }
            }
        }
    }

    public function images(){
        $file = request()->file('file'); // 获取表单上传文件 例如上传了001.jpg
        
        // 先判断哈希值是否存在再进行文件移动
        $sha1 = $file->hash('sha1');
        $sha1Status = model('File') -> sha1Status($sha1);

        if ($sha1Status) {
            // 已经上传过该图片，直接返回数据就好了
            $return = array('code'=>0,'msg'=>'上传成功','data'=>array('src'=> model('File') -> get_cover($sha1Status,'path'),'cover_id'=>$sha1Status));
            return json($return);
        }else{
            if ($file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $file = str_replace('\\','/',$info->getSaveName());

                    $data = array(
                        'path' => $file, // 图片路径
                        'md5'  => $info->hash('md5'), // 图片MD5加密
                        'sha1' => $info->hash('sha1'), // sha1编码
                        'status'=>1,
                        'create_time' => time(),
                    );

                    $picId = model('File') -> upload($data);
                    if ($picId) {
                        $return = array('code'=>0,'msg'=>'上传成功','data'=>array('src'=> model('File') -> get_cover($picId,'path'),'cover_id'=>$picId));
                        return json($return);
                    }else{
                        $return = array('code'=>1,'msg'=>'上传失败','data'=>array('src'=> model('File') -> get_cover($picId,'path')));
                        return json($return);
                    }
                }else{
                    $return = array('code'=>1,'msg'=>'上传失败','data'=>array('src'=> model('File') -> get_cover($picId,'path')));
                    return json($return);
                }
            }
        }
    }
}
