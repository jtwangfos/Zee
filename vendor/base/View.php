<?php

namespace jt\base;

Class View {

    protected $app;
    protected $variable;

    const VIEW_DIR = __DIR__ . "/../../app/view/";

    public function __construct(Application $application) {
        $this->app = $application;
    }

    // 渲染页面
    public function render($template, $params =[]) {
        $html = $this->getViewPath($template);
        $this->assign($params);
        include $html;
    }

    // 为传入页面的变量赋值
    protected function assign($params) {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $this->variable[$k] = $v;
            }
        }
    }

    // 获取action对应的页面
    protected function getViewPath($template) {
        return self::VIEW_DIR . $this->app->controller . '/' . $template . '.php';
    }
}