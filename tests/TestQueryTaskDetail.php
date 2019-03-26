<?php

namespace BYRobot\tests;

use BYRobot\Core\Query;

class TestQueryTaskDetail extends BasicTest {

    /**
     * 获取任务详情接口
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testTaskDetailQuery(){
        $companyLib = new Query($this->_config);
        $return = $companyLib->getTaskDetail($this->_company_id, $this->_task_id);
        var_dump($return);
        $this->assertNotEmpty($return, '获取任务详情接口 失败');
    }


}