<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class ErrorHandler {
    static protected $errorMsg;
    static public function setError($errorMsg) {
        self::$errorMsg = strip_tags($errorMsg);
    }
    static public function getError() {
        return self::$errorMsg;
    }
    static public function hasError() {
        if (empty(self::$errorMsg)) {
            return false;
        } else {
            return true;
        }
    }
}

?>