<!DOCTYPE html>
<html lang="en">
  <head>
   <link rel="stylesheet" href="../../cam000/css/styles.css">
  </head>
  <body>
<?php
  $foto = $_GET['foto'];
  $pos = $_GET['pos'];
  $datum = $_GET['datum'];
  $dir_path = '../';
  
  echo "    <a class=\"back\" href=\"fotos.php?datum=".$datum."\">"."Bilder &Uuml;bersicht"."</a><br>\n";
  $std = substr($foto,6,-13);
  $min = substr($foto,9,-10);
  echo "    <h3>$datum / $std:$min</h3>\n";
  $datum = "$datum";
  $sub_array = scandir ($datum, SCANDIR_SORT_DESCENDING);
  $foto_pos=0;
  $i=0;
  $anzahl_pos=-2;
  foreach ($sub_array as $sub_entry)
  {
    if (substr ($sub_entry, 0, 1)!='.')
    {
      $i++;
      if($pos==$i)
      {
        $foto = current($sub_array);
        if($pos!=1)
        {
          $next_foto = prev($sub_array);
          $next_pos = $pos - 1;
          next($sub_array);
        }
        $prev_foto = next($sub_array);
        $prev_pos = $pos + 1;
        echo "    <div class=\"center\">\n";
        echo "      <img src=\"".$datum."/".$foto."\">\n";
        echo "    </div>\n";
      }
      next($sub_array);
    }
    $anzahl_pos++;
  }

  if($pos != $anzahl_pos)
  {
    echo "    <div class=\"center\">\n";
    echo "      <a class=\"back\" href=\"foto.php?foto=".$prev_foto."&datum=".$datum."&pos=".$prev_pos."\">"."Vorheriges Bild"."</a>\n";
  }
  else
  {
    echo "    <div class=\"center\">\n";
    echo "      <a class=\"back\">"."Vorheriges Bild"."</a>\n";
  }
  if($pos != 1)
  {
    echo "      <a class=\"back\" href=\"foto.php?foto=".$next_foto."&datum=".$datum."&pos=".$next_pos."\">"."N&auml;chstes Bild"."</a><br>\n";
    echo "    </div>\n";
  }
  else
  {
    echo "      <a class=\"back\">"."N&auml;chstes Bild"."</a>\n";
    echo "    </div>\n";
  }
?>
  </body>
</html>
