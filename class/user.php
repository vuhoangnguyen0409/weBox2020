<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class User extends Database {
    protected $username;
    protected $password;
    protected $level;
    
    public function __construct($username=null, $password=null, $level=null) {
        parent::__construct();
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setLevel($level);
    }
    
    public function setUsername($username) {
        if (!empty($username)) {
            $this->username = $username;
        }
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setPassword($password) {
        if (!empty($password)) {
            $this->password = md5($password);
        }
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setLevel($level) {
        if (!empty($level)) {
            $this->level = (int)$level;
        }
    }
    
    public function getLevel() {
        return $this->level;
    }
    
    public function checkLogin() {
        global $prefix;
        $sql = 'select * from user where username="' .$this->username. '" and password="' .$this->password. '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        } else {
            $data = $this->fetch();
            $_SESSION[$prefix."username"] = $data["username"];
            $_SESSION[$prefix."level"] = $data["level"];
            $_SESSION[$prefix."userid"] = $data["userid"];
            return true;
        }
    }
    
    static public function isLogined() {
        global $prefix;
        if (!isset($_SESSION[$prefix."level"])) {
            return false;
        } else {
            return true;
        }
    }
    
    static public function isAdmin() {
        global $prefix, $siteURL;
        if (!self::isLogined() || $_SESSION[$prefix."level"] != 1) {
            return false;
        } else {
            // Nếu đã đănng nhập đúng admin, cho phép sử dụng KCFinder
            $_SESSION['KCFINDER'] = array(
                'disabled' => false,
                'uploadURL' => $siteURL.'data', // Không có dấu / cuối cùng
                'uploadDir' => ""
            );
            return true;
        }
    }
    
    public function listAllUser() {
        $sql = 'select * from user order by userid DESC';
        $this->query($sql);
        $data = array();
        while ($row = $this->fetch()) {
            $data[] = $row;
        }
        return $data;
    }
    
    public function existsUsername() {
        $sql = 'select userid from user where username="' .$this->username. '"';
        $this->query($sql);
        if ($this->numrows() == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public function addUser() {
        if (!empty($this->username) && !empty($this->password) && !empty($this->level) && !$this->existsUsername()) {
            $sql = 'insert into user(username, password, level) values("' .$this->username. '", "' .$this->password. '", ' .$this->level. ')';
            $this->query($sql);
        }
    }
    
    public function getUserInfoById($id) {
        $sql = 'select * from user where userid='.$id;
        $this->query($sql);
        $data = $this->fetch();
        $this->username = $data["username"];
        $this->password = $data["password"];
        $this->level = $data["level"];
    }
    
    public function checkDelPermission($id) {
        global $prefix;
        $this->getUserInfoById($id);
        /** Kiểm tra quyền xóa. Có 2 trường hợp cấm xóa
         * 1. Xóa super admin (có khóa chính là 1)
         * 2. Đăng nhập không phải là super admin mà xóa admin
         **/        
        if (($id == 1) || ($_SESSION[$prefix."userid"] != 1 && $this->level == 1)) {
            return false;
        } else {
            return true;
        }
    }
    
    public function editMyself($id) {
        global $prefix;
        if ($_SESSION[$prefix."userid"] == $id) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkEditPermission($id) {
        global $prefix;
        $this->getUserInfoById($id);
        if ($_SESSION[$prefix."userid"] != 1 && $this->level == 1 && !$this->editMyself($id)) {
            return false;
        } else {
            return true;
        }
    }
    
    public function delUser($id) {
        if ($this->checkDelPermission($id)) {
            $sql = 'delete from user where userid='.$id;
            $this->query($sql);
            return true;
        } else {
            return false;
        }
    }
    
    public function editUser($id) {
        $sql = 'update user set password="' .$this->password. '", level=' .$this->level. ' where userid='.$id;
        $this->query($sql);
    }
    
    public function totalUser() {
        $sql = 'select count(userid) as total_user from user';
        $this->query($sql);
        $data = $this->fetch();
        return $data["total_user"];
    }
}

?>