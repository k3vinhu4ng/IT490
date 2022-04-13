#!/usr/bin/php
<?php

require_once('log3.inc');


error_reporting(E_ALL);
    ini_set('display_errors', 'on');
ini_set('log_errors', 'On');
ini_set('error_log','log.txt');

echo $error222;
logClient("3/14 3/14 sending error from testlog.php");
?>

