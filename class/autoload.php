<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

// Trước hết xây dựng một autoloader, đặt tên tùy ý
function autoloadClass($className) {
    $className = strtolower($className);
    if (file_exists('../class/' .$className. '.php')) {
        require_once('../class/' .$className. '.php');
    } else {
        require_once('class/' .$className. '.php');
    }
}

// Bây giờ ta kiểm tra xem phiên bản PHP có lớn hơn 5.1.2 không?
if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    // Nếu có, dùng hàm spl_autoload_register
    // Ta phải kiểm tra tiếp phiên bản PHP có lớn hơn 5.3.0 không?
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('autoloadClass', true, true);
    } else {
        spl_autoload_register('autoloadClass');
    }
} else {
    // Nếu phiên bản PHP của ta nhỏ hơn 5.1.2
    // Ta dùng autoloader kiểu cổ điển bằng hàm __autoload()
    function __autoload($className) {
        autoloadClass($className);
    }
}

?>