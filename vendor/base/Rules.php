<?php

namespace Zee\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/11
 * Time: 下午3:12
 */

class Rules {

    protected function __construct() {
    }

    public static function int($name, $num) {
        if (preg_match('/^\s*[+-]?\d+\s*$/', $num)) {
            return true;
        } else {
            echo "$name should be int type!<br />";
            die;
        }
    }

    public static function decimal($name, $num) {
        if (preg_match('/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/', $num)) {
            return true;
        } else {
            echo "$name should be decimal type!<br />";
            die;
        }
    }

    public static function numeric($name, $num) {
        if (preg_match('/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/', $num)) {
            return true;
        } elseif (preg_match('/^\s*[+-]?\d+\s*$/', $num)) {
            return true;
        } else {
            echo "$name should be numeric type!<br />";
            die;
        }
    }

    public static function string($name, $str) {
        if (is_string($str)) {
            return true;
        } else {
            echo "$name should be string type!";
            die;
        }
    }

    public static function required($name, $value) {
        if (empty($value)) {
            echo "$name is required!";
            die;
        }
        return true;
    }

}