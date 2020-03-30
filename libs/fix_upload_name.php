<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

function fixUploadname ($name) {
    $name = str_replace(" ", "_", $name);
    $name = mb_strtolower($name, "UTF-8");
    $name = time().'_'.$name;
    return $name;
}

?>