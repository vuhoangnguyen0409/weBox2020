<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class Database {
    static protected $conn;
    protected $queryResult;

    public function __construct() {
        $this->connect();
    }

    public function __destruct() {
        if (is_resource(self::$conn)) {
            mysqli_close(self::$conn);
        }
    }

    public function connect() {
        if (!is_resource(self::$conn)) {
            global $hostname, $hostuser, $hostpass, $dbname;
            self::$conn = mysqli_connect($hostname, $hostuser, $hostpass, $dbname) or die("Không thể kết nối database");
            //$sql_add = 'insert into user(username, password, level) values("hahaha", "qwer1234", 1)';
            //self::$conn->query($sql_add);
            //die();
            self::$conn->set_charset("utf8");
        }
    }

    public function getConnect() {
        return self::$conn;
    }

    public function query($sql) {
        if (self::$conn) {
            $this->queryResult = mysqli_query(self::$conn,$sql);
        }
    }

    public function numrows() {
        if (!is_null($this->queryResult)) {
            return mysqli_num_rows($this->queryResult);
        }
    }

    public function fetch() {
        if (!is_null($this->queryResult)) {
            return mysqli_fetch_assoc($this->queryResult);
        }
    }
}

?>
