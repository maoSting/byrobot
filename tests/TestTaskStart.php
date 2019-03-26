<?php

namespace BYRobot\tests;

use BYRobot\Core\Task;

class TestTaskStart extends BasicTest {

    /**
     * 创建任务接口
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testStartTask(){
        $companyLib = new Task($this->_config);
        $return = $companyLib->start($this->_task_id);
        var_dump($return);
        $this->assertNotEmpty($return, '启动任务接口 失败');
    }


}