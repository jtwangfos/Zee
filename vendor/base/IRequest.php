<?php

namespace Zee\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/3
 * Time: 下午5:38
 */

interface IRequest {
    public function isPost();

    public function isGet();

    public function isAjax();
}