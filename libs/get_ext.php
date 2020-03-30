<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

function getExt($name) {
    $nameSet = explode(".", $name);
    $ext = end($nameSet);
    return strtolower($ext);
}

?>