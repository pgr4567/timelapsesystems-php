<?php
  $time_mon = strtotime($mon);
  $wochentag =  date("l", $time_mon);
  $woche =  date("W", $time_mon);
  $jahr =  date("Y", $time_mon);
  if($erste_woche ==true)
  {
    $start_monat =  date("n", $time_mon);
    $start_woche =  date("W", $time_mon); 
    if(($start_monat == 1) and ($start_woche == 52))
    {
      $start_woche=0;
    }
    $erste_woche=false;
  }
  $num_wochentag =  date("w", $time_mon);
  if($num_wochentag == 0)
  {
    $num_wochentag=7;
  }
  for($w=1;$w<=53;$w++)
  {
    foreach($wochentage as $W)
    {
      if($woche == $w)
      {
        if($W == $wochentag)
        {
          //$substr_mon=substr ($mon, 6, 8); 
          $tag[$w][$num_wochentag]=$mon;
          //  echo $tag[$w][$num_wochentag];
        }
      }
    }
  }
?>