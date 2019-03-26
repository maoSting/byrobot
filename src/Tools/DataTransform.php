<?php

namespace BYRobot\Tools;

use BYRobot\Exceptions\InvalidResponseException;

class DataTransform {

    public static function json2arr($json){
        $rs = json_decode($json, true);
        if(empty($rs)){
            throw new InvalidResponseException('invalid response.', 0);
        }
        if(isset($rs['code']) && $rs['code'] != 200){
            throw new InvalidResponseException($rs['resultMsg'], $rs['code']);
        }
        return $rs['data'];
    }
}