<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Sau khi nhấn nút submit form
if (isset($_POST["btnCateAdd"])) {
    // Kiểm ra dữ liệu đầu vào
    if (empty($_POST["txtCate"])) {
        ErrorHandler::setError('Vui lòng nhập tên danh mục');
    } else {
        $cate = new Cate($_POST["txtCate"]);
        // trước khi thêm ta kiểm tra xem đã tồn tại danh mục có tên trùng với nội dung người dùng đã nhập?
        if ($cate->checkExistsCate()) {
            ErrorHandler::setError('Danh mục này đã tồn tại. Vui lòng chọn tên khác');
        } else {
            // Thêm
            $cate->addCate();
            header("location: cate_list.php");
            exit();
        }
    }
}

$admin_function = 'Thêm Danh Mục';
$custon_menu = array(
    'cate_list.php' => 'Quản lý danh mục'
);
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Thông Tin Danh Mục</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '" method="post">';
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
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnCateAdd" value="Thêm danh mục" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>