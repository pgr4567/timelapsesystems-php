<!DOCTYPE html>
<html lang="de">
  <head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
<?php
    $cwd_path = getcwd();
    $cwd_len = strlen ($cwd_path);
    # find first /
    # TODO: change back to /
    $cam_strt = strpos ($cwd_path, '\\', 1);
    # search for last /
    while ($cam_strt)
    {
      $cwd_mark = $cam_strt + 1;
      $pro_strt = $cwd_mark;
      # search for next /
      # TODO: change back to /
      $cam_strt = strpos ($cwd_path, '\\', $cwd_mark);
      # if one found then cut out the part before the / as project name
      if ($cam_strt)
      {
        # addon: remove the project number from the pro_nam
        $pro_strt = $pro_strt + 6;
        $pro_nam = substr ($cwd_path, $pro_strt, $cam_strt - $pro_strt);
      }
    }
    # cut out the part behind the / as camera name
    # addon: remove the string 'cam' from the name
    $cwd_mark = $cwd_mark + 3;
    $cam_nam = substr ($cwd_path, $cwd_mark, $cwd_len - $cwd_mark);

    echo "    <title>timelapsesystems - $pro_nam</title>\n";
    echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-15\">\n";
    echo "  </head>\n";
    echo "  <body>\n";
    echo "    <h1>Timelapse Systems - Archiv</h1>\n";
    echo "    <h3>Bildarchiv des Projektes $pro_nam - Kamera $cam_nam</h3>\n";
    echo "    <p>\n";
    $t=0;
    $dir_path = '.';
    $dir_array = scandir($dir_path, SCANDIR_SORT_ASCENDING);
    $str_month = array( "test", "J&auml;nner", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");  
    $bool_month = array(false, false, false, false, false, false, false, false, false, false, false, false, false);
    for($j=29;$j>18;$j--)
    {
      foreach ($dir_array as $dir_entry)
      {			
        if (substr ($dir_entry, 0, 2) == $j)
        {
          for($m=1; $m <= 12; $m++)
          {
            if (substr($dir_entry, 3, -3)== $m)
            {
                $month[$m][$t] =$dir_entry;
                $t++;
                $bool_month[$m]=true;
            }     
          }
        }
      }
      for($mo=12;$mo>0;$mo--)
      {
        if ($bool_month[$mo]== true)
        {
          $erste_woche=true;
          foreach ($month[$mo] as $current_day)
          {
            include("kalender.php");
          }
          $ende_woche=$woche;
          echo "    <h4>".$str_month[$mo]." ".$jahr."</h4>";
          include("tabelle.php");
        }
      }
      for($m=1;$m<=12;$m++)
      {
        $bool_month[$m]=false;
      }
    } 
    unset ($dir_entry);
?>
  </body>
</html>
