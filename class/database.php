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
            mysql_close(self::$conn);
        }
    }
    
    public function connect() {
        if (!is_resource(self::$conn)) {
            global $hostname, $hostuser, $hostpass, $dbname;
            self::$conn = @mysql_connect($hostname, $hostuser, $hostpass) or die("Không thể kết nối database");
            mysql_select_db($dbname, self::$conn);
            mysql_set_charset('utf8', self::$conn);
        }
    }
    
    public function getConnect() {
        return self::$conn;
    }
    
    public function query($sql) {
        if (is_resource(self::$conn)) {
            $this->queryResult = mysql_query($sql, self::$conn);
        }
    }
    
    public function numrows() {
        if (!is_null($this->queryResult)) {
            return mysql_num_rows($this->queryResult);
        }
    }
    
    public function fetch() {
        if (!is_null($this->queryResult)) {
            return mysql_fetch_assoc($this->queryResult);
        }
    }
}

?>