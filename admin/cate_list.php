<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Chuẩn bị thông tin cho giao diện
$admin_function = 'Quản Lý Danh Mục';
$custon_menu = array(
    'cate_add.php' => 'Thêm danh mục'
);

/** Thuật toán phân trang **/
// xác định trang hiện tại
if (isset($_GET["page"])) {
    $currentPage = $_GET["page"];
} else {
    $currentPage = 1;
}
// Công thức để xác định vị trí record bắt đầu lấy ra trong CSDL
$startRecord = $rowPerPage * ($currentPage - 1);

// Load dữ liệu danh mục
$cate = new Cate();
$totalRecord = $cate->totalCate();
$totalPage = $totalRecord / $rowPerPage;
$limit = 'limit ' .$startRecord. ', '.$rowPerPage;
$catelist = $cate->listAllCate($limit);

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
                $stt = $startRecord;
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

// Xuất thanh phân trang
if ($totalPage > 1) {
    // Phân đoạn thanh phân trang
    if ($pagePerSegment > $totalPage) {
        $startSegement = 1;
        $endSegement = $totalPage;
    } else {
        // Số trang bên trái trang hiện tại
        if ($pagePerSegment % 2 == 0) {
            $leftCurrent = ($pagePerSegment / 2) - 1;
        } else {
            $leftCurrent = floor($pagePerSegment / 2);
        }
        // Xác định đầu đoạn
        $startSegement = $currentPage - $leftCurrent;
        // Xác định cuối đoạn
        $endSegement = $startSegement + $pagePerSegment - 1;

        // Nếu đầu đoạn nhỏ hơn
        if ($startSegement < 1) {
            $startSegement = 1;
            $endSegement = $pagePerSegment;
        }
        // nếu cuối đoạn lớn tổng số trnag
        if ($endSegement > $totalPage) {
            $endSegement = $totalPage;
            $startSegement = $endSegement - $pagePerSegment + 1;
        }
    }
    ///////////////////////////////////////////////////////////

    echo '<div class="paging_nav">';
    // Nút trang đầu: chỉ xu61t hiện khi đầu đoạn lớn hơn 1
    if ($startSegement > 1) {
        echo '<a href="' .$_SERVER["PHP_SELF"]. '?page=1">Đầu</a>';
        echo '<a href="' .$_SERVER["PHP_SELF"]. '?page=' .($currentPage - 1). '">Lùi</a>';
    }

    // danh sách trang
    for ($page = $startSegement; $page <= $endSegement; $page++) {
        if ($page == $currentPage) {
            echo '<span class="current_page">' .$page. '</span>';
        } else {
            echo '<a href="' .$_SERVER["PHP_SELF"]. '?page=' .$page. '">' .$page. '</a>';
        }
    }

    // Nút trang cuối: chỉ xuất hiện khi cuối đoạn nhỏ hơn tổng số trang
    if ($endSegement < $totalPage) {
        echo '<a href="' .$_SERVER["PHP_SELF"]. '?page=' .($currentPage+1). '">Tới</a>';
        echo '<a href="' .$_SERVER["PHP_SELF"]. '?page=' .$totalPage. '">Cuối</a>';
    }
    echo '</div>';
}

require('templates/footer_default.php');

?>
