<?php

namespace jt\base;
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/5
 * Time: 上午11:45
 */
class Sql {
    /*
     * Sql类用于对sql语句的封装
     */

    protected $dbMapper;
    public $sql = [];

    const KEY_WORD_SELECT = 'SELECT';
    const KEY_WORD_WHERE = 'WHERE';
    const KEY_WORD_DELETE = 'DELETE';
    const KEY_WORD_FROM = 'FROM';
    const KEY_WORD_INSERT = 'INSERT INTO';

    public function __construct(DbMapper $dbMapper) {
        $this->dbMapper = $dbMapper;
    }

    public function insert(Array $post) {
        $sql = self::KEY_WORD_INSERT;
        $sql .= ' ' . $this->dbMapper->activeRecordObject->tableName() . ' ';
        $attributes = '(';
        $values = '(';
        foreach ($post as $attr => $val) {
            $attributes .= "`$attr`, ";
            $values .= "$val, ";
        }
        return $sql .= substr($attributes, 0, -2) . ') VALUES' . substr($values, 0, -2) . ')';
    }

    public function find(Array $select) {
        $this->sql['SELECT'] = self::KEY_WORD_SELECT;
        $this->sql['select'] = $select;
        return $this;
    }

    public function where(Array $where) {
        $this->sql['WHERE'] = self::KEY_WORD_WHERE;
        $this->sql['where'] = $where;
        if ($this->sql['DELETE'] === self::KEY_WORD_DELETE) {
            return $this->dbMapper->activeRecordObject->execDelete($this, $this->assign());
        }
        return $this->dbMapper->activeRecordObject;
    }

    public function delete() {
        $this->sql['DELETE'] = self::KEY_WORD_DELETE;
        return $this;
    }

    public function one() {
        return [
            'sql'    => $this->assign(),
            'action' => 'fetch',
        ];
    }

    public function all() {
        return [
            'sql'    => $this->assign(),
            'action' => 'fetchAll',
        ];
    }

    protected function assign() {
        $first_key_word = $this->sql['SELECT'] === self::KEY_WORD_SELECT ? self::KEY_WORD_SELECT : self::KEY_WORD_DELETE;
        $second_key_word = $this->sql['WHERE'] === self::KEY_WORD_WHERE ? self::KEY_WORD_WHERE : '';
        $sql = '';
        $sql .= $first_key_word === self::KEY_WORD_SELECT ? $this->process($this->sql['select'], $sql, $first_key_word) : self::KEY_WORD_DELETE;
        $table = $this->dbMapper->activeRecordObject->tableName();
        $sql .= ' ' . self::KEY_WORD_FROM . " `$table` ";
        $sql = isset($this->sql['where']) ? $this->process($this->sql['where'], $sql, $second_key_word) : '';
        return $sql;
    }

    protected function process($attributes, $sql, $key_word) {
        $length = count($attributes);
        $sql .= $key_word;
        if ($key_word === self::KEY_WORD_SELECT) {
            foreach ($attributes as $value) {
                $sql .= " `$value`, ";
            }
            return substr($sql, 0, -2);
        } elseif ($key_word === self::KEY_WORD_WHERE) {
            $times = 1;
            foreach ($attributes as $name => $value) {
                $sql .= " $name = :$name";
                if ($length > 1) {
                    if ($times < $length) {
                        $sql .= " AND";
                        $times++;
                    }
                }
            }
            return $sql;
        }
    }

}
