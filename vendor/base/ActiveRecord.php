<?php
namespace jt\base;
use jt\base\Model;
use jt\base\DbObject;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/2
 * Time: 下午5:09
 */
use jt\base\DbMapper;

class ActiveRecord extends Model {

    protected static $tableName;
    protected static $primaryKey = 'id';

    public function tableName() {}

    public static function find($id = null) {
        if ($id) {
            return self::findById($id);
        } else {
            return self::$db;
        }
    }

    // 通过主键获取记录
    public static function findById($id) {
        $sql = "SELECT * 
                FROM `" . static::$tableName .
                "` WHERE `" . static::$primaryKey ."` = :" . static::$primaryKey;
        try {
            $stmt = self::$db->prepare($sql);
            $stmt->execute([":" . static::$primaryKey => $id]);
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        return new DbObject($res);
    }

    // 保存
    public function save() {
        $db_mapper = new DbMapper($this);
        $post = $_POST;
        foreach ($post as $attr => $val) {
            $db_mapper->$attr = $val;
        }


    }
}