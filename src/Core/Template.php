<?php

namespace getui\Core;

use getui\Core\AlertMsg\Dictionary;
use getui\Template\LinkTemplate;
use getui\Template\NotificationTemplate;
use getui\Template\NotyPopLoadTemplate;
use getui\Template\TransmissionTemplate;

class Template
{
    /**
     * @var string
     */
    protected $app_id;
    /**
     * @var string
     */
    protected $app_key;
    /**
     * Whether or not the phone rings when receive push message.
     *
     * @var bool
     */
    protected $is_ring;
    /**
     * Whether or not the phone vibrates when receive push message.
     *
     * @var bool
     */
    protected $is_vibrate;
    /**
     * Whether or not the push message is clearable.
     *
     * @var bool
     */
    protected $is_clearable;
    /**
     * Template type.
     *
     * @var integer
     */
    protected $type;
    /**
     * The params that template requires.
     *
     * @var mixed
     */
    protected $template_data;
    /**
     * GetuiTemplate constructor.
     *
     * @param $type
     * @param $template_data
     * @param $config
     */
    public function __construct($type, $template_data, $config)
    {
        $config = $this->config($config);
        $this->app_id = $config['basic']['app_id'];
        $this->app_key = $config['basic']['app_key'];
        $this->is_ring = $config['push']['is_ring'];
        $this->is_vibrate = $config['push']['is_vibrate'];
        $this->is_clearable = $config['push']['is_clearable'];
        $this->type = $type;
        $this->template_data = $template_data;
    }

