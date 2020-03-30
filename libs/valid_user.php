<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

function validUsername($username) {
    global $username_min_len, $exclude_username_chars;
    if (mb_strlen($username, "UTF-8") < $username_min_len) {
        return false;
    }
    foreach ($exclude_username_chars as $char) {
        if (mb_strpos($username, $char, 0, "UTF-8") !== false) {
            return false;
        };
    }
    return true;
}

?>