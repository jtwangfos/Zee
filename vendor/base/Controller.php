<?php

namespace jt\base;

Class Controller {

    protected $app;

    public function __construct(Application $application) {
        $this->app = $application;
    }

    // 渲染页面
    protected function render($template, $params = []) {
        return (new View($this->app))->render($template, $params);
    }


}