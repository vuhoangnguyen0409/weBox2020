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
    $sql_add = 'insert into comments(comment_content, newsid, userid) values("' .$content. '", ' .$newsid. ', ' .$user. ')';
    //mysql_query($sql_add, $conn);
    $mysqli->query($sql_add);

    // Lấy ra tất cả comment của bản tin hiện tại
    $sql_comment = 'select * from comments, user where comments.userid=user.userid and newsid='.$newsid.' order by commentid ASC';
    $query_comment = $mysqli->query($sql_comment);
    while ($data_comment = $query_comment -> fetch_assoc()) {
        echo '
        <div class="comment_item">
            <h3>' .$data_comment["username"]. ':</h3>
            <div>' .$data_comment["comment_content"]. '</div>
        </div>';
    }
}

?>
