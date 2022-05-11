<?php

$max_execution_time = 30;

$max_input_time = 60;

$max_input_nesting_level = 64;

$max_input_vars = 1000;

$memory_limit = 128 ;

error_reporting(E_ALL);
$display_errors = "On";

$display_errorsdisplay_errors = True;

$display_errorsdisplay_errorsdisplay_startup_errors = True;

$log_errors = "On";

$log_errors_max_length = 0;

$ignore_repeated_errors = "Off";

$ignore_repeated_source = "Off";

$report_memleaks = "On";

$track_errors = "Off";

#$error_log = 
syslog(int $priority,string $message);

$syslog.ident = "php";

$syslog.facility = "user";

$syslog.filter = "ascii";

?>
