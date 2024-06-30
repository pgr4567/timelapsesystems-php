<?php	
  $day_as_date  = strtotime($current_day);
  $iso_week     = date("W", $day_as_date);
  if($erste_woche == true)
  {
    $start_monat =  date("n", $day_as_date);
    $start_woche =  date("W", $day_as_date); 
    if(($start_monat == 1) and ($start_woche == 52))
    {
      $start_woche=0;
    }
    $erste_woche=false;
  }
  $num_wochentag =  date("w", $day_as_date);
  if($num_wochentag == 0)
  {
    $num_wochentag=7;
  }
  $tag[$iso_week][$num_wochentag]=$current_day;
?>
