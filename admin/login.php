<?php
// Gọi cấu hình site
require('../phpnc75_platform.php');

// Sau khi submit
if (isset($_POST["btnLogin"])) {
    // Kiểm tra xem người dùng có nhập liệu đầy đủ chưa
    if (empty($_POST["txtUser"])) {
        ErrorHandler::setError('Vui lòng nhập username');
    } elseif (empty($_POST["txtPass"])) {
        ErrorHandler::setError('Vui lòng nhập password');
    } else {
        $login = new User($_POST["txtUser"], $_POST["txtPass"]);
        if (!$login->checkLogin()) {
            ErrorHandler::setError('Sai thông tin đăng nhập');
        } else {
            header("location: index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Jackie Do" />
    <link rel="stylesheet" href="templates/css/login.css" />
    
    <title>Admin Panel :: Login</title>
</head>

<body>

    <div id="layout">
        <div id="login-box">
            <h3>Đăng nhập khu vực quản trị</h3>
            <div class="content">
                <form action="" method="post">
                    <div class="input-group input-group-msg">
                        <?php
                        if (ErrorHandler::hasError()) {
                            echo '<div class="error_msg">'.ErrorHandler::getError().'</div>';
                        } else {
                            echo 'Thông tin đăng nhập';
                        }
                        ?>
                    </div>
                    <div class="input-group">
                        <label class="input-label username"></label>
                        <div class="input-item">
                            <input type="text" name="txtUser" placeholder="Tên tài khoản" class="user-info"<?php
                            if (isset($_POST["txtUser"])) {
                                echo ' value="' .$_POST["txtUser"]. '"';
                            }
                            ?> />
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="input-label password"></label>
                        <div class="input-item">
                            <input type="password" name="txtPass" placeholder="Mật khẩu" class="user-info" />
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="submit" name="btnLogin" value="Đăng nhập" class="login-button" />
                        <a href="../index.php" class="back-to-home">Quay về trang chủ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>