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

    public function helloAction() {
        $res = Test::find(['id', 'a'])->where(['a' => 2, 'e' => 5])->all();
        return $this->render('hello', [
            'res' => $res,
        ]);
    }
}