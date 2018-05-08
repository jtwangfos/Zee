<?php
namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/8
 * Time: 下午2:51
 */
class Field {

    protected $attributeName;
    protected $input;
    protected $label;

    public function  __construct(ActiveRecord $activeRecord, $attributeName) {
        if ($this->ifAttributesExists($activeRecord, $attributeName)) {
            $this->attributeName = $attributeName;
        }
    }

    public function input($config = []) {
        $this->input = "<p><label>" . $this->attributeName . "</label>" . $this->label . "<input type='text' name=\"" . $this->attributeName . "\"/></p>";
        echo $this->input;
        return $this;
    }

    public function label($label) {
        $this->label = $label ? $label : '';
    }

    protected function ifAttributesExists(ActiveRecord $activeRecord, $attributeName) {
        try {
            if (!in_array($attributeName, array_keys(get_class_vars($className = get_class($activeRecord))))) {
                throw new \Exception("\"$attributeName\" is not a member variable of class \"$className\"");
            }
        }
        catch (\Exception $e) {
            echo $e->getMessage() . ' in file: ' . $e->getFile() . " at line: " . $e->getLine();
            die;
        }
        return true;
    }

}