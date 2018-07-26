<?php

require_once dirname(__FILE__) . '/../../autoload.php';

$config = [
    // 个推基础信息，在平台新建应用的时候生成
    'basic' => [
        'host' => "http://sdk.open.api.igexin.com/apiex.htm",
        'app_id' => "",
        'app_key' => "",
        'master_secret' => ""
    ],

// 推送消息的基础设置
    'push' => [
        'is_ring' => true,  //是否响铃
        'is_vibrate' => true,  // 是否振动
        'is_clearable' => true,  // 是否可清除
        'is_offline' => true,  // 是否发送离线消息
        'offline_expire_time' => 5, // 离线消息过期时间，单位为小时（范围：0- 72），该时间段内 cid 在线过的用户均可收到通知
        'network_type' => 0,  // 是否根据网络环境推送消息，0为不限制推送，1为wifi推送，2为4G/3G/2G
    ]
];

$getuiSdk = new \getui\Getui($config);

$data = [
    'template_type' => 4,
    'template_data' => [
        'transmission_type' => 1, // 是否立即启动应用：1 立即启动 2 等待客户端自启动，必填
        'transmission_content' => '哈哈哈哈哈', // 透传内容，不支持转义字符，string(2048), 必填
        'is_ios' => true, // 是否支持 ios （默认不支持），boolean
        'is_content_available' => false, // 推送是否直接带有透传数据（默认否）, boolean
        'badge' => '', // 应用icon上显示的数字，int
        'sound' => '', // 通知铃声文件名，string
        'category' => '', // 在客户端通知栏触发特定的action和button显示，string
        'custom_msg' => [
            'key1' => 'value1',
            'key2' => 'value2',
        ], // 增加自定义的数据
        'title' => '哈哈哈哈哈', // 通知标题，string
        'text' => '李申你11好', // 通知内容，string
    ],
    'cid' => '10ca30f102e8aa788515fd37a68b1c96', // 推送通知至指定用户时填写
    'cid_list' => [], // 推送通知至指定用户列表时填写
];

$rsp = $getuiSdk->pushMessageToSingle($data);

print_r($rsp);
