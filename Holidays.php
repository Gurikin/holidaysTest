<?php
require_once ('calendarToArray.php');
require_once ('getIndex.php');
require_once ('holidays_count.php');

$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];

printf("В запрашиваемом вами периоде количество выходных и праздничных дней = <b>%s</b> .", holidays_count($startDate, $endDate, calendarToArray("holidaysList.csv")));