<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));
// Kiểm tra xem có nhận được khóa chính cần xóa?
if (!isset($_GET["id"])) {
    header("location: user_list.php");
    exit();
}
$id = $_GET["id"];

$user = new User();
if (!$user->delUser($id)) {
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn không có quyền xóa user này");
        window.location = "user_list.php";
    </script>';
    exit();
}
header("location: user_list.php");

?>