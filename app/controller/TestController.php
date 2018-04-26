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
        $model = new Test;
        $oh = 'OH';
        $word = 'Yeah!';
        return $this->render('hello', [
            'oh' => $oh,
            'word' => $word,
            'test' => $model,
        ]);
    }
}