<?
/*------------------------------------------------------------------------------
  BerryIO Memory Functions
------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------
 Load the CPU settings
------------------------------------------------------------------------------*/
require_once(CONFIGS.'cpu.php');
/*----------------------------------------------------------------------------
  Returns the CPU temp in degrees C or FALSE on failure
----------------------------------------------------------------------------*/
function cpu_get_temp()
{
  exec('sudo /usr/bin/vcgencmd measure_temp', $output, $return_var);
  if($return_var) return FALSE;
  foreach($output as $line)
    if(substr($line, 0, 5) == 'temp=')
      return substr($line, 5, -2);
}
/*----------------------------------------------------------------------------
  Returns the CPU clock speed in Hz or FALSE on failure
----------------------------------------------------------------------------*/
function cpu_get_speed()
{
  exec('sudo /usr/bin/vcgencmd measure_clock arm', $output, $return_var);
  if($return_var) return FALSE;
  foreach($output as $line)
    if(substr($line, 0, 14) == 'frequency(45)=')
      return substr($line, 14);
}
/*----------------------------------------------------------------------------
 Returns the CPU voltage or FALSE on failure
----------------------------------------------------------------------------*/
function cpu_get_volts()
{
  exec('sudo /usr/bin/vcgencmd measure_volts', $output, $return_var);
  if($return_var) return FALSE;
  foreach($output as $line)
    if(substr($line, 0, 5) == 'volt=')
      return substr($line, 5, -1);
}
/*----------------------------------------------------------------------------                      
 Returns the CPU Percentage Used                                                                     
----------------------------------------------------------------------------*/                      
function cpu_get_percentage()                                                                       
{
  $stat1 = file('/proc/stat');                                                                
  sleep(1);                                                                                   
  $stat2 = file('/proc/stat');                                                                
  $info1 = explode(" ", preg_replace("!cpu +!", "", $stat1[0]));                              
  $info2 = explode(" ", preg_replace("!cpu +!", "", $stat2[0]));                              
  $dif = array();                                                                             
  $dif['user'] = $info2[0] - $info1[0];                                                       
  $dif['nice'] = $info2[1] - $info1[1];                                                       
  $dif['sys'] = $info2[2] - $info1[2];                                                        
  $dif['idle'] = $info2[3] - $info1[3];                                                       
  $total = array_sum($dif);                                                                   
  $cpu = array();                                                                             
  foreach($dif as $x=>$y) $cpu[$x] = round($y / $total * 100, 1);                             
  return $cpu['user'] + $cpu['nice'] + $cpu['sys'];                                           
}

function Disk_get_percent()
{

  /* get disk space free (in bytes) */
  $df = disk_free_space("/");

  /* and get disk space total (in bytes)  */
  $dt = disk_total_space("/");

  /* now we calculate the disk space used (in bytes) */
  $du = $dt - $df;

  /* percentage of disk used - this will be used to also set the width % of the progress bar */
  $dp = sprintf('%.2f',($du / $dt) * 100);
  return $dp
}
