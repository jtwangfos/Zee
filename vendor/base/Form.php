<?php
namespace jt\base;

use jt\base\Field;

class Form {

    protected static $method = 'post';

    public static function begin($config = []) {
        if ($config['method'] == 'get') {
            static::$method = 'get';
        }
        echo "<form action='' method=" . static::$method .">";
        return new static();
    }

    public function field(ActiveRecord $activeRecord, $attributeName) {
        try {
            if (!$activeRecord) {
                throw new \Exception('Object of class ' . get_class($activeRecord) .' no found!');
            }
        }
        catch (\Exception $e) {
            echo $e->getMessage() . ' in file: ' . $e->getFile() . ' at line: ' . $e->getLine();
        }
        return new Field($activeRecord, $attributeName);
    }

    public static function end() {
        echo "</form>";
    }

}