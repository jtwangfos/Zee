<?php
namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午8:45
 */
class DbMapper {

    public $dbAttributes;

    public function __construct() {

    }

    protected function __set($name, $value) {
        $this->$$name = $value;
    }
}