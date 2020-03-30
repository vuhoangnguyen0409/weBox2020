<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Load dữ liệu danh mục
$cate = new Cate();
$catelist = $cate->listAllCate();

// Chuẩn bị thông tin cho giao diện
$admin_function = 'Quản Lý Danh Mục';
$custon_menu = array(
    'cate_add.php' => 'Thêm danh mục'
);

// Nội dung trang
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Danh Sách Danh Mục</h3>
    <div class="content">
        <table class="list-table">
            <tr class="list-heading">
                <th class="id-col">STT</th>
                <th>Tên danh mục</th>
                <th class="action-col">Quản lý</th>
                <th class="id-col">ID</th>
            </tr>';
            if (empty($catelist)) {
                echo '
                <tr class="list-data">
                    <td colspan="4" class="text-center">Chưa có dữ liệu</td>
                </tr>';
            } else {
                $stt = 0;
                foreach ($catelist as $cate_item) {
                    echo '
                    <tr class="list-data">
                        <td class="text-right">' .(++$stt). '</td>
                        <td>' .$cate_item["cate_name"]. ' <span style="color: gray;">(' .$cate_item["total_news"]. ' bản tin)</span></td>
                        <td class="text-center">
                            <a href="cate_edit.php?id=' .$cate_item["cateid"]. '"><img src="images/edit.png" /></a>&nbsp;&nbsp;
                            <a href="cate_del.php?id=' .$cate_item["cateid"]. '" onclick="return xacnhan(\'Bạn có chắc muốn xóa danh mục có ID là: ' .$cate_item["cateid"]. '\');"><img src="images/delete.png" /></a>
                        </td>
                        <td class="text-right">' .$cate_item["cateid"]. '</td>
                    </tr>';
                }
            }
            echo '
        </table>
    </div>
</div>';
require('templates/footer_default.php');

?>