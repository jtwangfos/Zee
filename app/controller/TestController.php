<?php

namespace app\controllers;

/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/4/25
 * Time: 下午10:51
 */
use Zee\base\Controller;
use app\model\Test;

class TestController extends Controller {

    public function actionHello() {
//        $res = Test::delete()->where(['id' => 1]);
//        $res = Test::find(['a', 'b', 'id'])->where(['d' => 4, 'e' => 5])->one();
        $model = new Test();
        if ($this->isPost()) {
            if ($model->save()) {
                echo 'insert success!';
                $this->redirect('/');
            } else {
                echo 'insert fail!';
            }
        }
        return $this->render('hello', [
//            'res' => $res,
            'model' => $model,
        ]);
    }

//    public function beforeHello() {
//
//    }

    public function beforeHello() {
        echo 'before';
        return true;
    }

    public function afterHello() {
        echo 'after';
        return true;
    }

    public function beforeAction() {
        echo 'beforeAction';
        return true;
    }

    public function afterAction() {
        echo 'afterAction';
    }
}