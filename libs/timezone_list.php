<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

function timezoneList() {
    // List of all regions in the world
    $regions = array(
        'Africa' => DateTimeZone::AFRICA,
        'America' => DateTimeZone::AMERICA,
        'Antarctica' => DateTimeZone::ANTARCTICA,
        'Arctic' => DateTimeZone::ARCTIC,
        'Asia' => DateTimeZone::ASIA,
        'Atlantic' => DateTimeZone::ATLANTIC,
        'Australia' => DateTimeZone::AUSTRALIA,
        'Europe' => DateTimeZone::EUROPE,
        'Indian' => DateTimeZone::INDIAN,
        'Pacific' => DateTimeZone::PACIFIC
    ); 
    
    $timezones = array(); // Use for list off timezones
    foreach ($regions as $name => $mask) {
        $zones = DateTimeZone::listIdentifiers($mask);
        foreach ($zones as $timezone) {
        	// Lets sample the time there right now
        	$time = new DateTime(NULL, new DateTimeZone($timezone));
        
        	// Add timezone into $timezone array
        	$timezones[$name][$timezone] = 'GMT' .$time->format('P'). ' - ' .substr($timezone, strlen($name) + 1);
        }
    }
    return $timezones;    
}

// How to use function
/*
$timezoneList = timezoneList();
echo '<label>Select Your Timezone</label>
<select id="timezone">';
foreach ($timezoneList as $continents => $timezones) {
    echo '<optgroup label="' .$continents. '">';
    foreach ($timezones as $key => $item) {
        echo '<option value="' .$key. '">' .$item. '</option>';
    }
    echo '</optgroup>';
}
echo '</select>';
*/
?>