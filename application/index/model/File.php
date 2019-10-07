<?php
namespace app\index\model;
use think\Model;

class File extends Model
{
    protected $table = 'picture';
    /*
    * 图片上传
    */
    public function upload($data){
        $map = array(
            'sha1' => $data['sha1']
        );
        $res = $this -> where($map) -> find();
        if ($res) {
            return $res['id'];
        }

        $picId = $this -> insertGetId($data);
        return $picId;
    }

    /*
    * 检查图片sha1
    */
    public function sha1Status($sha1){
        $map = array(
            'sha1' => $sha1
        );
        $res = $this -> where($map) -> find();
        if ($res) {
            return $res['id'];
        }else{
            return false;
        }
    }

    /**
     * 获取文档封面图片
     * @param int $cover_id
     * @param string $field
     * @return 完整的数据  或者  指定的$field字段值
     * @author 
     */
    public function get_cover($cover_id, $field = null){
        if(empty($cover_id)){
            return false;
        }

        $picture = $this -> where(array('status'=>1,'id'=>$cover_id))->find();
        
        if($field == 'path'){
            if(!empty($picture['url'])){
                $picture['path'] = $picture['url'];
            }else{
                $picture['path'] = '/uploads/'.$picture['path'];
            }
        }
        return empty($field) ? $picture : $picture[$field];
    }
}
