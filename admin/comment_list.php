<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
require('../libs/check_admin.php');

// lấy tất cả comment từ CSDL ra
$commentlist = new Comment();
$list = $commentlist->listAllComment();

// Chuẩn bị thông tin cho giao diện
$admin_function = 'Quản Lý Comment';

// Nội dung trang
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Danh Sách Comment</h3>
    <div class="content">
        <table class="list-table">
            <tr class="list-heading">
                <th class="id-col">STT</th>
                <th>Username</th>
                <th>Tên bài viết</th>
                <th>Comment</th>
                <th>Thời gian</th>
                <th class="action-col">Quản lý</th>
            </tr>';
            if (empty($list)) {
                echo '
                <tr class="list-data">
                    <td colspan="6" class="text-center">Chưa có dữ liệu</td>
                </tr>';
            } else {
                $stt = 0;
                foreach ($list as $comment_item) {
                    echo '
                    <tr class="list-data">
                        <td class="text-right">' .(++$stt). '</td>
                        <td>' .$comment_item["username"]. '</td>
                        <td>' .$comment_item["news_title"]. '</td>
                        <td class="text-right">' .$comment_item["comment_content"]. '</td>
                        <td class="text-right">' .date("d/m/Y - H:i:s", $comment_item["comment_date"]). '</td>
                        <td class="text-center">
                            <a href="comment_del.php?id=' .$comment_item["commentid"]. '" onclick="return xacnhan(\'Bạn có chắc muốn xóa comment có STT là: ' .$stt. '\');"><img src="images/delete.png" /></a>
                        </td>
                    </tr>';
                }
            }
            echo '
        </table>
    </div>
</div>';
require('templates/footer_default.php');

?>
