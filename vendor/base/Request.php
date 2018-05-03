<?php

namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/3
 * Time: 下午5:33
 */
class Request implements IRequest {

    public function isPost() {
        return ($_SERVER['REQUEST_METHOD'] == 'POST'
            && checkurlHash($GLOBALS['verify'])
            && (empty($_SERVER['HTTP_REFERER'])
                || preg_replace("~https?:\/\/([^\:\/]+).*~i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("~([^\:]+).*~", "\\1", $_SERVER['HTTP_HOST']))) ? true : false;
    }

    public function isGet() {
        return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
    }

    public function isAjax() {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {
            return true;
        } else {
            return false;
        }
    }
}