    public function getTemplate()
    {
        switch ($this->type) {
            case 1:
                $template = $this->IGtNotificationTemplate();
                break;
            case 2:
                $template = $this->IGtLinkTemplate();
                break;
            case 3:
                $template = $this->IGtNotyPopLoadTemplate();
                break;
            case 4:
                $template = $this->IGtTransmissionTemplate();
                break;
            default:
                $template = '';
        }
        return $template;
    }
    /**
     * 点击通知打开应用模板
     */
    private function IGtNotificationTemplate()
    {
        // 解析模板数据
        extract($this->template_data);
        $template = new NotificationTemplate();
        $template->set_appId($this->app_id);
        $template->set_appkey($this->app_key);
        $template->set_transmissionType((int)$transmission_type);
        $template->set_transmissionContent($transmission_content);
        $template->set_title($title);
        $template->set_text($text);
        $template->set_isRing(isset($is_ring) ? (boolean)$is_ring : $this->is_ring);
        $template->set_isVibrate(isset($is_vibrate) ? (boolean)$is_vibrate : $this->is_vibrate);
        $template->set_isClearable(isset($is_clearable) ? (boolean)$is_clearable : $this->is_clearable);
        if (isset($begin_at) && isset($end_at)) {
            $template->set_duration(
                date_format(date_create($begin_at), 'Y-m-d H:i:s'),
                date_format(date_create($end_at), 'Y-m-d H:i:s')
            );
        }
        return $template;
    }
    /**
     * 点击通知打开网页模板
     */
    private function IGtLinkTemplate()
    {
        // 解析模板数据
        extract($this->template_data);
        $template = new LinkTemplate();
        $template->set_appId($this->app_id);
        $template->set_appkey($this->app_key);
        $template->set_title($title);
        $template->set_text($text);
        $template->set_url($url);
        $template->set_isRing(isset($is_ring) ? (boolean)$is_ring : $this->is_ring);
        $template->set_isVibrate(isset($is_vibrate) ? (boolean)$is_vibrate : $this->is_vibrate);
        $template->set_isClearable(isset($is_clearable) ? (boolean)$is_clearable : $this->is_clearable);
        if (isset($begin_at) && isset($end_at)) {
            $template->set_duration(
                date_format(date_create($begin_at), 'Y-m-d H:i:s'),
                date_format(date_create($end_at), 'Y-m-d H:i:s')
            );
        }
        return $template;
    }
    /**
     * 点击通知弹窗下载模板
     */
    private function IGtNotyPopLoadTemplate()
    {
        // 解析模板数据
        extract($this->template_data);
        $template = new NotyPopLoadTemplate();
        $template->set_appId($this->app_id);
        $template->set_appkey($this->app_key);
        // 通知栏
        $template->set_notyTitle($title);
        $template->set_notyContent($text);
        // 弹框
        $template->set_popTitle($pop_title);
        $template->set_popContent($pop_content);
        $template->set_popImage($pop_image);
        $template->set_popButton1("下载");
        $template->set_popButton2("");
        // 下载
        $template->set_loadIcon($load_icon);
        $template->set_loadTitle($load_title);
        $template->set_loadUrl("$load_url");
        $template->set_isAutoInstall(isset($is_auto_install) ? (boolean)$is_auto_install : false);
        $template->set_isActived(isset($is_actived) ? (boolean)$is_actived : false);
        $template->set_isRing(isset($is_ring) ? (boolean)$is_ring : $this->is_ring);
        $template->set_isVibrate(isset($is_vibrate) ? (boolean)$is_vibrate : $this->is_vibrate);
        $template->set_isClearable(isset($is_clearable) ? (boolean)$is_clearable : $this->is_clearable);
        if (isset($begin_at) && isset($end_at)) {
            $template->set_duration(
                date_format(date_create($begin_at), 'Y-m-d H:i:s'),
                date_format(date_create($end_at), 'Y-m-d H:i:s')
            );
        }
        return $template;
    }
    /**
     * 透传消息模版
     */
    private function IGtTransmissionTemplate()
    {
        // 解析模板数据
        extract($this->template_data);
        $template = new TransmissionTemplate();
        $template->set_appId($this->app_id);
        $template->set_appkey($this->app_key);
        $template->set_transmissionType((int)$transmission_type);
        $template->set_transmissionContent($transmission_content);

        if (isset($is_ios) && (bool)$is_ios) {
            // APN高级推送
            $apn = new APNPayload();
            if (isset($is_content_available) && (bool)$is_content_available) {
                $apn->contentAvailable = 1;
            } else {
                $apn->contentAvailable = 0;
                $alertmsg = new Dictionary();
                $alertmsg->title = $title;
                $alertmsg->body = $text;
                $apn->alertMsg = $alertmsg;
            }
            if (isset($badge)) {
                $apn->badge = (int)$badge;
            }
            if (isset($sound)) {
                $apn->sound = $sound;
            }
            if (isset($category)) {
                $apn->category = $category;
            }
            if (isset($custom_msg) && count($custom_msg) > 0) {
                foreach ($custom_msg as $key => $value) {
                    $apn->add_customMsg($key, $value);
                }
            }
            $template->set_apnInfo($apn);
        }
        return $template;
    }

    /**
     * config
     *
     * @param $config
     *
     * @return array
     */
    public function config($config)
    {
        return [
            /**
             * 个推基础配置
             */
            'basic' => [
                'host' => $config['basic']['host'] ?? "http://sdk.open.api.igexin.com/apiex.htm",
                'app_id' => $config['basic']['app_id'] ?? "",
                'app_key' => $config['basic']['app_key'] ?? "",
                'master_secret' => $config['basic']['master_secret'] ?? ""
            ],
            /**
             * 推送基础配置
             */
            'push' => [
                'is_ring' => $config['push']['is_ring'] ?? true,  // 是否响铃
                'is_vibrate' => $config['push']['is_vibrate'] ?? true,  // 是否振动
                'is_clearable' => $config['push']['is_clearable'] ?? true,  // 是否可清除
                'is_offline' => $config['push']['is_offline'] ?? true,  // 是否发送离线消息
                'offline_expire_time' => $config['push']['offline_expire_time'] ?? 5, // 离线消息过期时间，单位为小时（范围：0- 72），该时间段内 cid 在线过的用户均可收到通知
                'network_type' => $config['push']['network_type'] ?? 0,  // 是否根据网络环境推送消息，0为不限制推送，1为wifi推送，2为4G/3G/2G
            ]
        ];
    }
}