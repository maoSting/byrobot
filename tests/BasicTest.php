<?php

namespace BYRobot\tests;

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase  {

    // 配置
    protected $_config = null;

    protected $_company_id = null;


    // 被呼叫号码列表
    protected $_phones = [];

    // 话术模版
    protected $_template = '';

    // 任务ID
    protected $_task_id = '';


    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->_config = include 'tests/config.php';
        $data = include 'tests/config_data.php';
        $this->_company_id = $data['company_id'];
        $this->_task_id = $data['task_id'];
        $this->_phones = $data['phones'];


//        $this->_phones = include 'tests/phones.php';
//        $this->_template = include 'tests/template.php';
//        $this->_task_id = include 'tests/task_id.php';

    }


    public function testConfig(){
        $this->assertNotEmpty($this->_config, '配置文件无法读取');
    }


    public function testCompany(){
        $this->assertNotEmpty($this->_company_id, '配置文件 公司ID 无法读取');
    }

//
//
//    public function testTemplate(){
//        $this->assertNotEmpty($this->_template, '话术模版为空');
//    }



}