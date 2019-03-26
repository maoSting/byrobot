<?php

namespace BYRobot\tests;

use BYRobot\Core\Company;

class TestCompanyGetCompany extends BasicTest {


    public function testGetCompany(){
        $companyLib = new Company($this->_config);
        $data = $companyLib->getCompanys();
        $this->assertNotEmpty($data, '获取公司 失败');
    }

}