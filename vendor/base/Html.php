<?php
namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/8
 * Time: 下午11:02
 */
class Html {

    public static function submitButton($name) {
        echo "<input type='submit' value=$name>";
    }
}