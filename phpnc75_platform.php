<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

/** Giải thuật xây dựng đường dẫn tương tối động (Dynamic Relative Path) **/
$backFolder = '';
while (!file_exists($backFolder.'phpnc75_platform.php')) {
    $backFolder .= '../';
}

define('BASEPATH', $backFolder);
define('CLASS_DIR', BASEPATH.'class/');
define('DATA_DIR', BASEPATH.'data/');
define('LIBS_DIR', BASEPATH.'libs/');
define('SCRIPTS_DIR', BASEPATH.'scripts/');
define('TEMPLATES_DIR', BASEPATH.'templates/');

/** Khởi động session **/
session_start();

/** Gọi các file cần thiết **/
require(BASEPATH.'config.php');
require(CLASS_DIR.'autoload.php');

/** hàm gọi các file trong thư viện **/
function loadLibs($arrayLibsFile) {
    foreach ($arrayLibsFile as $libsFile) {
        require(LIBS_DIR.$libsFile);
    }
}

/** Loda cấu hình site từ Database **/
$setting = new Setting();
$siteSetting = $setting->loadSetting('SiteSetting');
date_default_timezone_set($siteSetting["local_timezone"]); // Không thay đổi
define("SITENAME", $siteSetting["sitename"]);

?>