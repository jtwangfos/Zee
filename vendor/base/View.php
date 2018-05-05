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
        $tpl = $this->getViewPath($template);
        $this->display($tpl, $params);
    }

    // 向视图类中注入控制器传向视图的变量
    protected function assign($params) {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $this->variable[$k] = $v;
            }
        }
    }

    // 包含模板
    protected function display($template, $params) {
        $this->assign($params);
        extract($this->variable);
        include $template;
    }

    // 获取action对应的页面
    protected function getViewPath($template) {
        return self::VIEW_DIR . $this->app->controller . '/' . $template . '.php';
    }
}