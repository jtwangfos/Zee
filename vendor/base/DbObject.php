<?php
namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午8:29
 */
class DbObject {

    public $attributes;

    public function __construct($attributes) {
        $this->setAttributes($attributes);
    }

    protected function setAttributes($attributes) {
        foreach ($attributes as $k => $v) {
            $this->attributes[$k] = $v;
        }
    }

    public function __get($name) {
        return $this->attributes[$name];
    }
}