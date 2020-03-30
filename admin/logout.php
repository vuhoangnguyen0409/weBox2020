<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

session_start();
session_destroy();
header("location: login.php");

?>