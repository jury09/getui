<?php

namespace getui;

use getui\Core\AppMessage;
use getui\Core\ListMessage;
use getui\Core\SingleMessage;
use getui\Core\Target;
use getui\Core\Template;

class Getui
{
    /**
     * @var string
     */
    protected $app_id;
    /**
     * @var Push
     */
    protected $igt;
    /**
     * Whether or not send offline message.
     *
     * @var bool;
     */
    protected $is_offline;
    /**
     * Offline message expire time.
     *
     * @var int
     */
    protected $offline_expire_time;
    /**
     * Network type.
     *
     * @var int
     */
    protected $network_type;

    /**
     * @var array $config
     */
    protected $config;

    /**
     * Getui constructor.
     *
     * @param array $config
     * @throws \Exception
     */
    public function __construct($config = [])
    {
        if (empty($config)) {
            throw new \Exception('缺少参数config');
        }
        $this->config = $this->config($config);

        $this->app_id = $this->config['basic']['app_id'] ?? '';
        $this->igt = new Push($this->config['basic']['host'], $this->config['basic']['app_key'], $this->config['basic']['master_secret']);
        $this->is_offline = $this->config['push']['is_offline'];
        $this->offline_expire_time = $this->config['push']['offline_expire_time'];
        $this->network_type = $this->config['push']['network_type'];
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

    /**
     * Push message to single user.
     *
     * @param $data
     *
     * @return bool|array
     */
    public function pushMessageToSingle($data)
    {
        // 解析数据
        $template_type = $data['template_type'];
        $template_data = $data['template_data'];
        $cid = $data['cid'];
        $is_off_line = isset($data['template_data']['is_offline']) ?
            (bool)$data['template_data']['is_offline'] : $this->is_offline;
        $offline_expire_time = isset($data['template_data']['is_offline']) ?
            (int)$data['template_data']['offline_expire_time'] * 1000 * 3600 :
            $this->offline_expire_time * 1000 * 3600;
        $network_type = isset($data['template_data']['network_type']) ?
            (int)$data['template_data']['network_type'] : $this->network_type;

        $getui_template = new Template($template_type, $template_data, $this->config);
        $template = $getui_template->getTemplate();
        $message = new SingleMessage();
        $message->set_isOffline($is_off_line);
        if ($is_off_line) {
            $message->set_offlineExpireTime($offline_expire_time);
        }
        $message->set_pushNetWorkType($network_type);
        $message->set_data($template);
        // 接收方
        $target = new Target();
        $target->set_appId($this->app_id);
        $target->set_clientId($cid);

        $rep = $this->igt->pushMessageToSingle($message, $target);
        return $rep;
    }

    /**
     * Push message to user list
     *
     * @param $data
     *
     * @return mixed|null
     */
    public function pushMessageToList($data)
    {
        // 解析数据
        $template_type = $data['template_type'];
        $template_data = $data['template_data'];
        $is_off_line = isset($data['template_data']['is_offline']) ?
            (bool)$data['template_data']['is_offline'] : $this->is_offline;
        $offline_expire_time = isset($data['template_data']['is_offline']) ?
            (int)$data['template_data']['offline_expire_time'] * 1000 * 3600 :
            $this->offline_expire_time * 1000 * 3600;
        $network_type = isset($data['template_data']['network_type']) ?
            (int)$data['template_data']['network_type'] : $this->network_type;
        $getui_template = new Template($template_type, $template_data, $this->config);
        $template = $getui_template->getTemplate();
        $message = new ListMessage();
        $message->set_isOffline($is_off_line);
        if ($is_off_line) {
            $message->set_offlineExpireTime($offline_expire_time);
        }
        $message->set_pushNetWorkType($network_type);
        $message->set_data($template);
        $contentId = $this->igt->getContentId($message);
        $target_list = [];

        // 接收方列表
        foreach ($data['cid_list'] as $cid) {
            $target = new Target();
            $target->set_appId($this->app_id);
            $target->set_clientId($cid);
            $target_list[] = $target;
        }
        if (!empty($target_list)) {
            $rep = $this->igt->pushMessageToList($contentId, $target_list);
            return $rep;
        }
        return null;
    }

    /**
     * Push message to specific app.
     *
     * @param $data
     *
     * @return mixed|null
     */
    public function pushMessageToApp($data)
    {
        // 解析数据
        $template_type = $data['template_type'];
        $template_data = $data['template_data'];
        $is_off_line = isset($data['template_data']['is_offline']) ?
            (bool)$data['template_data']['is_offline'] : $this->is_offline;
        $offline_expire_time = isset($data['template_data']['is_offline']) ?
            (int)$data['template_data']['offline_expire_time'] * 1000 * 3600 :
            $this->offline_expire_time * 1000 * 3600;
        $network_type = isset($data['template_data']['network_type']) ?
            (int)$data['template_data']['network_type'] : $this->network_type;

        $getui_template = new Template($template_type, $template_data, $this->config);
        $template = $getui_template->getTemplate();
        $message = new AppMessage();
        $message->set_isOffline($is_off_line);
        if ($is_off_line) {
            $message->set_offlineExpireTime($offline_expire_time);
        }
        //是否只发送ios(bill增加)
        $is_only_ios = $data['template_data']['is_only_ios'] ? true : false;
        $is_ios = $data['template_data']['is_ios'] ? true : false;
        if ($is_only_ios && $is_ios) {
            $message->set_phoneTypeList(array('IOS'));
        }
        //区域条件
        $regionsList = $data['template_data']['regionsList'] ? $data['template_data']['regionsList'] : '';
        if ($regionsList) {
            $message->set_provinceList($regionsList);
        }
        $message->set_pushNetWorkType($network_type);
        $message->set_appIdList(array($this->app_id));
        $message->set_data($template);

        $rep = $this->igt->pushMessageToApp($message);
        return $rep;
    }

    /*
     * 获取推送结果
     */
    public function getPushResult($taskId)
    {
        $rep = $this->igt->getPushResult($taskId);
        return $rep;
    }

    /**
     * 根据时间获取App用户信息
     *
     * @param string $date "20140807"
     * @return mixed|null
     */
    public function getAppUserDataByDate($date)
    {
        $rep = $this->igt->queryAppUserDataByDate($this->config['app_id'], $date);
        return $rep;
    }

    /**
     * 根据时间获取App推送信息
     *
     * @param string $date "20140807"
     * @return mixed|null
     */
    public function getAppPushDataByDate($date)
    {
        $rep = $this->igt->queryAppPushDataByDate($this->config['app_id'], $date);
        return $rep;
    }
}