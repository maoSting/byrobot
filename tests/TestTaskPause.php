<?php

namespace BYRobot\tests;

use BYRobot\Core\Task;

class TestTaskPause extends BasicTest {

    /**
     * 暂停任务接口
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testPauseTask(){
        $companyLib = new Task($this->_config);
        $return = $companyLib->pause($this->_task_id);
        var_dump($return);
        $this->assertNotEmpty($return, '暂停任务接口 失败');
    }


}