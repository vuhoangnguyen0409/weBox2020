<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

// Kiểm tra quyền admin
// Nhớ phải gọi cấu hình site trước
if (!User::isAdmin()) {
    header("location: login.php");
    exit();
}

?>