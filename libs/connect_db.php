<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

$conn = mysqli_connect($hostname, $hostuser, $hostpass);
$mysqli = new mysqli($hostname, $hostuser, $hostpass, $dbname);
// Chọn database để làm việc
//mysql_select_db($dbname, $conn);
// Đồng bộ bảng mã của trang với CSDL
$mysqli -> set_charset("utf8");


?>
