<?php
function convertDateTime($datetime){
$date = new DateTime(null, new DateTimezone("UTC"));
$tz = new DateTimeZone(date_default_timezone_get());
$date->setTimeZone($tz);
return $date->format('Y-m-d H:i:sP e');
}