<?php

/**
 * @author Jackie Do
 * @copyright 2013
 */

echo '<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Jackie Do" />
    <base href="' .$siteURL. '" />
    <link rel="stylesheet" href="templates/css/default.css" />
    <script type="text/javascript" src="scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="scripts/myscripts.js"></script>

    <title>' .SITENAME. '</title>
</head>

<body>

    <div id="layout">
        <div id="top">
            Banner
        </div><!-- End Top -->
        <div id="topmenu">
            <ul>
                <li><a href="index.html">Trang Chủ</a></li>
                <li><a href="#">Giới Thiệu</a></li>
                <li><a href="#">Tin Tức</a>
                    <ul>';
                    //Kết nối CSDL
                    require("libs/connect_db.php");

                    // Lấy tất cả các danh mục tin tạo thành các liên kết
                    $sql = 'SELECT * FROM category ORDER BY cate_name ASC';
                    $query = $mysqli->query($sql);;
                    $menu = array();
                    while ($data = $query -> fetch_assoc()) {
                        $menu[] = $data;
                    }
                    foreach ($menu as $item) {
                        echo '
                        <li><a href="tin-tuc/' .$item["cateid"]. '-' .noneUniAlias($item["cate_name"], true). '/index.html">' .$item["cate_name"]. '</a></li>';
                    }
                    echo'
                    </ul>
                </li>
                <li><a href="#">Dịch Vụ</a></li>
                <li><a href="#">Sản Phẩm</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </div>
        <div id="content" class="clear-fix">
            <div id="left">
                <div id="leftmenu">
                    <h1>
                        Menu Chính
                    </h1>
                    <ul>
                        <li><a href="index.html">Trang Chủ</a></li>
                        <li><a href="#">Giới Thiệu</a></li>
                        <li><a href="#">Tin Tức</a>
                            <ul>';
                            foreach ($menu as $item) {
                                echo '
                                <li><a href="tin-tuc/' .$item["cateid"]. '-' .noneUniAlias($item["cate_name"], true). '/index.html">' .$item["cate_name"]. '</a></li>';
                            }
                            echo '
                            </ul>
                        </li>
                        <li><a href="#">Dịch Vụ</a></li>
                        <li><a href="#">Sản Phẩm</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </div><!-- End leftmenu -->
                <div id="login" class="dang nhap">
                    <h1>
                        Đăng Nhập
                    </h1>
                    <div class="content">
                        <div id="login_msg">';
                        if (isset($_SESSION[$prefix."level"])) {
                            echo '
                            <div class="input-group">
                                <div class="login-info">
                                    <ul>
                                        <li>Xin chào <b>' .$_SESSION[$prefix."username"]. '</b></li>';
                                        if ($_SESSION[$prefix."level"] == 1) {
                                            echo '
                                            <li><a href="admin/index.php">Khu vực quản trị</a></li>';
                                        }
                                        echo '
                                    </ul>
                                </div>
                                <div>
                                    <input type="button" name="btnLogout" value="Đăng xuất" />
                                </div>
                            </div>';
                        }
                        echo '</div>
                        <form name="fLogin" id="fLogin" action="#" method="post"';
                        if (isset($_SESSION[$prefix."level"])) {
                            echo ' style="display: none;"';
                        }
                        echo '>
                            <div class="input-group">
                                <label class="username"></label>
                                <div class="input-item">
                                    <input type="text" name="txtUser" id="txtUser" placeholder="Tên đăng nhập" />
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="password"></label>
                                <div class="input-item">
                                    <input type="password" name="txtPass" id="txtPass" placeholder="Mật khẩu" />
                                </div>
                            </div>
                            <div>
                                <input type="submit" name="btnLogin" id="btnLogin" value="Đăng nhập" />
                            </div>
                        </form>
                    </div>
                </div>
                <div id="login" class="dangky">
                    <h1>
                        Đăng Ký
                    </h1>
                    <div class="content">
                        <div id="signin_msg">';

                        echo '</div>';
                        echo '<form name="fSignin" id="fSignin" action="#" method="post">
                            <div class="input-group">
                                <label class="username"></label>
                                <div class="input-item">
                                    <input type="text" name="signin_userName" id="signin_userName" placeholder="Tên đăng ký" />
                                </div>
                            </div>

                            <div class="input-group">
                                <label class="useremail"></label>
                                <div class="input-item">
                                    <input type="email" name="signin_userEmail" id="signin_userEmail" placeholder="Email đăng ký" required />
                                </div>
                            </div>

                            <div class="input-group">
                                <label class="usertel"></label>
                                <div class="input-item">
                                    <input type="tel" name="signin_userTel" id="signin_userTel" placeholder="SDT đăng ký" required />
                                </div>
                            </div>

                            <div class="input-group">
                                <label class="password"></label>
                                <div class="input-item">
                                    <input type="password" name="signin_userPass" id="signin_userPass" placeholder="Mật khẩu" />
                                </div>
                            </div>
                            <div>
                                <input type="submit" name="btnSignin" id="btnSignin" value="Đăng Ký" />
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- End Left -->
            <div id="main">';

?>
