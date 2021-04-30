<?php
session_start();
require "autoload.php";
require "core/phpqrcode/qrlib.php";
require "core/helpers.php";
// date_default_timezone_set("UTC");

$path = getcwd();
$path = preg_replace('/^.+\\\\htdocs\\\\/', '/', $path);
$path = str_replace('\\', '/', $path);
define("BASE", $path);

?>