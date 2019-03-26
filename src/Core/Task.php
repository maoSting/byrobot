<?php

namespace BYRobot\Core;

use BYRobot\Kernel\BasicBYRobot;

class Task extends BasicBYRobot {

    /**
     * 创建任务
     *
     * @param array $data
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function createTask($data = []){
        $url = 'http://api.byrobot.cn/openapi/v1/task/createTask';
        return $this->httpPostJson($url, $data);
    }

    /**
     *
     * 启动任务接口
     *
     * @param int $taskId
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function start($taskId = 0){
        $url = 'http://api.byrobot.cn/openapi/v1/task/start';
        return $this->httpPostJson($url, [ 'taskId' => $taskId ]);
    }

    /**
     * 暂停任务接口
     * @param int $taskId
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function pause($taskId = 0){
        $url = 'http://api.byrobot.cn/openapi/v1/task/pause';
        return $this->httpPostJson($url, [ 'taskId' => $taskId ]);
    }

    /**
     * 删除任务
     * @param int $taskId
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function delete($taskId = 0){
        $url = 'http://api.byrobot.cn/openapi/v1/task/delete';
        return $this->httpPostJson($url, [ 'taskId' => $taskId ]);
    }



    /**
     *
     * 向任务中导入客户接口
     *
     * @param int   $taskId
     * @param int   $companyId
     * @param array $customerInfo
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function importTaskCustomer($taskId = 0, $companyId = 0, $customerInfo = []){
        $url = 'http://api.byrobot.cn/openapi/v1/task/importTaskCustomer';
        return $this->httpPostJson($url, [
            'taskId' => $taskId,
            'companyId' => $companyId,
            'customerInfoList' => $customerInfo,
        ]);
    }






}