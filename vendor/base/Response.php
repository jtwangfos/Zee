<?php

namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/9
 * Time: 下午4:53
 */
class Response {

    protected $web;
    protected $ifHttps;

    function __construct() {
        $this->web = $_SERVER['SERVER_NAME'];
        $this->ifHttps = isset($_SERVER['HTTPS']) ? true : false;
    }

    public function redirect($url, $statusCode = 301) {
        $url = ($this->ifHttps ? 'https://' : 'http://') . $this->web . $url;
        header("Location: $url", true, $statusCode);
        die;
    }
}