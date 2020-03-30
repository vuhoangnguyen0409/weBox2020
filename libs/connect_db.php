<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

$conn = mysql_connect($hostname, $hostuser, $hostpass);
// Chọn database để làm việc
mysql_select_db($dbname, $conn);
// Đồng bộ bảng mã của trang với CSDL
mysql_set_charset('utf8', $conn); // mysql_query('set names "utf8"', $conn);

?>