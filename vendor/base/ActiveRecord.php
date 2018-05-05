<?php
namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午5:09
 */
use jt\base\Model;
use jt\base\DbObject;
use jt\base\DbMapper;

class ActiveRecord extends Model {

    protected static $tableName;
    protected static $primaryKey = 'id';
    protected static $Sql;

    public function tableName() {
        return static::$tableName;
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
        return $this->selete(self::$Sql, $action = 'one');
    }

    public function all() {
        return $this->selete(self::$Sql, $action = 'all');
    }

    // 保存
    public function save() {
        $db_mapper = new DbMapper($this);
        $post = $_POST;
//        if ($db_mapper->insert($post)) {
//            return true;
//        }
//        return false;
    }

    // 执行SQL SELECT / DELETE操作
    protected function selete(Sql $sql, $action) {
        $prepare = $action == 'one' ? $sql->one()['sql'] : $sql->one()['sql'];
        $action = $action == 'all' ? $sql->all()['action'] : $sql->all()['action'];
        $stmt = self::$db->prepare($prepare);
        $where = $this->getWhereArr($sql->sql['where']);
        $stmt->execute($where);
        $res = $stmt->$action(\PDO::FETCH_ASSOC);
        return new DbObject(get_class($this), $res);
    }

    // 执行SQL INSERT 操作
    protected function insert() {

    }

    // 执行SQL UPDATE 操作
    protected function update () {

    }

    // 获取带占位符的where数组
    protected function getWhereArr($whereArr) {
        $arr = [];
        foreach ($whereArr as $name => $value) {
            $arr[":$name"] = $value;
        }
        return $arr;
    }

}