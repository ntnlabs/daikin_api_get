<?php
 $url="http://172.0.200.108/aircon/get_sensor_info";
 $result = explode(",",file_get_contents($url));

 foreach($result as $line)
 {
  $values = explode('=',$line);
  ${$values[0]} = trim($values[1]);
 }
// add push to syslog
 openlog("Daikin_0", LOG_PID | LOG_PERROR, LOG_LOCAL0);
 syslog(LOG_INFO, "daikin_inside_temp".$htemp);
 syslog(LOG_INFO, "daikin_outside_temp".$otemp);
 syslog(LOG_INFO, "daikin_power".$mompow);
 closelog();
?>
