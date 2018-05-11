<?php
use jt\base\Application; //框架核心
error_reporting(E_ALL & ~E_NOTICE);

// 类的自动加载
require_once '../vendor/autoload.php';

// 配置文件
$config = array_merge(require_once '../config/config.php');

//实例化web应用
(new Application($config))->run();