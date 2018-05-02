<?php

namespace jt\base;

class Application {

    public $config;

    public $controller;
    public $action;
    public $params;

    protected $controllerName;
    protected $actionName;

    protected $defaultController = 'index';
    protected $defaultAction = 'index';

    const CONTROLLER_DIR = __DIR__ . '/../../app/controller/';
    const CONTROLLER_NAMESPACE = "app\\controller\\";

    public function __construct($config) {
        $this->config = $config;
        $this->route();
    }

    public function run() {
        return $this->getInstance();
    }

    // 处理路由
    private function route() {
        $req = $_REQUEST;
        $this->controller = $req['controller'] ? $req['controller'] : $this->defaultController;
        $this->controllerName = ucfirst($this->controller) . "Controller";
        unset($req['controller']);

        $this->action = $req['action'] ? $req['action'] : $this->defaultAction;
        $this->actionName = $this->action . "Action";
        unset($req['action']);

        $this->params = $req;
    }

    // 实例化控制器
    private function getInstance() {
        $this->autoloadController();
        $class = self::CONTROLLER_NAMESPACE . $this->controllerName;
        $action = $this->actionName;

        return (new $class($this))->$action();
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