<?php
// API sometimes reports 403, so we need to prepare for that
 error_reporting(E_ALL ^ E_WARNING);
 $url="http://172.0.200.108/aircon/get_sensor_info";
 $data = file_get_contents($url) or exit("API not responding\n");

// exploding data into array
 $result = explode(",",$data);

// parsing array into separate variables
 foreach($result as $line)
 {
  $values = explode('=',$line);
  ${$values[0]} = trim($values[1]);
 }

// sending data to syslog
 openlog("Daikin_0", LOG_PID | LOG_PERROR, LOG_LOCAL0);
 syslog(LOG_INFO, "daikin_inside_temp ".$htemp);
 syslog(LOG_INFO, "daikin_outside_temp ".$otemp);
 syslog(LOG_INFO, "daikin_power ".$mompow);
 closelog();
?>
