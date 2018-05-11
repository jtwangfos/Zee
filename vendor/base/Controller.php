<?php

namespace jt\base;

use jt\base\Request;

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

    public function redirect($url) {
        $this->response->redirect($url);
    }

    public function __call($method, $args) {
        if (!method_exists($this, $method)) {
            if ($this->beforeAction()) {
                $before_some_action = 'before' . ucfirst($method);
                $action = $this->actionName;
                if (method_exists($this, $before_some_action)) {
                    if ($this->$before_some_action()) {
                        $this->$action();
                    }
                } else {
                    $this->$action();
                }
            }
        }
    }

}