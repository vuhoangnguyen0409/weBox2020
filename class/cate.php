<?php

/**
 * Class for working with category on site
 * 
 * @author Jackie Do
 * @copyright 2014
 * @version 1.0
 */

class Cate extends Database {
    protected $cateName;
    
    /**
     * Set name for a category
     * =======================
     * @param string cateName
     **/
    public function __construct($cateName=null) {
        parent::__construct();
        $this->setCateName($cateName);
    }
    
    /**
     * Set name for a category
     * =======================
     * @param string cateName 
     **/
    public function setCateName($cateName) {
        if (!empty($cateName)) {
            $this->cateName = trim($cateName);
            $this->cateName = strip_tags($cateName);
        }
    }
    
    /**
     * Get name of an category
     * =======================
     * @return string
     **/
    public function getCateName() {
        return $this->cateName;
    }
    
    /**
     * List all category on site
     * =========================
     * @return array
     **/
    public function listAllCate($limit=null) {
        $sql = 'select category.cateid, cate_name, count(newsid) as total_news from category left join news on category.cateid=news.cateid group by cate_name order by category.cateid desc';
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
     * Check if exists category in database
     * ====================================
     * @return boolean
     **/
    public function checkExistsCate() {
        $sql = 'select * from category where cate_name="' .addslashes($this->cateName). '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        }
        return true;
    }
    
    /**
     * Insert category information into DBMS
     * =====================================
     * @return boolean
     **/
    public function addCate() {
        if (!is_null($this->cateName) && !$this->checkExistsCate()) {
            $sql = 'insert into category(cate_name) values("' .addslashes($this->cateName). '")';
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Get category info from database by id
     * =====================================
     * @param int id
     **/
    public function getCateInfoById($id) {
        $sql = 'select * from category where cateid='.$id;
        $this->query($sql);
        $data = $this->fetch();
        $this->cateName = $data["cate_name"];
    }
    
    /**
     * Delete category in database
     * ===========================
     * @param int id
     **/
    public function delCate($id) {
        $sql = 'delete from category where cateid='.$id;
        $this->query($sql);
    }
    
    /**
     * Edit category information in database
     * =====================================
     * @param int id
     * @return boolean
     **/
    public function editCate($id) {
        if (!$this->checkExistsCate()) {
            $sql = 'update category set cate_name="' .addslashes($this->cateName). '" where cateid='.$id;
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Count total category in database
     * ================================
     * @return int
     **/
    public function totalCate() {
        $sql = 'select count(cateid) as total_cate from category';
        $this->query($sql);
        $data = $this->fetch();
        return (int)$data["total_cate"];
    }
}

?>