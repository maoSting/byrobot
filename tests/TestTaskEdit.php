<?php

namespace BYRobot\tests;

use BYRobot\Core\Task;

class TestTaskEdit extends BasicTest {

    /**
     * 编辑任务接口
     *
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function testEditTask(){
        $companyLib = new Task($this->_config);
        // 手动任务
        $data = [
            'companyId' => $this->_company_id,
            'taskName' => '测试任务.'.time(),
            'taskType' => 2,
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

        // 手动改为自动拨打
        $editData = [
            'companyId' => $data['companyId'],
            'taskName' => $data['taskName'].' 编辑',
            'taskType' => 1,
            // 注意这个数据类型
            'userPhoneIds' => $data['userPhoneIds'][0],
            // 注意这个新建不是必选
            'concurrencyQuota' => 1,
            'callType' => $data['callType'],
        ];
        $editReturn = $companyLib->editTask($return, $editData);
        var_dump($editReturn);
        $this->assertEmpty($editReturn, '编辑任务接口 失败');
    }


}