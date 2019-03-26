<?php

namespace BYRobot\tests;

use BYRobot\Core\Task;

class TestTaskCreate extends BasicTest {

    /**
     * 创建任务接口
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testCreateTask(){
        $companyLib = new Task($this->_config);
        $data = [
            'companyId' => $this->_company_id,
            'taskName' => '测试任务.'.time(),
            'taskType' => 1,
            'startDate' => '2019-03-22',
            'workingStartTime' => '8:30',
            'workingEndTime' => '22:00',
            'userPhoneIds' => [
                40803,

            ],
            'sceneDefId' => 61414,
            'robotDefId' => 61402,
            'sceneRecordId' => 61410,
            'callType' => 1,
            'repeatCall' => true,
            'repeatCallRule' => [
                [
                    "phoneStatus" => 9,
                    "times" => 1,
                    "interval" => 5
                ],
                [
                    "phoneStatus" => 9,
                    "times" => 1,
                    "interval" => 5
                ]
            ]
        ];
        $return = $companyLib->createTask($data);
        var_dump($return);
        $this->assertNotEmpty($return, '创建任务接口 失败');
    }


}