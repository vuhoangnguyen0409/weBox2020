<?php

/**
 * Class for working with news item on site
 *
 * @author Jackie Do
 * @copyright 2014
 * @version 1.0
 */

class News extends Database {
    protected $newsTitle;
    protected $newsSource;
    protected $newsIntro;
    protected $newsFull;
    protected $newsImg;
    protected $newsPublic;
    protected $newsDate;
    protected $newsCate;
    protected $newsPoster;

    /**
     * Set title for a news item
     * =========================
     * @param string newsTitle
     **/
    public function setNewsTitle($newsTitle) {
        if (!empty($newsTitle)) {
            $this->newsTitle = trim($newsTitle);
            $this->newsTitle = strip_tags($newsTitle);
        }
    }

    /**
     * Get title of a news item
     * ========================
     * @return string
     **/
    public function getNewsTitle() {
        return $this->newsTitle;
    }

    /**
     * Set source for a news item
     * ==========================
     * @param string newsSource
     **/
    public function setNewsSource($newsSource) {
        if (!empty($newsSource)) {
            $this->newsSource = trim($newsSource);
            $this->newsSource = strip_tags($newsSource);
        }
    }

    /**
     * Get source of a news item
     * =========================
     * @return string
     **/
    public function getNewsSource() {
        return $this->newsSource;
    }

    /**
     * Set intro for a news item
     * =========================
     * @param string newsIntro
     **/
    public function setNewsIntro($newsIntro) {
        if (!empty($newsIntro)) {
            $this->newsIntro = trim($newsIntro);
        }
    }

    /**
     * Get intro of a news item
     * ========================
     * @return string
     **/
    public function getNewsIntro() {
        return $this->newsIntro;
    }

    /**
     * Set full content for a news item
     * ================================
     * @param string newsFull
     **/
    public function setNewsFull($newsFull) {
        if (!empty($newsFull)) {
            $this->newsFull = trim($newsFull);
        }
    }

    /**
     * Get full content of a news item
     * ===============================
     * @return string
     **/
    public function getNewsFull() {
        return $this->newsFull;
    }

    /**
     * Set news images for a news item
     * ===============================
     * @param string newsImg
     **/
    public function setNewsImg($newsImg) {
        if (!empty($newsImg)) {
            if (function_exists('stripUni') && function_exists('fixUploadname')) {
                $this->newsImg = stripUni(fixUploadname($newsImg));
            } else {
                $this->newsImg = $newsImg;
            }
        }
    }

    /**
     * Get news images of a news item
     * ==============================
     * @return string
     **/
    public function getNewsImg() {
        return $this->newsImg;
    }

    /**
     * Set public for a news item
     * ==========================
     * @param string newsPublic
     **/
    public function setNewsPublic($newsPublic) {
        if (!empty($newsPublic)) {
            $this->newsPublic = trim($newsPublic);
        }
    }

    /**
     * Get public of a news item
     * =========================
     * @return string
     **/
    public function getNewsPublic() {
        return $this->newsPublic;
    }

    /**
     * Set date of post for a news item
     * ================================
     * @param int newsDate
     **/
    public function setNewsDate($newsDate) {
        if (!empty($newsDate)) {
            $this->newsDate = (int)$newsDate;
        }
    }

    /**
     * Get date of poster of a news item
     * =================================
     * @return int
     **/
    public function getNewsDate() {
        return $this->newsDate;
    }

    /**
     * Set category id for a news item
     * ===============================
     * @param int newsCate
     **/
    public function setNewsCate($newsCate) {
        if (!empty($newsCate)) {
            $this->newsCate = (int)$newsCate;
        }
    }

    /**
     * Get category id of a news item
     * ==============================
     * @return int
     **/
    public function getNewsCate() {
        return $this->newsCate;
    }

    /**
     * Set poster id for a news item
     * =============================
     * @param int newsPoster
     **/
    public function setNewsPoster($newsPoster) {
        if (!empty($newsPoster)) {
            $this->newsPoster = (int)$newsPoster;
        }
    }

    /**
     * Get poster id of a news item
     * ============================
     * @return string
     **/
    public function getNewsPoster() {
        return $this->newsPoster;
    }

