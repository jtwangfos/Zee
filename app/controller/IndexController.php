<?php
namespace app\controller;
use jt\base\Controller;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午3:42
 */
class IndexController extends Controller {

    public function actionIndex() {
        $this->render('index', [
            'test' => '6666',
        ]);
    }
}