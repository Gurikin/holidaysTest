<?php
/**
 * Get the array of holidays in Russia from 1999 to 2025
 * File with list of holidays I have get from https://data.gov.ru/opendata/7708660670-proizvcalendar
 */
function calendarToArray($source) {
    $holidayArray = array(); //result of function
    $str = file_get_contents($source);
    $str = preg_replace('|\+|', '', $str); //Удаляем символ '+' для корректной работы регулярных выражений
    $str = preg_replace('|,?\d+\*|', '', $str); //Удаляем сокращенные дни
    $pregTempYear = '|(\d+),(\".*\")|x';
    preg_match_all($pregTempYear, $str, $matchesYear);
    $pregTempMonth = '|\"([\d*,]*)\"|xs';
    for ($i = 0; $i < count($matchesYear[1]); $i++) {
        preg_match_all($pregTempMonth, $matchesYear[2][$i], $matchesMonth);
        foreach ($matchesMonth[1] as $k => $v) {
            foreach (explode(',', $v) as $item) {
                $holidayArray[] = $matchesYear[1][$i] . '-' . str_pad($k + 1, 2, '0', STR_PAD_LEFT) . '-' . str_pad($item, 2, '0', STR_PAD_LEFT);
            }
        }
    }
    return $holidayArray;
}