<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jackie Do" />
    <link rel="stylesheet" href="templates/css/default.css" />
    <?php
    if (isset($custom_js_file)) {
        foreach ($custom_js_file as $js_file) {
            echo '
            <script type="text/javascript" src="' .$js_file. '"></script>';
        }
    }
    ?>
    
    <script type="text/javascript">
        function xacnhan(msg) {
            if (!window.confirm(msg)) {
                return false;
            }
            return true;
        }
    </script>
	
	<title>Admin Panel</title>
</head>

<body>

    <div id="layout">
        <div id="top">
            Admin Panel
            <?php
                if (isset($admin_function)) {
                    echo ' :: '.$admin_function;
                }
            ?>
        </div>
        <div id="menu">
            <table style="width: 100%;">
                <tr>
                    <td>
                        <a href="index.php">Trang Chính</a>
                        <?php
                            if (isset($custon_menu)) {
                                foreach ($custon_menu as $menu_href => $menu_name) {
                                    echo ' | <a href="' .$menu_href. '">' .$menu_name. '</a>';
                                }
                            }
                        ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        echo 'Xin chào <a href="user_edit.php?id=' .$_SESSION[$prefix."userid"]. '">'.$_SESSION[$prefix."username"].'</a> | <a href="logout.php">Logout</a>';
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div id="main">