<?php
namespace jt\base;

class Model {

    protected static $db;

	public function __construct() {
	    $config = require(__DIR__ . '/../../config/config.php');
	    $dbConfig = $config['db'];
	    $dsn = "mysql:host=" . $dbConfig['host'] . ":" . $dbConfig['port'] . ";" . "dbname=" . $dbConfig['dbname'];
	    $username = $dbConfig['username'];
	    $password = $dbConfig['password'];
	    $options['charset'] = $dbConfig['charset'];
	    try {
	        self::$db = new \PDO($dsn, $username, $password, $options);
	    } catch (\PDOException $e) {
	        echo $e->getMessage();
	    }
    }


}