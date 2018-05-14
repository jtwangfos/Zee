<?php
namespace app\controller;

/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/9
 * Time: 下午5:56
 */
use Zee\base\Controller;

class TestRouteController extends Controller {

    public function actionTestRoute() {
        echo 'it works!';
    }

    public function actionTestParams($a, $b) {
        var_dump($_GET);
    }
}