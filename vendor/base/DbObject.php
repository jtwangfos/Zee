<?php

namespace Zee\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午8:29
 */

class DbObject {
    /*
     * 该类用于将数据库查询的结果封装成对象
     */
    public $className;
    public $attributes;

    public function __construct($className, $attributes) {
        $this->className = $className;
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