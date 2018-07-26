<?php
namespace getui\Core\Request;

use getui\Protobuf\Message;
use getui\Protobuf\Type\PbBool;

class ActionChain extends Message
{
    public $wired_type = Message::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["1"] = "";
        $this->fields["2"] = "\\getui\\Core\\Request\\ActionChain\\Type";
        $this->values["2"] = "";
        $this->fields["3"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["3"] = "";
        $this->fields["100"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["100"] = "";
        $this->fields["101"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["101"] = "";
        $this->fields["102"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["102"] = "";
        $this->fields["103"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["103"] = "";
        $this->fields["104"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["104"] = "";
        $this->fields["105"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["105"] = "";
        $this->fields["106"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["106"] = "";
        $this->fields["107"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["107"] = "";
        $this->fields["120"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["120"] = "";
        $this->fields["121"] = "\\getui\\Core\\Request\\Button";
        $this->values["121"] = array();
        $this->fields["140"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["140"] = "";
        $this->fields["141"] = "\\getui\\Core\\Request\\AppStartUp";
        $this->values["141"] = "";
        $this->fields["142"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["142"] = "";
        $this->fields["143"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["143"] = "";
        $this->fields["160"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["160"] = "";
        $this->fields["161"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["161"] = "";
        $this->fields["162"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["162"] = "";
        $this->values["162"] = new PbBool();
        $this->values["162"]->value = false;
        $this->fields["180"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["180"] = "";
        $this->fields["181"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["181"] = "";
        $this->fields["182"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["182"] = "";
        $this->fields["183"] = "\\getui\\Core\\Request\\ActionChain\\SMSStatus";
        $this->values["183"] = "";
        $this->fields["200"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["200"] = "";
        $this->fields["201"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["201"] = "";
        $this->fields["220"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["220"] = "";
        $this->fields["223"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["223"] = "";
        $this->fields["225"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["225"] = "";
        $this->fields["226"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["226"] = "";
        $this->fields["227"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["227"] = "";
        $this->fields["241"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["241"] = "";
        $this->fields["242"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["242"] = "";
        $this->fields["260"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["260"] = "";
        $this->fields["280"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["280"] = "";
        $this->fields["281"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["281"] = "";
        $this->fields["300"] = "\\getui\\Protobuf\\Type\\PbBool";
        $this->values["300"] = "";
        $this->fields["320"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["320"] = "";
        $this->fields["340"] = "\\getui\\Protobuf\\Type\\PbInt";
        $this->values["340"] = "";
        $this->fields["360"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["360"] = "";
        $this->fields["380"] = "\\getui\\Protobuf\\Type\\PbString";
        $this->values["380"] = "";
        $this->fields["381"] = "\\getui\\Core\\Request\\InnerField";
        $this->values["381"] = array();
    }

    public function actionId()
    {
        return $this->_get_value("1");
    }

    public function set_actionId($value)
    {
        return $this->_set_value("1", $value);
    }

    public function type()
    {
        return $this->_get_value("2");
    }

    public function set_type($value)
    {
        return $this->_set_value("2", $value);
    }

    public function next()
    {
        return $this->_get_value("3");
    }

    public function set_next($value)
    {
        return $this->_set_value("3", $value);
    }

    public function logo()
    {
        return $this->_get_value("100");
    }

    public function set_logo($value)
    {
        return $this->_set_value("100", $value);
    }

    public function logoURL()
    {
        return $this->_get_value("101");
    }

    public function set_logoURL($value)
    {
        return $this->_set_value("101", $value);
    }

    public function title()
    {
        return $this->_get_value("102");
    }

    public function set_title($value)
    {
        return $this->_set_value("102", $value);
    }

    public function text()
    {
        return $this->_get_value("103");
    }

    public function set_text($value)
    {
        return $this->_set_value("103", $value);
    }

    public function clearable()
    {
        return $this->_get_value("104");
    }

    public function set_clearable($value)
    {
        return $this->_set_value("104", $value);
    }

    public function ring()
    {
        return $this->_get_value("105");
    }

    public function set_ring($value)
    {
        return $this->_set_value("105", $value);
    }

    public function buzz()
    {
        return $this->_get_value("106");
    }

    public function set_buzz($value)
    {
        return $this->_set_value("106", $value);
    }

    public function bannerURL()
    {
        return $this->_get_value("107");
    }

    public function set_bannerURL($value)
    {
        return $this->_set_value("107", $value);
    }

    public function img()
    {
        return $this->_get_value("120");
    }

    public function set_img($value)
    {
        return $this->_set_value("120", $value);
    }

    public function buttons($offset)
    {
        return $this->_get_arr_value("121", $offset);
    }

    public function add_buttons()
    {
        return $this->_add_arr_value("121");
    }

    public function set_buttons($index, $value)
    {
        $this->_set_arr_value("121", $index, $value);
    }

    public function remove_last_buttons()
    {
        $this->_remove_last_arr_value("121");
    }

    public function buttons_size()
    {
        return $this->_get_arr_size("121");
    }

    public function appid()
    {
        return $this->_get_value("140");
    }

    public function set_appid($value)
    {
        return $this->_set_value("140", $value);
    }

    public function appstartupid()
    {
        return $this->_get_value("141");
    }

    public function set_appstartupid($value)
    {
        return $this->_set_value("141", $value);
    }

    public function autostart()
    {
        return $this->_get_value("142");
    }

    public function set_autostart($value)
    {
        return $this->_set_value("142", $value);
    }

    public function failedAction()
    {
        return $this->_get_value("143");
    }

    public function set_failedAction($value)
    {
        return $this->_set_value("143", $value);
    }

    public function url()
    {
        return $this->_get_value("160");
    }

    public function set_url($value)
    {
        return $this->_set_value("160", $value);
    }

    public function withcid()
    {
        return $this->_get_value("161");
    }

    public function set_withcid($value)
    {
        return $this->_set_value("161", $value);
    }

    public function is_withnettype()
    {
        return $this->_get_value("162");
    }

    public function set_is_withnettype($value)
    {
        return $this->_set_value("162", $value);
    }

    public function address()
    {
        return $this->_get_value("180");
    }

    public function set_address($value)
    {
        return $this->_set_value("180", $value);
    }

    public function content()
    {
        return $this->_get_value("181");
    }

    public function set_content($value)
    {
        return $this->_set_value("181", $value);
    }

    public function ct()
    {
        return $this->_get_value("182");
    }

    public function set_ct($value)
    {
        return $this->_set_value("182", $value);
    }

    public function flag()
    {
        return $this->_get_value("183");
    }

    public function set_flag($value)
    {
        return $this->_set_value("183", $value);
    }

    public function successedAction()
    {
        return $this->_get_value("200");
    }

    public function set_successedAction($value)
    {
        return $this->_set_value("200", $value);
    }

    public function uninstalledAction()
    {
        return $this->_get_value("201");
    }

    public function set_uninstalledAction($value)
    {
        return $this->_set_value("201", $value);
    }

    public function name()
    {
        return $this->_get_value("220");
    }

    public function set_name($value)
    {
        return $this->_set_value("220", $value);
    }

    public function autoInstall()
    {
        return $this->_get_value("223");
    }

    public function set_autoInstall($value)
    {
        return $this->_set_value("223", $value);
    }

    public function wifiAutodownload()
    {
        return $this->_get_value("225");
    }

    public function set_wifiAutodownload($value)
    {
        return $this->_set_value("225", $value);
    }

    public function forceDownload()
    {
        return $this->_get_value("226");
    }

    public function set_forceDownload($value)
    {
        return $this->_set_value("226", $value);
    }

    public function showProgress()
    {
        return $this->_get_value("227");
    }

    public function set_showProgress($value)
    {
        return $this->_set_value("227", $value);
    }

    public function post()
    {
        return $this->_get_value("241");
    }

    public function set_post($value)
    {
        return $this->_set_value("241", $value);
    }

    public function headers()
    {
        return $this->_get_value("242");
    }

    public function set_headers($value)
    {
        return $this->_set_value("242", $value);
    }

    public function groupable()
    {
        return $this->_get_value("260");
    }

    public function set_groupable($value)
    {
        return $this->_set_value("260", $value);
    }

    public function mmsTitle()
    {
        return $this->_get_value("280");
    }

    public function set_mmsTitle($value)
    {
        return $this->_set_value("280", $value);
    }

    public function mmsURL()
    {
        return $this->_get_value("281");
    }

    public function set_mmsURL($value)
    {
        return $this->_set_value("281", $value);
    }

    public function preload()
    {
        return $this->_get_value("300");
    }

    public function set_preload($value)
    {
        return $this->_set_value("300", $value);
    }

    public function taskid()
    {
        return $this->_get_value("320");
    }

    public function set_taskid($value)
    {
        return $this->_set_value("320", $value);
    }

    public function duration()
    {
        return $this->_get_value("340");
    }

    public function set_duration($value)
    {
        return $this->_set_value("340", $value);
    }

    public function date()
    {
        return $this->_get_value("360");
    }

    public function set_date($value)
    {
        return $this->_set_value("360", $value);
    }

    public function stype()
    {
        return $this->_get_value("380");
    }

    public function set_stype($value)
    {
        return $this->_set_value("380", $value);
    }

    public function field($offset)
    {
        return $this->_get_arr_value("381", $offset);
    }

    public function add_field()
    {
        return $this->_add_arr_value("381");
    }

    public function set_field($index, $value)
    {
        $this->_set_arr_value("381", $index, $value);
    }

    public function remove_last_field()
    {
        $this->_remove_last_arr_value("381");
    }

    public function field_size()
    {
        return $this->_get_arr_size("381");
    }
}