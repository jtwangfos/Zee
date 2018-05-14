<?php

namespace app\models;

/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/4/26
 * Time: 下午10:51
 */
use Zee\base\ActiveRecord;

class Test extends ActiveRecord {

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