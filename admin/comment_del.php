<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));
// Kiểm tra xem có nhận được khóa chính cần xóa?
if (!isset($_GET["id"])) {
    header("location: comment_list.php");
    exit();
}
$id = $_GET["id"];

$comment = new Comment();
$comment->delComment($id);
header("location: comment_list.php");

?>
