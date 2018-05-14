<?php

namespace Zee\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/3
 * Time: 下午5:33
 */
class Request implements IRequest {

    public function isPost() {
        return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
    }

    public function isGet() {
        return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'GET';
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST';
    }
}