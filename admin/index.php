<?php
// Gọi cấu hình site
require('../phpnc75_platform.php');
// Kiểm tra quyền admin
loadLibs(array("check_admin.php"));

// thông kê dữ liệu
$user = new User();
$total_user = $user->totalUser();

$cate = new Cate();
$total_cate = $cate->totalCate();

$news = new News();
$total_news = $news->totalNews();

$comment = new Comment();
$total_comments = $comment->totalComment();

// Chuẩn bị cho giao diện
$admin_function = 'Trang Chính';
$custon_menu = array(
    '../index.php' => 'Xem website',
    'user_list.php' => 'Quản lý user',
    'cate_list.php' => 'Quản lý danh mục',
    'news_list.php' => 'Quản lý tin',
    'comment_list.php' => 'Quản lý bình luận',
    'site_setting.php' => 'Cấu hình site'
);

// Gọi phần đầu giao diện
require('templates/header_default.php');
?>
            <table class="function-table">
                <tr>
                    <td class="function-item user-add">
                        <a href="user_add.php">Thêm user</a>
                    </td>
                    <td class="function-item user-list">
                        <a href="user_list.php">Quản lý user</a>
                    </td>
                    <td rowspan="3" class="stats-panel">
                        <h3>Thống kê</h3>
                        <ul>
                            <li>Tổng số user: <?php echo $total_user;?></li>
                            <li>Tổng số danh mục: <?php echo $total_cate;?></li>
                            <li>Tổng số bản tin: <?php echo $total_news;?></li>
                            <li>Tổng số bình luận: <?php echo $total_comments;?></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td class="function-item cate-add">
                        <a href="cate_add.php">Thêm danh mục</a>
                    </td>
                    <td class="function-item cate-list">
                        <a href="cate_list.php">Quản lý danh mục</a>
                    </td>
                </tr>
                <tr>
                    <td class="function-item news-add">
                        <a href="news_add.php">Thêm tin</a>
                    </td>
                    <td class="function-item news-list">
                        <a href="news_list.php">Quản lý tin</a>
                    </td>
                </tr>
                <tr>
                    <td class="function-item news-list">
                        <a href="comment_list.php">Quản lý comment</a>
                    </td>
                </tr>
            </table>
<?php
require('templates/footer_default.php');
?>
