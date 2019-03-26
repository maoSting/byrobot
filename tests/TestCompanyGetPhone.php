<?php

namespace BYRobot\tests;

use BYRobot\Core\Company;

class TestCompanyGetPhone extends BasicTest {


    public function testGetPhone(){
        $companyLib = new Company($this->_config);
        $data = $companyLib->getPhones(14097);
        $this->assertNotEmpty($data, '获取公司的主叫电话列表接口 失败');
    }

}