    /**
     * Count total news in database
     * ============================
     * @return int
     **/
    public function totalNews() {
        $sql = 'select count(newsid) as total_news from news';
        $this->query($sql);
        $data = $this->fetch();
        return (int)$data["total_news"];
    }

    /**
     * List all news item on site
     * ==========================
     * @return array
     **/
    public function listAllNews($limit=null) {
        $sql = 'select newsid, news_title, news_source, cate_name, username, news_public, news_date from news left join category on news.cateid=category.cateid left join user on news.userid=user.userid order by newsid DESC';
        if (!empty($limit)) {
            $sql .= ' '.$limit;
        }
        $this->query($sql);
        $data = array();
        while ($row = $this->fetch()) {
            $data[] = $row;
        };
        return $data;
    }

    /**
     * Check accept upload news images
     * ===============================
     * @param string fileName
     **/
    static public function acceptUpload($fileName) {
        global $accept_upload_ext;
        // Kiểm tra xem hàm lấy phần mở rộng của tập tin đã có chưa
        if (function_exists('getExt')) {
            if (!in_array(getExt($fileName), $accept_upload_ext)) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * Upload an images to site through form
     * =====================================
     * @param string formElementName
     **/
    public function uploadNewsImg($formElementName) {
        if ($_FILES[$formElementName]["error"] != 0 || empty($this->newsImg)) {
            return false;
        } else {
            move_uploaded_file($_FILES[$formElementName]["tmp_name"], '../data/news_img/'.$this->newsImg);
            return true;
        }
    }

    /**
     * Insert news item information into DBMS
     * ======================================
     **/
    public function addNews() {
        global $siteURL;
        $title = addslashes($this->newsTitle);
        $source = addslashes($this->newsSource);
        $intro = addslashes($this->newsIntro);
        $full = addslashes(str_replace($siteURL, '{$siteURL}', $this->newsFull));
        $sql = 'insert into news(news_title, news_source, news_intro, news_full, news_img, news_public, news_date, userid, cateid) values("' .$title. '", "' .$source. '", "' .$intro. '", "' .$full. '", "' .$this->newsImg. '", "' .$this->newsPublic. '", ' .$this->newsDate. ', ' .$this->newsPoster. ', ' .$this->newsCate. ')';
        $this->query($sql);
    }

    /**
     * Get news item info from database by id
     * ======================================
     * @param int id
     **/
    public function getNewsInfoById($id) {
        $sql = 'select * from news where newsid='.$id;
        $this->query($sql);
        $data = $this->fetch();
        $this->newsCate = $data["cateid"];
        $this->newsDate = $data["news_date"];
        $this->newsFull = $data["news_full"];
        $this->newsImg = $data["news_img"];
        $this->newsIntro = $data["news_intro"];
        $this->newsPoster = $data["userid"];
        $this->newsPublic = $data["news_public"];
        $this->newsSource = $data["news_source"];
        $this->newsTitle = $data["news_title"];
    }

    /**
     * Delete news image of a news item
     * ================================
     **/
    public function delNewsImage() {
        if (file_exists('../data/news_img/'.$this->newsImg)) {
            unlink('../data/news_img/'.$this->newsImg);
        }
    }

    /**
     * Delete news item in database
     * ============================
     * @param int id
     **/
    public function delNews($id) {
        $sql = 'delete from news where newsid='.$id;
        $this->query($sql);
        $this->delNewsImage();
    }

    /**
     * Edit news item information in database
     * ======================================
     * @param int id
     **/
    public function editNews($id) {
        global $siteURL;
        $title = addslashes($this->newsTitle);
        $source = addslashes($this->newsSource);
        $intro = addslashes($this->newsIntro);
        $full = addslashes(str_replace($siteURL, '{$siteURL}', $this->newsFull));
        $sql = 'update news set news_title="' .$title. '", news_source="' .$source. '", news_intro="' .$intro. '", news_full="' .$full. '", news_img="' .$this->newsImg. '", news_public="' .$this->newsPublic. '", cateid=' .$this->newsCate. ' where newsid='.$id;
        $this->query($sql);
    }
}

?>
