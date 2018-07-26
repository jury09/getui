<?php

require_once dirname(__FILE__) . '/../../autoload.php';

// http的域名
define('HOST', 'http://sdk.open.api.igexin.com/apiex.htm');

// https的域名
//define('HOST','https://api.getui.com/apiex.htm');


define('APPKEY', 'a1paIiACkj6YTnCcstJWV3');
define('APPID', 'kUz1Jfo3Pc9bLpBhVbUVW6');
define('MASTERSECRET', 'lNKFMesoFY7EW8E2p1pds9');
define('CID', '10ca30f102e8aa788515fd37a68b1c96');
define('CID1', '10ca30f102e8aa788515fd37a68b1c96');
define('CID2', '10ca30f102e8aa788515fd37a68b1c96');
define('DEVICETOKEN', '');
define('Alias', '请输入别名');
//define('BEGINTIME','2015-03-06 13:18:00');
//define('ENDTIME','2015-03-06 13:24:00');

// 获取person tags
function getPersonaTagsDemo()
{
    $igt = new \getui\Push(HOST, APPKEY, MASTERSECRET);
    $ret = $igt->getPersonaTags(APPID);
    var_dump($ret);
}

// 根据tag获取用户数量
function getUserCountByTagsDemo()
{
    $igt = new \getui\Push(HOST, APPKEY, MASTERSECRET);
    $tagList = array("金在中", "龙卷风");
    $ret = $igt->getUserCountByTags(APPID, $tagList);
    var_dump($ret);
}

// 根据时间获取推送消息结果
function getPushMessageResultDemo()
{
    $igt = new \getui\Push(HOST, APPKEY, MASTERSECRET);

    $ret = $igt->getPushResult("OSA-0522_QZ7nHpBlxF6vrxGaLb1FA3");
    var_dump($ret);

    $ret = $igt->queryAppUserDataByDate(APPID, "20140807");
    var_dump($ret);

    $ret = $igt->queryAppPushDataByDate(APPID, "20140807");
    var_dump($ret);
}

// 用户状态查询
function getUserStatus()
{
    $igt = new \getui\Push(HOST, APPKEY, MASTERSECRET);
    $rep = $igt->getClientIdStatus(APPID, CID);
    var_dump($rep);
    echo("<br><br>");
}

// 推送任务停止
function stoptask()
{
    $igt = new \getui\Push(HOST, APPKEY, MASTERSECRET);
    $igt->stop("OSA-1127_QYZyBzTPWz5ioFAixENzs3");
}
/**
 * 服务端推送接口，支持三个接口推送
 * 1.pushMessageToSingle：支持对单个用户进行推送
 * 2.pushMessageToList接口：支持对多个用户进行推送，建议为50个用户
 * 3.pushMessageToApp接口：对单个应用下的所有用户进行推送，可根据省份，标签，机型过滤推送
 */

// 1.pushMessageToSingle: 对单个用户进行推送
function pushMessageToSingle()
{
    $igt = new \getui\Push(NULL, APPKEY, MASTERSECRET, false);

    // 消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板

    // $template = IGtNotyPopLoadTemplateDemo();
    // $template = IGtLinkTemplateDemo();
    // $template = IGtNotificationTemplateDemo();
    $template = IGtTransmissionTemplateDemo();

    //个推信息体
    $message = new \getui\Core\SingleMessage();

    $message->set_isOffline(true); // 是否离线
    $message->set_offlineExpireTime(3600 * 12 * 1000); // 离线时间
    $message->set_data($template); // 设置推送消息类型
    // $message->set_PushNetWorkType(0); // 设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
    //接收方
    $target = new \getui\Core\Target();
    $target->set_appId(APPID);
    $target->set_clientId(CID);
    // $target->set_alias(Alias);

    try {
        $rep = $igt->pushMessageToSingle($message, $target);
        var_dump($rep);
        echo("<br><br>");
    } catch (\getui\Exception\RequestException $e) {
        $requstId = $e->getRequestId();
        $rep = $igt->pushMessageToSingle($message, $target, $requstId);
        var_dump($rep);
        echo("<br><br>");
    }
}

