<?php

namespace BYRobot\Core;

use BYRobot\Exceptions\InvalidArgumentException;
use BYRobot\Kernel\BasicBYRobot;

class Company extends BasicBYRobot {

    /**
     * 获取公司列表
     * @return mixed
     * @throws \ErrorException
     * Author: DQ
     */
    public function getCompanys(){
        $url = 'http://api.byrobot.cn/openapi/v1/company/getCompanys';
        return $this->httpGetJson($url);
    }

    /**
     * 获取公司的主叫电话列表接口
     * @param int $companyId
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function getPhones($companyId = 0){
        $url = sprintf('http://api.byrobot.cn/openapi/v1/company/getPhones?%s', 'companyId='.$companyId);
        return $this->httpGetJson($url);
    }



    /**
     * 获取公司的机器人话术列表接口
     * @param int $companyId
     *                      公司ID
     * @param int $robotStatus
     *
     * @return mixed
     * @throws \ErrorException
     * Author: DQ
     */
    public function getRobots($companyId = 0, $robotStatus = 0){
        if(!in_array($robotStatus, [0, 1])){
            throw new InvalidArgumentException('话术参数错误');
        }
        $url = sprintf('http://api.byrobot.cn/openapi/v1/company/getRobots?%s&%s', 'companyId='.$companyId,'robotStatus='.$robotStatus);
        return $this->httpGetJson($url);
    }



}