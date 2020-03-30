<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Load danh sách bản tin
$news = new News();
$newslist = $news->listAllNews();

// Chuẩn bị thông tin cho giao diện
$admin_function = 'Quản Lý Bản Tin';
$custon_menu = array(
    'news_add.php' => 'Thêm tin'
);

// Nội dung trang
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Danh Sách Bản Tin</h3>
    <div class="content">
        <table class="list-table">
            <tr class="list-heading">
                <th class="id-col">STT</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Công bố?</th>
                <th>Ngày viết</th>
                <th>Người viết</th>
                <th class="action-col">Quản lý</th>
                <th class="id-col">ID</th>
            </tr>';
            if (empty($newslist)) {
                echo '
                <tr class="list-data">
                    <td colspan="8" class="text-center">Chưa có dữ liệu</td>
                </tr>';
            } else {
                $stt = 0;
                foreach ($newslist as $news_item) {
                    echo '
                    <tr class="list-data">
                        <td class="text-right">' .(++$stt). '</td>
                        <td>' .$news_item["news_title"]. '</td>
                        <td>' .$news_item["cate_name"]. '</td>
                        <td>';
                        switch ($news_item["news_public"]) {
                            case "Y":
                                echo 'Có';
                                break;
                            case "N":
                                echo 'Không';
                                break;
                        }
                        echo '</td>
                        <td>' .date("d/m/Y - H:i:s", $news_item["news_date"]). '</td>
                        <td>' .$news_item["username"]. '</td>
                        <td class="text-center">
                            <a href="news_edit.php?id=' .$news_item["newsid"]. '"><img src="images/edit.png" /></a>&nbsp;&nbsp;
                            <a href="news_del.php?id=' .$news_item["newsid"]. '" onclick="return xacnhan(\'Bạn có chắc muốn xóa bản tin có ID là: ' .$news_item["newsid"]. '\');"><img src="images/delete.png" /></a>
                        </td>
                        <td class="text-right">' .$news_item["newsid"]. '</td>
                    </tr>';
                }
            }
            echo '
        </table>
    </div>
</div>';
require('templates/footer_default.php');

?>