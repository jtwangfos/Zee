<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/11
 * Time: 上午10:06
 */

namespace jt\base;


class Validator {

    protected $dbMapper;

    public function __construct(DbMapper $dbMapper) {
        $this->dbMapper = $dbMapper;
    }

    public function processRules($rules) {
        if (empty($rules)) {
            return true;
        }
        foreach ($rules as $k => $rule) {
            $validateFunc = $rule[1]; // 检验参数的方法名
            // 所需检验的参数名
            if (is_array($rule[0])) {
                foreach ($rule[0] as $v) {
                    if (!Rules::$validateFunc($v, $_POST[$v])) {
                        return false;
                    }
                }
            } else {
                $attributeName = $rule[0];
                if (!Rules::$validateFunc($attributeName, $_POST[$attributeName])) {
                    return false;
                }
            }
        }
        return true;
    }
}