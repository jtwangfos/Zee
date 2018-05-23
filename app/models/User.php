<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/23
 * Time: 下午8:04
 */

namespace app\models;


use Zee\base\ActiveRecord;

class User extends ActiveRecord {

    public $username;
    public $password;

    public function rules() {
        return [
            ['username', 'string'],
            ['password', 'string'],
        ];
    }

    public function register() {
        
    }

    public function login() {

    }

    protected function generatePassword($original_password) {
        $salt = $this->generateSalt($original_password);
        return substr(md5($original_password.$salt), 0, 32);
    }

    protected function generateSalt($original_password) {
        $password_lenth = strlen($original_password);
        $salt_lenth = $password_lenth % 2;
        $salt = md5(substr($original_password, 0 , $salt_lenth));
        return $salt;
    }
}