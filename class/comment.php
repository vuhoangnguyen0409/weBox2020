<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class Comment extends Database {

    public function listAllComment() {
        $limit= 'LIMIT 0, 8';
        $sql = 'select comment_content, commentid, news_title, username from comments left join news on comments.newsid=news.newsid left join user on comments.userid=user.userid order by commentid DESC';
        $this->query($sql);
        $data = array();
        while ($row = $this->fetch()) {
            $data[] = $row;
        }
        //var_dump($data);
        //die();
        return $data;
    }

    public function delComment($id) {
        $sql = 'delete from comments where commentid='.$id;
        $this->query($sql);
        return true;
    }

    public function totalComment() {
        $sql = 'select count(commentid) as total_comment from comments';
        $this->query($sql);
        $data = $this->fetch();
        return $data["total_comment"];
    }
}

?>
