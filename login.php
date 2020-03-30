<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('phpnc75_platform.php');
sleep(1);
if (empty($_POST["user"]) || empty($_POST["pass"])) {
    echo 'Miss';
} else {
    $login = new User($_POST["user"], $_POST["pass"]);
    if (!$login->checkLogin()) {
        echo 'Wrong';
    } else {
        echo '
        <div class="input-group">
            <div class="login-info">
                <ul>
                    <li>Xin chào <b>' .$_SESSION[$prefix."username"]. '</b></li>';
                    if ($_SESSION[$prefix."level"] == 1) {
                        echo '<li><a href="admin/index.php">Khu vực quản trị</a></li>';
                    }
                    echo '
                </ul>
            </div>
            <div>
                <input type="button" name="btnLogout" value="Đăng xuất" />
            </div>
        </div>';
    }
}

?>