<?php

namespace Zee\base;

Class View {

    protected $app;
    protected $variable;
    protected $defalutLayout = 'layout.php';

    const VIEW_DIR = __DIR__ . '/../../app/views/';

    public function __construct(Application $application) {
        $this->app = $application;
    }

    // 渲染页面
    public function render($template, $params = []) {
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
        if (isset($this->variable)) {
            extract($this->variable);
        }
        $content = $template;
        $layout = self::VIEW_DIR . $this->defalutLayout;
        include $layout;
    }

    // 获取action对应的页面
    protected function getViewPath($template) {
        return self::VIEW_DIR . $this->app->controller . '/' . $template . '.php';
    }

    // layout头部
    protected function head() {

    }
}