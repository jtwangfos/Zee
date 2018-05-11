<?php

namespace jt\base;

class Application {

    public $config;

    public $controller;
    public $action;

    public $controllerName;
    public $actionName;

    protected $defaultController = 'index';
    protected $defaultAction = 'index';

    public $request;
    public $response;
    public $params;

    const CONTROLLER_DIR = __DIR__ . '/../../app/controller/';
    const CONTROLLER_NAMESPACE = "app\\controller\\";

    public function __construct($config) {
        $this->request = new Request();
        $this->response = new Response();
        $this->config = $config;
        $this->route();
    }

    public function run() {
        return $this->getInstance();
    }

    // 处理路由
    private function route() {
        $uri = $this->parseUri();
        $controller = $this->parseRoute($uri['controller']);
        $action = $this->parseRoute($uri['action']);
        $params = $uri['params'];

        $this->controller = $controller ? $controller : $this->defaultController;
        $this->controllerName = $this->controller . "Controller";

        $this->action = $action ? $action : $this->defaultAction;
        $this->actionName = 'action' . $this->action;

        if ($this->request->isGet()) {
            $this->params = $params;
        }
    }

    // 处理uri
    protected function parseUri() {
        $uri_arr = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri_arr);
        $controller = array_shift($uri_arr);
        $action = array_shift($uri_arr);
        return [
            'controller' => $controller,
            'action' => $action,
            'params' => $uri_arr,
        ];
    }

    // 处理控制器和操作的名字
    protected function parseRoute($route) {
        $explode = explode('-', $route);
        foreach ($explode as $value) {
            $res[] = ucfirst($value);
        }
        $impode = implode('', $res);
        return $impode;
    }

    // 处理url中的参数
    protected function parseParams($params) {

    }

    // 实例化控制器
    private function getInstance() {
        $this->autoloadController();
        $class = self::CONTROLLER_NAMESPACE . $this->controllerName;
        $action = $this->action;
        $application = new $class($this);
        if (!empty($this->params)) {
            call_user_func_array([$application, $action], $this->params);
        } else {
            return $application->$action();
        }
    }

    // 控制器类的自动加载
    private function autoloadController() {
        $autoloadController = function ($controller) {
            $controllerMap = [
                'app\\controller' => self::CONTROLLER_DIR,
            ];
            $parts = explode("\\", $controller);
            $controllerName = array_pop($parts);
            $namespace = implode("\\", $parts);

            foreach ($controllerMap as $ns => $dir) {
                if ($namespace == $ns) {
                    $filename = $dir . $controllerName . ".php";
                    if (file_exists($filename)) {
                        require_once $filename;
                    }
                }
            }
        };
        spl_autoload_register($autoloadController);
    }

}