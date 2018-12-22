<?php
/**
 * @param $datestart
 * @param $dateend
 * @param array $holidays
 * @return int|string
 * Функция-обертка. Возвращает количество выходных дней в запрашиваемом диапозоне или сообщение об ошибке.
 */
function holidays_count($datestart, $dateend, $holidays = array()) {
    if ($datestart < $holidays[0] || $dateend > $holidays[(count($holidays) - 1)]) {
        return "Извините, имеются данные только за период с {$holidays[0]} до {$holidays[(count($holidays)-1)]}.";
    }
    if ($datestart > $dateend) {
        die ("Извините, но начало периода должно быть задано более ранней датой, чем его окончание.");
    }
    $start = getIndex($holidays, $datestart);
    $end = getIndex($holidays, $dateend);
    // Поправка для конечного элемента. При попадании конечной границы на выходной увеличиваем индекс на 1
    $end += in_array($dateend, $holidays) ? 1 : 0;
    $cnt = $end-$start;
    return ($cnt);
}