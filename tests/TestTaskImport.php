<?php

namespace BYRobot\tests;

use BYRobot\Core\Task;

class TestTaskImport extends BasicTest {

    /**
     * 向任务中导入客户接口
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testImportTask(){
        $companyLib = new Task($this->_config);
        $return = $companyLib->importTaskCustomer(
            $this->_task_id,
            $this->_company_id,
            $this->_phones
        );
        var_dump($return);
        $this->assertNotEmpty($return, '向任务中导入客户接口 失败');
    }


}