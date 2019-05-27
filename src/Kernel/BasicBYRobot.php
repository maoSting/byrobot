<?php


namespace BYRobot\Kernel;

use BYRobot\Exceptions\InvalidArgumentException;
use BYRobot\Exceptions\InvalidResponseException;
use BYRobot\Tools\DataArray;
use BYRobot\Tools\DataTransform;
use BYRobot\Tools\RequestTool;

class BasicBYRobot {

    const VERSION = '1.0';

    public $config;

    // access token
    public $sign = '';

    // 当前请求方法
    private $_currentMethod = [];

    // 是否是重试
    private $_isTry = false;


    public function __construct(array $options) {
        date_default_timezone_set("GMT");
        if(empty($options['app_key'])){
            throw new InvalidArgumentException('miss config [app_id]');
        }
        if(empty($options['app_secret'])){
            throw new InvalidArgumentException('miss config [app_secret]');
        }

        $this->config = new DataArray($options);
    }

    /**
     * 获取灵声版本号
     * @return string
     * Author: DQ
     */
    public function getVersion(){
        return self::VERSION;
    }

    /**
     * 遇到错误是否再次尝试
     *
     * @param bool $bool
     *                  true 再次尝试
     *                  false 不会再次尝试
     * Author: DQ
     */
    public function tryAgain($bool = false){
        $this->_isTry = $bool == false;
    }


    /**
     *
     * @param string $date
     *                    GMT 时区格式时间
     *
     * @return string
     * Author: DQ
     */
    public function getSign($date = ''){
        $stringToSign = $this->config['app_key'] . "\n" . $date;
        if (function_exists('hash_hmac')) {
            return base64_encode(hash_hmac("sha1", $stringToSign, $this->config['app_secret'], true));
        }
        return '';
    }



    /**
     * 注册请求
     * @param       $method
     *                     方法
     * @param array $arguments
     *                        参数
     *
     * @throws \ErrorException
     * @throws \ListenRobot\Exceptions\InvalidResponseException
     * @throws \ListenRobot\Exceptions\LocalCacheException
     * Author: DQ
     */
    protected function registerApi($method, $arguments = []){
        $this->_currentMethod = ['method'=> $method, 'arguments'=> $arguments];
    }


    /**
     * http get 简单请求
     * @param $url
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function httpGetJson($url){
        try{
            $date = date("D, d M Y H:i:s e");
            $this->registerApi(__FUNCTION__, func_get_args());
            return DataTransform::json2arr(RequestTool::get(
                $url,
                [],
                [
                    'appkey'=> $this->config['app_key'],
                    'datetime'=> $date,
                    'sign'=> $this->getSign($date),
                ]
            ));
        }catch (InvalidResponseException $e){
            if (!$this->_isTry) {
                $this->_isTry = true;
                return call_user_func_array([$this, $this->_currentMethod['method']], $this->_currentMethod['arguments']);
            }
            throw new InvalidResponseException($e->getMessage(), $e->getCode());
        }
    }



    /**
     * post 请求返回json 数组
     * @param $url
     * @param $data
     *
     * @return mixed
     * @throws \BYRobot\Exceptions\InvalidResponseException
     * @throws \ErrorException
     * Author: DQ
     */
    public function httpPostJson($url, $data){
        try{
            $date = date("D, d M Y H:i:s e");
            $this->registerApi(__FUNCTION__, func_get_args());
            return DataTransform::json2arr(RequestTool::post(
                $url,
                $data,
                [
                    'appkey'=> $this->config['app_key'],
                    'datetime'=> $date,
                    'sign'=> $this->getSign($date),
                ]
            ));
        }catch (InvalidResponseException $e){
            if (!$this->_isTry) {
                $this->_isTry = true;
                return call_user_func_array([$this, $this->_currentMethod['method']], $this->_currentMethod['arguments']);
            }
            throw new InvalidResponseException($e->getMessage(), $e->getCode());
        }
    }


}