<?php

namespace BYRobot\tests;

use BYRobot\Core\Company;

class TestCompanyGetRobot extends BasicTest {


    public function testGetRobots(){
        $companyLib = new Company($this->_config);
        $data = $companyLib->getRobots(14097, 0);
        var_dump($data);
        $this->assertNotEmpty($data, '获取公司的机器人话术列表接口 失败');
    }

}