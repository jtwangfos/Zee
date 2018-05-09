<?php

namespace app\controller;

use jt\base\Controller;
use app\model\Test;

/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/4/25
 * Time: 下午10:51
 */
class TestController extends Controller {

    public function actionHello() {
//        $res = Test::delete()->where(['id' => 1]);
//        $res = Test::find(['a', 'b', 'id'])->where(['d' => 4, 'e' => 5])->one();
        $model = new Test();
        if ($this->isPost()) {
            var_dump($_POST);
            $this->redirect('/test-route/test-route');
        }
        return $this->render('hello', [
//            'res' => $res,
            'model' => $model,
        ]);
    }
}