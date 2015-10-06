
<?

/*------------------------------------------------------------------------------
  BerryIO CPU Status Command
------------------------------------------------------------------------------*/

$title = 'CPU Status';

// Load the cpu functions
require_once(FUNCTIONS.'cpu.php');
require_once(FUNCTIONS.'disk.php');
require_once(FUNCTIONS.'memory.php');
require_once(FUNCTIONS.'gpio.php');

// Load the system settings
settings('system', 1);

// Get the cpu details
$page['temperature'] = cpu_get_temp();
$page['speed'] = cpu_get_speed();
$page['voltage'] = cpu_get_volts();
$page['load_average'] = sys_getloadavg();
$page['cpu_perc'] = cpu_get_percentage();
$page['disk_perc'] = disk_get_percentage();
$page['mem_avail'] = memory_get_free()/1024.0/1024.0;
$page['gpio_modes'] = gpio_get_modes();
$page['gpio_values'] = gpio_get_values();

// Display status page
$GLOBALS['JAVASCRIPT']['common'] = 'common';
$GLOBALS['JAVASCRIPT']['updateCPU'] = 'updateCPU';
$GLOBALS['JAVASCRIPT']['updateGPIO'] = 'updateGPIO';
require_once(FUNCTIONS.'graph.php');
$content .= view('pages/smartthings', $page);

// Check for missing information
if($page['temperature'] === FALSE || $page['speed'] === FALSE || $page['voltage'] === FALSE)
{
  $content .= message('WARNING: Unable retrieve all the CPU information');
  return FALSE;
}
