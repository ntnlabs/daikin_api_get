<?php
 $url="http://172.0.200.108/aircon/get_sensor_info";
 $result = explode(",",file_get_contents($url));
// print_r($result);

 foreach($result as $line)
 {
  $values = explode('=',$line);
  ${$values[0]} = trim($values[1]);
 }
// add push to syslog

// echo($htemp);
// echo("***");
// echo($otemp);
// echo("***");
?>
