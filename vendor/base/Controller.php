<?php

namespace jt\base;

use jt\base\Request;

Class Controller implements IRequest {

    protected $app;
    public $request;
    public $response;

    public function __construct(Application $application) {
        $this->app = $application;
        $this->request = $application->request;
        $this->response = $application->response;
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

}