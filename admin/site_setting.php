<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "timezone_list.php"));

// lấy cấu hình site đổ vào form
$setting1 = new Setting();
$settingValue = $setting1->loadSetting('SiteSetting');
// lấy tất cả múi giờ khu vực
$timezoneList = timezoneList();

// Sau khi submit form
if (isset($_POST["btnUpdate"])) {
    if (empty($_POST["sitename"])) {
        ErrorHandler::setError('Vui lòng nhập tên site');
    } else {
        $setting_value = array(
            "sitename" => $_POST["sitename"],
            "local_timezone" => $_POST["local_timezone"]
        );
        $setting->updateSetting('SiteSetting', $setting_value);
        header("location: index.php");
        exit();
    }
}

$admin_function = 'Cấu Hình Site';
$custon_menu = array(
    'upload_setting.php' => 'Cấu hình uplolad',
    'user_setting.php' => 'Cấu hình user'
);
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Thông Tin Danh Mục</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '" method="post">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label>Tên site:</label>
                <div class="input-item">
                    <input type="text" name="sitename"';
                    if (isset($_POST["sitename"])) {
                        // set sitename mới
                        echo ' value="' .htmlspecialchars($_POST["sitename"]). '"';
                    } else {
                        // load sitename hiện tại
                        echo ' value="' .htmlspecialchars($settingValue["sitename"]). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label>Múi giờ khu vực:</label>
                <div class="input-item">
                    <select name="local_timezone">';
                    foreach ($timezoneList as $continents => $timezones) {
                        echo '<optgroup label="' .$continents. '">';
                        foreach ($timezones as $key => $item) {
                            echo '<option value="' .$key. '"';
                            if (isset($_POST["local_timezone"])) {
                                if ($_POST["local_timezone"] == $key) {
                                    echo ' selected="selected"';
                                }
                            } else {
                                if ($settingValue["local_timezone"] == $key) {
                                    echo ' selected="selected"';
                                }
                            }
                            echo '>' .$item. '</option>';
                        }
                        echo '</optgroup>';
                    }
                    echo '
                    </select>
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnUpdate" value="Cập nhật cấu hình" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>
