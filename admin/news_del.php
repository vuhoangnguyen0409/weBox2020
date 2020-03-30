<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Kiểm tra xem có nhận được thông tin khóa chính của bản tin hay không
if (!isset($_GET["id"])) {
    header("location: news_list.php");
    exit();
}

// Xóa tin
$news = new News();
$news->getNewsInfoById($_GET["id"]);
$news->delNews($_GET["id"]);
header('location: news_list.php');

?>