// pushMessageToSingleBatch: 对单个用户进行批量推送
function pushMessageToSingleBatch()
{
    putenv("gexin_pushSingleBatch_needAsync=false");

    $igt = new \getui\Push(HOST, APPKEY, MASTERSECRET);
    $batch = new \getui\Batch(APPKEY, $igt);
    $batch->setApiUrl(HOST);
    // $igt->connect();
    // 消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板

    // $template = IGtNotyPopLoadTemplateDemo();
    $templateLink = IGtLinkTemplateDemo();
    $templateNoti = IGtNotificationTemplateDemo();
    // $template = IGtTransmissionTemplateDemo();

    // 个推信息体
    $messageLink = new \getui\Core\SingleMessage();
    $messageLink->set_isOffline(true);//是否离线
    $messageLink->set_offlineExpireTime(12 * 1000 * 3600);//离线时间
    $messageLink->set_data($templateLink);//设置推送消息类型
    // $messageLink->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送

    $targetLink = new \getui\Core\Target();
    $targetLink->set_appId(APPID);
    $targetLink->set_clientId(CID1);
    $batch->add($messageLink, $targetLink);

    // 个推信息体
    $messageNoti = new \getui\Core\SingleMessage();
    $messageNoti->set_isOffline(true);//是否离线
    $messageNoti->set_offlineExpireTime(12 * 1000 * 3600);//离线时间
    $messageNoti->set_data($templateNoti);//设置推送消息类型
    // $messageNoti->set_PushNetWorkType(1);//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送

    $targetNoti = new \getui\Core\Target();
    $targetNoti->set_appId(APPID);
    $targetNoti->set_clientId(CID2);
    $batch->add($messageNoti, $targetNoti);
    try {
        $rep = $batch->submit();
        var_dump($rep);
        echo("<br><br>");
    } catch (Exception $e) {
        $rep = $batch->retry();
        var_dump($rep);
        echo("<br><br>");
    }
}

// pushMessageToList: 支持对多个用户进行推送，建议为50个用户
function pushMessageToList()
{
    putenv("gexin_pushList_needDetails=true");
    putenv("gexin_pushList_needAsync=true");

    $igt = new \getui\Push(HOST, APPKEY, MASTERSECRET);
    // 消息模版：
    // 1.TransmissionTemplate:透传功能模板
    // 2.LinkTemplate:通知打开链接功能模板
    // 3.NotificationTemplate：通知透传功能模板
    // 4.NotyPopLoadTemplate：通知弹框下载功能模板


    //$template = IGtNotyPopLoadTemplateDemo();
    //$template = IGtLinkTemplateDemo();
    //$template = IGtNotificationTemplateDemo();
    $template = IGtTransmissionTemplateDemo();
    //个推信息体
    $message = new \getui\Core\ListMessage();
    $message->set_isOffline(true);//是否离线
    $message->set_offlineExpireTime(3600 * 12 * 1000);//离线时间
    $message->set_data($template);//设置推送消息类型
//    $message->set_PushNetWorkType(1);	//设置是否根据WIFI推送消息，1为wifi推送，0为不限制推送
//    $contentId = $igt->getContentId($message);
    $contentId = $igt->getContentId($message,"toList任务别名功能");	//根据TaskId设置组名，支持下划线，中文，英文，数字

    //接收方1
    $target1 = new \getui\Core\Target();
    $target1->set_appId(APPID);
    $target1->set_clientId(CID);
//    $target1->set_alias(Alias);

    $targetList[] = $target1;

    $rep = $igt->pushMessageToList($contentId, $targetList);

    var_dump($rep);

    echo ("<br><br>");
}

// pushMessageToApp：对单个应用下的所有用户进行推送，可根据省份，标签，机型过滤推送
function pushMessageToApp(){
    $igt = new \getui\Push(HOST,APPKEY,MASTERSECRET);
    $template = IGtTransmissionTemplateDemo();
    //$template = IGtLinkTemplateDemo();
    //个推信息体
    //基于应用消息体
    $message = new \getui\Core\AppMessage();
    $message->set_isOffline(true);
    $message->set_offlineExpireTime(10 * 60 * 1000);//离线时间单位为毫秒，例，两个小时离线为3600*1000*2
    $message->set_data($template);

    $appIdList=array(APPID);
    $phoneTypeList=array('ANDROID');
    $provinceList=array('浙江');
    $tagList=array('haha');
    //用户属性
    //$age = array("0000", "0010");


    //$cdt = new AppConditions();
    // $cdt->addCondition(AppConditions::PHONE_TYPE, $phoneTypeList);
    // $cdt->addCondition(AppConditions::REGION, $provinceList);
    //$cdt->addCondition(AppConditions::TAG, $tagList);
    //$cdt->addCondition("age", $age);

    $message->set_appIdList($appIdList);
    //$message->set_conditions($cdt->getCondition());

    $rep = $igt->pushMessageToApp($message,"任务组名");

    var_dump($rep);
    echo ("<br><br>");
}

// 所有推送接口均支持四个消息模板，依次为通知弹框下载模板，通知链接模板，通知透传模板，透传模板
// 注：IOS离线推送需通过APN进行转发，需填写pushInfo字段，目前仅不支持通知弹框下载功能

