<?php

namespace BYRobot\Core;

use BYRobot\Kernel\BasicBYRobot;

class Query extends BasicBYRobot {


    /**
     *
     * 获取任务详情接口
     *
     * @param array $data
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function getTaskDetail($companyId = 0, $taskId = 0){
        $url = sprintf(
            'http://api.byrobot.cn/openapi/v1/task/getTaskDetail?%s&%s',
            'companyId='.$companyId,
            'taskId='.$taskId
        );
        return $this->httpGetJson($url);
    }




}