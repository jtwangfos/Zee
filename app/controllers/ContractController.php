<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/15
 * Time: 上午10:10
 */

namespace app\controllers;

use Zee\base\Controller;


class ContractController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }
}