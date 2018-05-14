<?php

namespace Zee\base;

/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午5:09
 */

class ActiveRecord extends Model {

    protected static $Sql;
    protected $className;

    const DEFAULT_PRIMARY_KEY = 'id';

    public function __construct() {
        parent::__construct();
        $this->className = get_class($this);
    }

    public function tableName() {
    }

    public function primaryKey() {
        return self::DEFAULT_PRIMARY_KEY;
    }

    public function rules() {
    }

    public static function find(Array $select) {
        $dbMapper = new DbMapper(new static());
        self::$Sql = new Sql($dbMapper);
        self::$Sql->find($select);
        return self::$Sql;
    }

    public function where(Array $where) {
        self::$Sql->where($where);
        return self::$Sql;
    }

    public function one() {
        return $this->execSelect(self::$Sql, $action = 'one');
    }

    public function all() {
        return $this->execSelect(self::$Sql, $action = 'all');
    }

    // 保存
    public function save() {
        $dbMapper = new DbMapper($this);
        $validator = new Validator($dbMapper);
        if ($validator->processRules($this->rules())) {
            if ($this->insert($dbMapper)) {
                return true;
            }
        }
        return false;
    }

    // 具体执行SQL SELECT 的方法
    protected function execSelect(Sql $sql, $action) {
        $prepare = $action == 'one' ? $sql->one()['sql'] : $sql->one()['sql'];
        $action = $action == 'all' ? $sql->all()['action'] : $sql->all()['action'];
        $stmt = self::$db->prepare($prepare);
        $where = $this->getWhereArr($sql->sql['where']);
        $stmt->execute($where);
        $res = $stmt->$action(\PDO::FETCH_ASSOC);
        return new DbObject(get_class($this), $res);
    }

    // 具体执行SQL DELETE 的方法
    public function execDelete(Sql $sql, $_sql) {
        $stmt = self::$db->prepare($_sql);
        $where = $this->getWhereArr($sql->sql['where']);
        $res = $stmt->execute($where);
        return $res ? true : false;
    }

    // 执行SQL INSERT 的方法
    protected function insert(DbMapper $dbMapper) {
        $Sql = new Sql($dbMapper);
        if ($this->query($Sql->insert($_POST))) {
            return true;
        }
        return false;
    }

    // 执行SQL UPDATE 的方法
    protected function update() {

    }

    // 执行SQL语句的方法
    public function query($sql) {
        return self::$db->query($sql);
    }

    // 执行SQL DELETE 的方法
    public static function delete() {
        $dbMapper = new DbMapper(new static());
        self::$Sql = new Sql($dbMapper);
        self::$Sql->delete();
        return self::$Sql;
    }

    // 获取带占位符的where数组
    protected function getWhereArr($whereArr) {
        $arr = [];
        foreach ($whereArr as $name => $value) {
            $arr[":$name"] = $value;
        }
        return $arr;
    }

    // setter
    public function __set($name, $value) {

    }

    // getter
    public function __get($name) {
    }

    public function __toString() {
        return json_encode([
            'parentClass' => __CLASS__,
            'className'   => $this->className,
        ]);
    }

}