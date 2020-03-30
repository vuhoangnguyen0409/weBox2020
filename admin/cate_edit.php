<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Kiểm tra xem có nhận được thông tin khóa chính của danh mục cần sửa hay không
if (!isset($_GET["id"])) {
    header("location: cate_list.php");
    exit();
}
$id = $_GET["id"];

// Lấy thông tin của danh mục để đổ vào form
$cate = new Cate();
$cate->getCateInfoById($id);

// Sau khi nhấn nút submit form
if (isset($_POST["btnCateEdit"])) {
    if (empty($_POST["txtCate"])) {
        ErrorHandler::setError('Vui lòng nhập tên danh mục');
    } else {
        $cate->setCateName($_POST["txtCate"]);
        if ($cate->checkExistsCate()) {
            ErrorHandler::setError('Danh mục này đã tồn tại. Vui lòng chọn tên khác');
        } else {
            $cate->editCate($id);
            header("location: cate_list.php");
            exit();
        }
    }
}

$admin_function = 'Sửa Danh Mục';
$custon_menu = array(
    'cate_list.php' => 'Quản lý danh mục'
);
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Thông Tin Danh Mục</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '?id=' .$id. '" method="post">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label>Tên danh mục:</label>
                <div class="input-item">
                    <input type="text" name="txtCate"';
                    if (isset($_POST["txtCate"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtCate"]). '"';
                    } else {
                        echo ' value="' .htmlspecialchars($cate->getCateName()). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnCateEdit" value="Sửa danh mục" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>