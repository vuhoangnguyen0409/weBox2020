<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
require('../libs/check_admin.php');

// lấy tất cả tài khoản từ CSDL ra
$userlist = new User();
$list = $userlist->listAllUser();

// Chuẩn bị thông tin cho giao diện
$admin_function = 'Quản Lý User';
$custon_menu = array(
    'user_add.php' => 'Thêm user'
);

// Nội dung trang
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Danh Sách User</h3>
    <div class="content">
        <table class="list-table">
            <tr class="list-heading">
                <th class="id-col">STT</th>
                <th>Username</th>
                <th>Level</th>
                <th class="action-col">Quản lý</th>
                <th class="id-col">ID</th>
            </tr>';
            if (empty($list)) {
                echo '
                <tr class="list-data">
                    <td colspan="4" class="text-center">Chưa có dữ liệu</td>
                </tr>';
            } else {
                $stt = 0;
                foreach ($list as $user_item) {
                    echo '
                    <tr class="list-data">
                        <td class="text-right">' .(++$stt). '</td>
                        <td>' .$user_item["username"]. '</td>
                        <td>';
                        if ($user_item["userid"] == 1) {
                            echo '<img src="images/super_admin.png" width="18px" align="absmiddle" /> Quản trị cấp cao';
                        } elseif ($user_item["level"] == 1) {
                            echo 'Quản trị viên';
                        } else {
                            echo 'Thành viên';
                        }
                        echo '</td>
                        <td class="text-center">
                            <a href="user_edit.php?id=' .$user_item["userid"]. '"><img src="images/edit.png" /></a>&nbsp;&nbsp;
                            <a href="user_del.php?id=' .$user_item["userid"]. '" onclick="return xacnhan(\'Bạn có chắc muốn xóa user có ID là: ' .$user_item["userid"]. '\');"><img src="images/delete.png" /></a>
                        </td>
                        <td class="text-right">' .$user_item["userid"]. '</td>
                    </tr>';
                }
            }
            echo '
        </table>
    </div>
</div>';
require('templates/footer_default.php');

?>