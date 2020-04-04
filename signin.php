<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('phpnc75_platform.php');
sleep(1);
if (empty($_POST["user"]) || empty($_POST["pass"]) || empty($_POST["email"]) || empty($_POST["tel"]) ) {
    echo 'Miss';
}
else {
    /* kiem tra email da ton tai chua
    $sql = 'select * from user where email="' .$_POST["email"]. '"';
    $query = $mysqli->query($sql);
    if ($query->numrows() !== 0) {
        echo 'Exist';
    }
    else {
    */    
        echo '
        <div class="input-group">
        <div class="login-info">
            <ul>
                <li><b>' .$_POST["user"]. '</b> đã đăng ký thành viên thành công</li>';
                echo '
            </ul>
        </div>
    </div>';
}

?>
