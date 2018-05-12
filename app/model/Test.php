<?php

namespace app\model;

use jt\base\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/4/26
 * Time: 下午10:51
 */
class Test extends ActiveRecord {

//    protected static $tableName = 'c';

    public $a;

    public $b;

    public $d;

    public $e;

    public function tableName() {
        return 'c';
    }

    public function rules() {
        return [
            ['a', 'int'],
            ['b', 'decimal'],
        ];
    }


}