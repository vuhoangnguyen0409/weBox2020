<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "valid_user.php"));

// Sau khi nhấn nút submit form
if (isset($_POST["btnUserAdd"])) {
    // Kiểm ra dữ liệu đầu vào
    if (empty($_POST["txtUser"])) {
        ErrorHandler::setError('Vui lòng nhập username');
    } elseif (!validUsername($_POST["txtUser"])) {
        ErrorHandler::setError('Username không hợp lệ. Chỉ chấp nhận ký tự chữ cái, số và tối thiểu ' .$username_min_len. ' ký tự');
    } elseif (empty($_POST["txtPass"])) {
        ErrorHandler::setError('Vui lòng nhập password');
    } elseif ($_POST["txtRePass"] != $_POST["txtPass"]) {
        ErrorHandler::setError('hai ô mật khẩu không trùng nhau');
    } elseif (empty($_POST["email"])) {
        ErrorHandler::setError('Vui lòng nhập Email');
    } elseif (empty($_POST["tel"])) {
        ErrorHandler::setError('Vui lòng nhập SDT');
    } else {
        $user = new User($_POST["txtUser"], $_POST["txtPass"], $_POST["rdoLevel"], $_POST["email"], $_POST["tel"]);
        //var_dump($user);
        //die();
        if ($user->existsUsername()) {
            ErrorHandler::setError('<i>Username này đã tồn tại. Vui lòng chọn username khác</i>');
        }
        elseif ($user->existsEmail()) {
            ErrorHandler::setError('<i>Email này đã tồn tại. Vui lòng chọn username khác</i>');
        } else {
            $user->addUser();
            header("location: user_list.php");
            exit();
        }
    }
}

$admin_function = 'Thêm User';
$custon_menu = array(
    'user_list.php' => 'Quản lý user'
);
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Thông Tin User</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '" method="post">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label>Username:</label>
                <div class="input-item">
                    <input type="text" name="txtUser"';
                    if (isset($_POST["txtUser"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtUser"]). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label>Password:</label>
                <div class="input-item">
                    <input type="password" name="txtPass" />
                </div>
            </div>
            <div class="input-group">
                <label>Confirm password:</label>
                <div class="input-item">
                    <input type="password" name="txtRePass" />
                </div>
            </div>
            <div class="input-group">
                <label>Email:</label>
                <div class="input-item">
                    <input type="email" name="email" />
                </div>
            </div>
            <div class="input-group">
                <label>Phone:</label>
                <div class="input-item">
                    <input type="tel" name="tel" />
                </div>
            </div>
            <div class="input-group">
                <label>Level:</label>
                <div class="input-item">
                    <label><input type="radio" name="rdoLevel" value="1" /> Quản trị</label>
                    <label><input type="radio" name="rdoLevel" value="2" checked="checked" /> Thành viên</label>
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnUserAdd" value="Thêm user" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>
