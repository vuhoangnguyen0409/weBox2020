<?php

/**
 * @author Jackie Do
 * @copyright 2013
 */

// Lấy cấu hình site
require("phpnc75_platform.php");
loadLibs(array("none_uni_alias.php"));

// Gọi phần header của giao diện
include("templates/header.php");

//Kết nối CSDL
require("libs/connect_db.php");
            
// Lấy tin mới nhất để hiển thị trên trang chủ
$sql = '
SELECT * 
FROM news, category, user 
WHERE news.cateid=category.cateid AND news.userid=user.userid AND news_public="Y" 
ORDER BY newsid DESC 
LIMIT 0, 5';
$query = mysql_query($sql, $conn);
while ($data = mysql_fetch_assoc($query)) {
    $link = 'tin-tuc/' .$data["cateid"]. '-' .noneUniAlias($data["cate_name"], true). '/' .$data["newsid"]. '-' .noneUniAlias($data["news_title"], true). '.html';
    echo '
    <div class="news_intro clear-fix">
        <h1>' .$data["news_title"]. '</h1>
        <img src="data/news_img/' .$data["news_img"]. '" class="thumbs" />
        <div class="news_info">
            <span class="date_info">' .date("l d/m/Y", $data["news_date"]). '</span>
            <span class="cate_info"><a href="category.php?id=' .$data["cateid"]. '">' .$data["cate_name"]. '</a></span>
            <span class="user_info">' .$data["username"]. '</span>
        </div>
        <p>' .$data["news_intro"]. '</p>
        <a href="' .$link. '" class="readmore">Đọc thêm</a>
    </div>';
}

// Gọi phần footer của giao diện
include("templates/footer.php");

?>