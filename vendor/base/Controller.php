<?php

namespace jt\base;

use jt\base\Request;

Class Controller implements IRequest {

    protected $app;
    protected $request;

    public function __construct(Application $application) {
        $this->app = $application;
        $this->request = new Request;
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

}