// 通知弹框下载模板
function IGtNotyPopLoadTemplateDemo()
{
    $template = new \getui\Template\NotyPopLoadTemplate();

    $template->set_appId(APPID);//应用appid
    $template->set_appkey(APPKEY);//应用appkey
    //通知栏
    $template->set_notyTitle("个推");//通知栏标题
    $template->set_notyContent("个推最新版点击下载");//通知栏内容
    $template->set_notyIcon("");//通知栏logo
    $template->set_isBelled(true);//是否响铃
    $template->set_isVibrationed(true);//是否震动
    $template->set_isCleared(true);//通知栏是否可清除
    //弹框
    $template->set_popTitle("弹框标题");//弹框标题
    $template->set_popContent("弹框内容");//弹框内容
    $template->set_popImage("");//弹框图片
    $template->set_popButton1("下载");//左键
    $template->set_popButton2("取消");//右键
    //下载
    $template->set_loadIcon("");//弹框图片
    $template->set_loadTitle("地震速报下载");
    $template->set_loadUrl("http://dizhensubao.igexin.com/dl/com.ceic.apk");
    $template->set_isAutoInstall(false);
    $template->set_isActived(true);
    //$template->set_duration(BEGINTIME,ENDTIME); // 设置ANDROID客户端在此时间区间内展示消息

    return $template;
}

// 通知链接模板
function IGtLinkTemplateDemo()
{
    $template = new \getui\Template\LinkTemplate();
    $template->set_appId(APPID);//应用appid
    $template->set_appkey(APPKEY);//应用appkey
    $template->set_title("请输入通知标题");//通知栏标题
    $template->set_text("请输入通知内容");//通知栏内容
    $template->set_logo("");//通知栏logo
    $template->set_isRing(true);//是否响铃
    $template->set_isVibrate(true);//是否震动
    $template->set_isClearable(true);//通知栏是否可清除
    $template->set_url("http://www.igetui.com/");//打开连接地址
    //$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
    return $template;
}

// 通知透传模板
function IGtNotificationTemplateDemo()
{
    $template = new \getui\Template\NotificationTemplate();
    $template->set_appId(APPID);//应用appid
    $template->set_appkey(APPKEY);//应用appkey
    $template->set_transmissionType(1);//透传消息类型
    $template->set_transmissionContent("测试离线");//透传内容
    $template->set_title("个推");//通知栏标题
    $template->set_text("个推最新版点击下载");//通知栏内容
    $template->set_logo("http://wwww.igetui.com/logo.png");//通知栏logo
    $template->set_isRing(true);//是否响铃
    $template->set_isVibrate(true);//是否震动
    $template->set_isClearable(true);//通知栏是否可清除
    //$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
    return $template;
}

// 透传模板
function IGtTransmissionTemplateDemo()
{
    $template = new \getui\Template\TransmissionTemplate();
    $template->set_appId(APPID); // 应用appid
    $template->set_appkey(APPKEY); // 应用appkey
    $template->set_transmissionType(1); // 透传消息类型
    $template->set_transmissionContent("测试离线ddd"); // 透传内容
    // $template->set_duration(BEGINTIME,ENDTIME); // 设置ANDROID客户端在此时间区间内展示消息
    //APN简单推送
//        $template = new IGtAPNTemplate();
//        $apn = new IGtAPNPayload();
//        $alertmsg=new SimpleAlertMsg();
//        $alertmsg->alertMsg="";
//        $apn->alertMsg=$alertmsg;
////        $apn->badge=2;
////        $apn->sound="";
//        $apn->add_customMsg("payload","payload");
//        $apn->contentAvailable=1;
//        $apn->category="ACTIONABLE";
//        $template->set_apnInfo($apn);
//        $message = new IGtSingleMessage();

    //APN高级推送
    $apn = new \getui\Core\APNPayload();
    $alertmsg = new \getui\Core\AlertMsg\Dictionary();
    $alertmsg->body = "body";
    $alertmsg->actionLocKey = "ActionLockey";
    $alertmsg->locKey = "LocKey";
    $alertmsg->locArgs = array("locargs");
    $alertmsg->launchImage = "launchimage";
    // IOS8.2 支持
    $alertmsg->title = "Title";
    $alertmsg->titleLocKey = "TitleLocKey";
    $alertmsg->titleLocArgs = array("TitleLocArg");

    $apn->alertMsg = $alertmsg;
    $apn->badge = 7;
    $apn->sound = "";
    $apn->add_customMsg("payload", "payload");
    $apn->contentAvailable = 1;
    $apn->category = "ACTIONABLE";
    $template->set_apnInfo($apn);

    return $template;
}

pushMessageToSingle();