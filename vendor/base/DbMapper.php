<?php

namespace Zee\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午8:45
 */
class DbMapper {

    /*
     * 数据映射类
     */

    public $activeRecordObject;

    public function __construct(ActiveRecord $activeRecord) {
        $this->activeRecordObject = $activeRecord;
    }

    // 自动生成set/get的方法处理成员变量
    public function __call($name, $arguments) {
        if (preg_match('/^(set|get)(\w+)/', strtolower($name), $match)
            && $attribute = $this->validateAttribute($match[2])
        ) {
            if ($match[1] == 'set') {
                $this->$attribute = $arguments[1];
            } elseif ($match[1] == 'get') {
                return $this->$attribute;
            }
        }
    }

    // 验证是否为类的成员变量
    protected function validateAttribute($attribute) {
//        try {
        if (!in_array($attribute, array_keys(get_class_vars(get_class($this->activeRecordObject))))) {
            throw new TopException("Undefined member variable '" . $attribute . "' in class $this->activeRecordObject");
        }
        return $attribute;
    }

    /*
        只能通过set方法操作成员变量
        以达到检查活动记录是否有该成员变量
    */
    public function __set($name, $value) {
        $set = 'set' . $name;
        $this->$set($name, $value);
    }

    /*
        只能通过get方法操作成员变量
        以达到检查活动记录是否有该成员变量
    */
    public function __get($name) {
        $get = 'get' . $name;
        $this->$get($name);
    }
}