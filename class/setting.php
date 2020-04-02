<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class Setting extends Database {
    protected $settingName;
    protected $settingValue;

    public function loadSetting($settingName) {
        $sql = 'select * from setting where setting_name="' .$settingName. '"';
        $this->query($sql);
        $data = $this->fetch();
        return json_decode($data["setting_value"], true);
    }

    public function updateSetting($settingName, $settingValue) {
        $settingValue = json_encode($settingValue, JSON_UNESCAPED_UNICODE);
        $sql = 'update setting set setting_value="' .addslashes($settingValue). '" where setting_name="' .$settingName. '"';
        $this->query($sql);
    }
}

?>
