# byai robot PHP Composer 扩展包

https://www.byai.com/


## Introduction
百应™智能联络中心
百应AI，智能客户联络中心/AICC，AI（支持打断、自主话术配置、自动转接人工）

文档地址
https://api.byrobot.cn/doc/v2/


## Requirement
1. PHP >= 7.0
2. **[Composer](https://getcomposer.org/)**
3. php-curl-class/php-curl-class



## Usage

#### 注意
**请使用try catch，错误都是抛出异常。**

#### 公司信息接口

```php
<?php

use BYRobot\Core\Company;

$config = [
    'app_key'=> 'xxxxxxx',
    'app_secret' => 'xxxxxxxxxxxxxxxxxxxxx',
];

$companyLib = new Company($config);

// 获取公司列表
$companyLib->getCompanys();

// 获取公司的主叫电话列表接口
$companyLib->getPhones('公司ID');

// 获取公司的机器人话术列表接口
$companyLib->getRobots('公司ID', '0：所有话术，1：已上线话术，默认0');
```




#### 任务操作

```php
<?php

use BYRobot\Core\Task;

$config = [
    'app_key'=> 'xxxxxxx',
    'app_secret' => 'xxxxxxxxxxxxxxxxxxxxx',
];


$taskLib = new Task($config);

// 创建任务
$taskData = []; // 详见文档
$taskLib->createTask($taskData);


// 设置任务开始
$taskLib->start('任务ID');

// 暂停任务接口
$taskLib->pause('任务ID');

// 删除任务
$taskLib->delete('任务ID');


// 向任务中导入客户接口
$phones = [
    [
        'name'=> 'DQ',
        'phone'=> 'xxxxxxx',    
    ],
    [
        'name'=> 'DQ1',
        'phone'=> 'xxxxxxxxxxx',    
    ],
];
$taskLib->importTaskCustomer('任务ID', '公司ID', $phones);

```




#### 任务信息查询接口

```php
<?php

use BYRobot\Core\Query;

$config = [
    'app_key'=> 'xxxxxxx',
    'app_secret' => 'xxxxxxxxxxxxxxxxxxxxx',
];

$taskLib = new Query($config);

// 获取任务详情接口
$taskLib->getTaskDetail('公司ID', '任务ID');
```

## TODO
a lot

## License

MIT