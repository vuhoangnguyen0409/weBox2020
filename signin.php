<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('phpnc75_platform.php');
sleep(1);
if (empty($_POST["user"]) || empty($_POST["pass"]) || empty($_POST["email"]) || empty($_POST["tel"]) ) {
    //echo '<script>alert(2);</script>';
    echo 'Miss';
}   else {
        //check email da ton tai
        $signin = new User($_POST["user"], $_POST["pass"], 2, $_POST["email"], $_POST["tel"] );
        if ($signin->existsEmail()) {
            echo 'Duplicate';
        }
        else {
            $signin->addUser();
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
    }

?>
