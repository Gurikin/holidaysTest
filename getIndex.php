<?php
/**
 * @param $holidays
 * @param $value
 * @return int
 * Функция для бинарного поиска ближайшего к искомому числа.
 */
function getIndex($holidays, $value) {
    $center = (int)(count($holidays) / 2);
    $start = 0;
    $end = count($holidays) - 1;
    while (true) {
        if ($value == $holidays[$center]) return $center;
        if ($value == $holidays[$start]) return $start;
        if ($value == $holidays[$end]) return $end;

        if ($value < $holidays[$center]) {
            if ($value < $holidays[$start]) {
                return $start;
            } else {
                $end = $center - 1;
                if ($value > $holidays[$end]) {
                    return $center;
                }
                $center = (int)(($end + $start) / 2);
            }
        } else {
            if ($value > $holidays[$end]) {
                return $end + 1;
            } else {
                $start = $center + 1;
                if ($value < $holidays[$start]) {
                    return $start;
                }
                $center = (int)(($end + $start) / 2);
            }
        }
    }
}