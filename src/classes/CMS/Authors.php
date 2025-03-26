<?php
namespace MySite\CMS;                                   // Declare namespace
use \PDO;
class Database extends PDO
{

    public function getEndStartPeriod() {
$now = time();
$m = 'm';
$y = 'Y';
$d = 'd';
$month = date($m, $now);
$year = date($y, $now);
$day = date($d, $now);
if ($month == '01' & $day < '03') {
    $pMonth = 12;
    $pDay = $startDay;
    $pYear = $year - 1;
} else {
    $pMonth = $month;
    $pYear = $year;
    $pDay = '03';
}

$periodStart = $pMonth.'/'.$pDay.'/'.$pYear;
$periodStartUnix = strtotime($periodStart);

if ($month == '12' && $day > '03') {
    $ePMonth = '01';
    $ePYear = $year + 1;
    $ePDay = $startDAy;
} else {
    $ePMonth = $month+1;
    $ePYear = $year;
    $ePDay = $startDay;
}
$periodEnd = $ePMonth.'/'.$ePDay.'/'.$ePYear;
$periodEndUnix = strtotime($periodEnd);

$arr[0] = $periodStart;
$arr[1] = $periodEnd;
$arr[2] = $periodStartUnix;
$arr[3] = $periodEndUnix;

return $arr;
}



}