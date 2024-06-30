<!DOCTYPE html>
<html lang="en">
  <head>
<?php
  $cwd_path = getcwd();
  $cwd_len = strlen ($cwd_path);
  # find first /
  $cam_strt = strpos ($cwd_path, '/', 1);
  # search for last /
  while ($cam_strt)
  {
    $cwd_mark = $cam_strt + 1;
    $pro_strt = $cwd_mark;
    # search for next /
    $cam_strt = strpos ($cwd_path, '/', $cwd_mark);
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
  echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
  echo "    <!-- written for timelapsesystems.at in 2020/21 -->\n";
  echo "    <!-- (c)opyright by bahamasoft 2020 -->\n";
  echo "  </head>\n";
  echo "  <body>\n";
  echo "    <h1>Timelapse Systems - Archiv</h1>\n";
  echo "    <h3>Bildarchiv des Projektes $pro_nam - Kamera $cam_nam</h3>\n";
  echo "    <p>\n";
  $dir_path = '.';
  $dir_array = scandir($dir_path, SCANDIR_SORT_DESCENDING);
  foreach ($dir_array as $dir_entry)
  {
    if (substr ($dir_entry, 0, 1)=='2')
    {
      echo $dir_entry."<br>\n";
      echo "<ul>\n";
      $sub_array = scandir ($dir_entry, SCANDIR_SORT_DESCENDING);
      foreach ($sub_array as $sub_entry)
      {
        if (substr ($sub_entry, 0, 1)!='.')
        {
          echo "<a href=\"".$dir_entry."/".$sub_entry."\">".$sub_entry."</a><br>\n";
        }
      }
      echo "</ul>\n";
    }
  }
  unset ($dir_entry);
?>
  </body>
</html>
