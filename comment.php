<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

sleep(1);
require("phpnc75_platform.php");
if (empty($_POST["content"]) || empty($_POST["newsid"]) || !User::isLogined()) {
    echo 'Miss';
} else {
    $content = addslashes(nl2br($_POST["content"]));
    $newsid = $_POST["newsid"];
    $user = $_SESSION[$prefix."userid"];
    require("libs/connect_db.php");
    // Thêm comment vào CSDL
    $sql_add = 'insert into comment(content, newsid, userid) values("' .$content. '", ' .$newsid. ', ' .$user. ')';
    mysql_query($sql_add, $conn);
    
    // Lấy ra tất cả comment của bản tin hiện tại
    $sql_comment = 'select * from comment, user where comment.userid=user.userid and newsid='.$newsid.' order by commentid ASC';
    $query_comment = mysql_query($sql_comment, $conn);
    while ($data_comment = mysql_fetch_assoc($query_comment)) {
        echo '
        <div class="comment_item">
            <h3>' .$data_comment["username"]. ':</h3>
            <div>' .$data_comment["content"]. '</div>
        </div>';
    }
}

?>