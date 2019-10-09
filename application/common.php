<?php
use think\Db;
// 应用公共文件
use OSS\OssClient;
use OSS\Core\OssException;
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;

/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function is_login(){
    $name = session('name');
    if (empty($name)) {
        return 0;
    } else {
        return $name;
    }
}

/**
 * 前台检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function user_is_login(){
    $username = session('username');
    if (empty($username)) {
        return false;
    } else {
        return $username;
    }
}

/**
 * 获取文档封面图片
 * @param int $cover_id
 * @param string $field
 * @return 完整的数据  或者  指定的$field字段值
 * @author 
 */
function get_cover($cover_id, $field = null){
    if(empty($cover_id)){
        return false;
    }

    $picture = Db::name('picture')->where(array('status'=>1,'id'=>$cover_id))->find();
    
    if($field == 'path'){
        if(!empty($picture['url'])){
            $picture['path'] = $picture['url'];
        }else{
            $picture['path'] = '/uploads/'.$picture['path'];
        }
    }
    return empty($field) ? $picture : $picture[$field];
}

/**
 * 短信发送
 * @param $to    接收人
 * @param $model    短信模板ID
 * @param $code   短信验证码
 * @return json
 * @
 */
function send_sms($to, $model, $code)
{
    require_once '../extend/Aliyun_sms/vendor/autoload.php';
    Config::load(); //加载区域结点配置
    $accessKeyId = 'LTAI4Fe7icorifvdy5Gcyzmg';
    $accessKeySecret = '0c2ysACsjrwpOpuxxfFbCodBv1ESkB';
    $templateParam = array('code'=>$code);
    //短信签名
    $signName = '衣橱邦';
    //短信模板ID
    switch ($model) {
        case 1:
            $templateCode = 'SMS_175076022'; // 注册登录短信验证码模板
            break;
        case 2:
            $templateCode = 'SMS_175076022'; // 重置密码短信验证码模板
            break;
    }
    //短信API产品名（短信产品名固定，无需修改）
    $product = "Dysmsapi";
    //短信API产品域名（接口地址固定，无需修改）
    $domain = "dysmsapi.aliyuncs.com";
    //暂时不支持多Region（目前仅支持cn-hangzhou请勿修改）
    $region = "cn-hangzhou";
    // 初始化用户Profile实例
    $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
    // 增加服务结点
    DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
    // 初始化AcsClient用于发起请求
    $acsClient = new DefaultAcsClient($profile);
    // 初始化SendSmsRequest实例用于设置发送短信的参数
    $request = new SendSmsRequest();
    // 必填，设置雉短信接收号码
    $request->setPhoneNumbers($to);
    // 必填，设置签名名称
    $request->setSignName($signName);
    // 必填，设置模板CODE
    $request->setTemplateCode($templateCode);
    // 可选，设置模板参数
    if ($templateParam) {
        $request->setTemplateParam(json_encode($templateParam));
    }
    //发起访问请求
    $acsResponse = $acsClient->getAcsResponse($request);
    //返回请求结果
    $result = json_decode(json_encode($acsResponse), true);
    // 具体返回值参考文档：https://help.aliyun.com/document_detail/55451.html?spm=a2c4g.11186623.6.563.YSe8FK
    return $result;
}