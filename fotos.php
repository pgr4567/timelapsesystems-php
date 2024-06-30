<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body>
    <span class="back">
      <a href="index.php">Kalender &Uuml;bersicht</a>
    </span>
<?php
    $dir_path = '../';
    $datum = $_GET['datum'];
    echo "    <h3>$datum</h3>\n";
  $datum =  "$datum";     
  $sub_array = scandir ($datum, SCANDIR_SORT_DESCENDING);
  $foto_pos=0;
  $one = 1;
  $no_std = array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
  foreach ($sub_array as $sub_entry)
  {
    if (substr ($sub_entry, 0, 1)!='.')
    {
      $existing_std=1;
      $start = substr($sub_entry, 6, -13);
      $start += 0;
      for($i=$start;$i>=0;$i--)
      {
        $std = substr($sub_entry, 6, -13);
        $std += 0;
        if($i == $std)
        {
          $existing_std=0;
          $no_std[$i]=0;
          break;
        }
        else
        {
          if($existing_std == 1)
          {
            $no_std[$i]=1;
          }
        }
      }
    }
  }
  $last = 0;
  for($i=23;$i>=0;$i--)
  {
    if($no_std[$i] == 0)
    {
      echo "    <details>\n";
      echo "      <summary>Stunde&nbsp;".$i."</summary>\n";
    }
    foreach ($sub_array as $sub_entry)
    {
      if (substr ($sub_entry, 0, 1)!='.')
      {
        if(substr ($sub_entry, 6, -13)==$i)
        {
          $foto_pos++;
          if($no_std[$i] == 0)
          {
            echo "        <a class=\"details\" href=\"foto.php?foto=".$sub_entry."&datum=".$datum."&pos=".$foto_pos."\">".$sub_entry."</a><br>\n";
          }
        }
      }
    }
    if($no_std[$i] == 0)
    {
      echo "    </details>\n";
    }
  }
?>
 </body>
</html>
