{
<? foreach($gpio_values as $pin => $value):?>
  "gpio_value_<?=$pin?>":"<?=$value?>",
<? endforeach?>
  "1M_load":"<?=$load_average[0]?>",
  "5M_load":"<?=$load_average[1]?>",
  "15M_load":"<?=$load_average[2]?>",
  "cpu_temp":"<?=$temperature?>",
  "cpu_speed":"<?=$speed?>",
  "cpu_volt":"<?=$voltage?>",
  "cpu_perc":"<?=$cpu_perc?>",
  "disk_usage":"<?=$disk_perc?>",
  "mem_avail":"<?=$mem_avail?>"
}
