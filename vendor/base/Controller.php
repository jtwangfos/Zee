<?php

namespace Zee\base;

Class Controller implements IRequest {

    protected $app;
    public $request;
    public $response;
    public $actionName;

    public function __construct(Application $application) {
        $this->app = $application;
        $this->request = $application->request;
        $this->response = $application->response;
        $this->actionName = $application->actionName;
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => '',
            ],
        ];
    }

    public function beforeAction() {
        return true;
    }

    public function afterAction() {
    }

    // 渲染页面
    protected function render($template, $params = []) {
        return (new View($this->app))->render($template, $params);
    }

    public function isPost() {
        return $this->request->isPost();
    }

    public function isGet() {
        return $this->request->isGet();
    }

    public function isAjax() {
        return $this->request->isAjax();
    }

    public function redirect($url, $statusCode = 301) {
        $this->response->redirect($url, $statusCode);
    }

    // 从Application拦截要执行的action，从而执行beforeAction等一些操作
    public function __call($method, $args) {
        if (!method_exists($this, $method)) {
            if ($this->beforeAction()) {
                $before_some_action = 'before' . $method;
                $after_some_action = 'after' . $method;
                $action = $this->actionName;
                if (method_exists($this, $before_some_action)) {
                    if ($this->$before_some_action()) {
                        $this->executeAction($action, $args);
                        if (method_exists($this, $after_some_action)) {
                            if ($this->$after_some_action()) {
                                $this->afterAction();
                                return;
                            }
                        }
                        $this->afterAction();
                    }
                } else {
                    $this->executeAction($action, $args);
                    if (method_exists($this, $after_some_action)) {
                        if ($this->$after_some_action()) {
                            $this->afterAction();
                            return;
                        }
                    }
                    $this->afterAction();
                }
            }
        } else {
            throw new TopException('Not found 404!');
        }
    }

    // 将要执行action的相同操作提出来以复用
    protected function executeAction($action, $params) {
        if (!method_exists($this, $action)) {
            throw new TopException($action . ' requested does not exists!');
        }
        if (empty($params)) {
            $this->$action();
        } else {
            foreach ($params as $v) {
                $_GET[] = $v;
            }
            call_user_func_array([$this, $action], $params);
        }
    }

}