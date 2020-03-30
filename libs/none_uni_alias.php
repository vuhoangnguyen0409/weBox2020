<?php

/**
 * @author Jackie Do
 * @copyright 2013
 */

function noneUniAlias($str=null, $createAlias=false) {
    if (!is_string($str)) {
        settype($str, 'string');
    }
    if (empty($str)) {
        return false;
    }
    $letters = array(
    	'a' => array('á','à','ả','ã','ạ','ă','ắ','ằ','ẳ','ẵ','ặ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A' => array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ằ','Ẳ','Ẵ','Ặ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd' => array('đ'),
        'D' => array('Đ'),
        'e' => array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E' => array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i' => array('í','ì','ỉ','ĩ','ị'),
        'I' => array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o' => array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        '0' => array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u' => array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U' => array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y' => array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y' => array('Ý','Ỳ','Ỷ','Ỹ','Ỵ')
    );
    foreach ($letters as $nonUni => $uni) {
        foreach ($uni as $item) {
    	   $str = str_replace($item, $nonUni, $str);
    	}
    }
    if ($createAlias) {
        $str = htmlspecialchars_decode($str, ENT_QUOTES);
        $str = preg_replace('/([^\w\s]|[-])/', '', $str);
        $str = preg_replace('/\s+/', '-', $str);
        $str = strtolower($str);
    }
    return $str;
}

?>