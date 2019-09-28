<?php
use think\Db;
/**
 * 获取导航URL
 * @param  string $url 导航URL
 * @return string      解析或的url
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_nav_url($url){
    switch ($url) {
        case 'http://' === substr($url, 0, 7):
        case '#' === substr($url, 0, 1):
            break;        
        default:
            $url = url($url);
            break;
    }
    return $url;
}
/**
 * 获取分类
 * @param  string $id  分类ID
 * @return string      解析或的url
 * @author 
 */
function get_category($id){
	if ($id) {
		$category = Db::table('ppt_cate')->where(array('id'=>$id))-> field('id,category_name') -> find();
    
	    if ($category) {
	    	return $category['category_name'];
	    }
	}
}

/**
 * 获取用户名
 * @param  
 * @return 
 * @author 
 */
function get_username(){
    $username = session('username');
    if ($username) {
        return $username;
    }
}