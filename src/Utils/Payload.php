<?php

namespace getui\Utils;

class Payload
{
    public $APS = "aps";
    public $params;
    public $alert;
    public $badge;
    public $sound = "";

    public $alertBody;
    public $alertActionLocKey;
    public $alertLocKey;
    public $alertLocArgs;
    public $alertLaunchImage;
    public $contentAvailable;

    public function getParams()
    {
        return $this->params;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function addParam($key, $obj)
    {
        if ($this->params == null) {
            $this->params = array();
        }
        if ($this->APS == strtolower($key)) {
            throw new \Exception("the key can't be aps");
        }
        $this->params[$key] = $obj;
    }

    public function getAlert()
    {
        return $this->alert;
    }

    public function setAlert($alert)
    {
        $this->alert = $alert;
    }

    public function getBadge()
    {
        return $this->badge;
    }

    public function setBadge($badge)
    {
        $this->badge = $badge;
    }

    public function getSound()
    {
        return $this->sound;
    }

    public function setSound($sound)
    {
        $this->sound = $sound;
    }

    public function getAlertBody()
    {
        return $this->alertBody;
    }

    public function setAlertBody($alertBody)
    {
        $this->alertBody = $alertBody;
    }

    public function getAlertActionLocKey()
    {
        return $this->alertActionLocKey;
    }

    public function setAlertActionLocKey($alertActionLocKey)
    {
        $this->alertActionLocKey = $alertActionLocKey;
    }

    public function getAlertLocKey()
    {
        return $this->alertLocKey;
    }

    public function setAlertLocKey($alertLocKey)
    {
        $this->alertLocKey = $alertLocKey;
    }

    public function getAlertLaunchImage()
    {
        return $this->alertLaunchImage;
    }

    public function setAlertLaunchImage($alertLaunchImage)
    {
        $this->alertLaunchImage = $alertLaunchImage;
    }

    public function getAlertLocArgs()
    {
        return $this->alertLocArgs;
    }

    public function setAlertLocArgs($alertLocArgs)
    {
        $this->alertLocArgs = $alertLocArgs;
    }

    public function getContentAvailable()
    {
        return $this->contentAvailable;
    }

    public function setContentAvailable($contentAvailable)
    {
        $this->contentAvailable = $contentAvailable;
    }

    public function putIntoJson($key, $value, $obj)
    {
        if ($value != null) {
            $obj[$key] = $value;
        }
        return $obj;
    }

    public function toString()
    {
        $object = array();
        $apsObj = array();
        if ($this->getAlert() != null) {
            $apsObj["alert"] = urlencode($this->getAlert());
        } else {
            if ($this->getAlertBody() != null || $this->getAlertLocKey() != null) {
                $alertObj = array();
                $alertObj = $this->putIntoJson("body", ($this->getAlertBody()), $alertObj);
                $alertObj = $this->putIntoJson("action-loc-key", ($this->getAlertActionLocKey()), $alertObj);
                $alertObj = $this->putIntoJson("loc-key", ($this->getAlertLocKey()), $alertObj);
                $alertObj = $this->putIntoJson("launch-image", ($this->getAlertLaunchImage()), $alertObj);
                if ($this->getAlertLocArgs() != null) {
                    $array = array();
                    foreach ($this->getAlertLocArgs() as $str) {
                        array_push($array, ($str));
                    }
                    $alertObj["loc-args"] = $array;
                }
                $apsObj["alert"] = $alertObj;
            }
        }
        if ($this->getBadge() != null) {
            $apsObj["badge"] = $this->getBadge();
        }
        // 判断是否静音
        if ("com.gexin.ios.silence" != ($this->getSound())) {
            $apsObj = $this->putIntoJson("sound", ($this->getSound()), $apsObj);
        }
        if ($this->getContentAvailable() == 1) {
            $apsObj["content-available"] = 1;
        }
        $object[$this->APS] = $apsObj;
        if ($this->getParams() != null) {
            foreach ($this->getParams() as $key => $value) {
                $object[($key)] = ($value);
            }
        }
        return Tools::json_encode($object);
    }
}