<?php

namespace Zee\base;


class Form {

    protected static $method = 'post';

    public static function begin($config = []) {
        if ($config['method'] == 'get') {
            static::$method = 'get';
        }
        echo "<form action='' method=" . static::$method . ">";
        return new static();
    }

    public function field(ActiveRecord $activeRecord, $attributeName) {
        return new Field($activeRecord, $attributeName);
    }

    public static function end() {
        echo "</form>";
    }

}