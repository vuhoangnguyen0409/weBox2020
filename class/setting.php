<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

class Setting extends Database {
    protected $settingName;
    protected $settingValue;

    public function loadSetting($settingName) {
        //$sql = 'select * from setting where setting_name="' .$settingName. '"';
        $sql = 'select * from setting where settingid=1';
        $this->query($sql);
        $data = $this->fetch();
        //var_dump($data);
        return json_decode($data["setting_value"], true);
    }

    public function updateSetting($settingName, $settingValue) {
        $settingValue = json_encode($settingValue, JSON_UNESCAPED_UNICODE);
        //$sql = 'update setting set setting_value="' .addslashes($settingValue). '" where setting_name="' .$settingName. '"';
        $sql = 'update setting set setting_value="' .addslashes($settingValue). '" where settingid=1';
        $this->query($sql);
    }
}

?>
