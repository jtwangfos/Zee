<?php

namespace app\controllers;

/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午3:42
 */
use Zee\base\Controller;

class IndexController extends Controller {

    public function actionIndex() {
        $this->render('index', []);
    }
}