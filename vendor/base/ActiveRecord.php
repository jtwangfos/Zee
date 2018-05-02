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
class ActiveRecord extends Model {

    protected static $tableName;

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
        $sql = "SELECT * FROM `" . static::$tableName . "` WHERE `id` = :id";
        try {
            $stmt = self::$db->prepare($sql);
            $stmt->execute([":id" => $id]);
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        return new DbObject($res[0]);
    }

    // 增
    public function save() {
        var_dump($this->tableAttributes());
    }

    // 获取当前活动记录对应表的字段
    public function tableAttributes() {
        $get_table_attributes_sql = "SELECT * FROM `" . static::$tableName . "` LIMIT 1";
        $stmt = self::$db->query($get_table_attributes_sql);
        $stmt->execute();
        $table_attributes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $table_attributes;
    }
}