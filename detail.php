<?php

/**
 * @author Jackie Do
 * @copyright 2013
 */

// Lấy cấu hình site
require("phpnc75_platform.php");
loadLibs(array("none_uni_alias.php"));

// Chuẩn bị các giá trị
if (!isset($_GET["id"])) {
    header("location: index.php");
    exit();
}
$id = $_GET["id"];

// Gọi phần header của giao diện
include("templates/header.php");

//Kết nối CSDL
include("libs/connect_db.php");

// Lấy ban tin
$sql = 'SELECT * FROM news as n, category as c, user as u WHERE news_public="Y" AND newsid="' .$id. '" AND n.userid=u.userid AND n.cateid=c.cateid';
var_dump($sql);
$query = $mysqli->query($sql);
$data = $query -> fetch_assoc();
    echo '
    <div class="news">
        <h1>' .$data["news_title"]. '</h1>
        <div class="news_intro clearfix">
            <img src="data/news_img/' .$data["news_img"]. '" class="thumbs" />
            <div class="news_info">
                <span class="date_info">' .date("l d/m/Y - H:i:s", $data["news_date"]). '</span><br />
                <span class="cate_info"><a href="category.php?id=' .$data["cateid"]. '">' .$data["cate_name"]. '</a></span>
                <span class="user_info">' .$data["username"]. '</span>
                <span class="source_info">Nguồn: ' .$data["news_source"]. '</span>
            </div>
            <div>
                ' .$data["news_intro"]. '
            </div>
        </div>
        <div>
            ' .str_replace('{$siteURL}', $siteURL, $data["news_full"]). '
        </div>
    </div><!-- End .news -->
    <div id="comment">
        <h2>Bình Luận Bản Tin:</h2>
        <div id="comment_content">';
        // Lấy tất cả comment (của riêng bản tin này) show ra trang
        $sql_comment = 'select * from comments, user where comments.userid=user.userid and newsid='.$id.' order by commentid ASC';
        $query_comment = $mysqli->query($sql_comment);
        while ($data_comment = $query_comment -> fetch_assoc()) {
            echo '
            <div class="comment_item">
                <h3>' .$data_comment["username"]. ':</h3>
                <div>' .$data_comment["comment_content"]. '</div>
            </div>';
        }
        echo '</div>
        <form name="fComment" id="fComment" action="#" method="post">
            <fieldset>
                <legend>Nhập bình luận</legend>
                <div id="comment_msg" align="center">';
                if (!User::isLogined()) {
                    echo 'Vui lòng đăng nhập để bình luận cho bản tin';
                }
                echo '</div>
                <div id="comment_element"';
                if (!User::isLogined()) {
                    echo ' style="display: none;"';
                }
                echo '>
                    <div class="input-group">
                        <div class="input-item">
                            <input type="hidden" name="newsid" value="' .$id. '" />
                            <textarea name="txtComment" id="txtComment" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-item">
                            <input type="submit" name="btnComment" id="btnComment" value="Bình luận" />
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div><!-- End #comment -->';

// Gọi phần footer của giao diện
include("templates/footer.php");

?>
