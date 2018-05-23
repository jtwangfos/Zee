<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/17
 * Time: 上午11:57
 */

namespace app\controllers;

use Zee\base\Controller;

class BackendController extends Controller{

    public $layout = 'backend.php';

    public function actionIndex() {
        return $this->render('index');
    }
    public function actionLogin() {
        return $this->render('login');
    }
}