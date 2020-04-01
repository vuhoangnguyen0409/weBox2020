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
            //self::$conn = @mysqli_connect($hostname, $hostuser, $hostpass, $dbname) or die("Không thể kết nối database");
            //mysqli_select_db($dbname, );
            //mysqli_set_charset(self::$conn, 'utf8');
            //* new sqli
            $conn = new mysqli($hostname, $hostuser, $hostpass, $dbname);
            $sql_add = 'insert into user(username, password, level) values("haha", "qwer1234", 1)';
            $conn->query($sql_add);
            die();
        }
    }

    public function getConnect() {
        return self::$conn;
    }

    public function query($sql) {
        if (is_resource(self::$conn)) {
            $this->queryResult = mysqli_query($sql);
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
