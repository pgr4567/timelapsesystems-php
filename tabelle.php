<?php
echo "
    <table border>
      <tr>
        <th width=14%>Montag</th>
        <th width=14%>Dienstag</th>
        <th width=14%>Mittwoch</th>
        <th width=14%>Donnerstag</th>
        <th width=14%>Freitag</th>
        <th width=14%>Samstag</th>
        <th width=14%>Sonntag</th>
      </tr>\n";
if (substr($start_woche, 0, 1) == 0) {
    $start_woche = substr($start_woche, 1, 2);
}
if (substr($ende_woche, 0, 1) == 0) {
    $ende_woche = substr($ende_woche, 1, 2);
}
for ($w = $start_woche; $w <= $ende_woche; $w++) {
    echo "      <tr>\n";
    for ($t = 1; $t <= 7; $t++) {
        if (array_key_exists($t, $tag[$w])) {
            $str_monat = strtotime($tag[$w][$t]);
            echo "        <td>";
            if (date("n", $str_monat) == $start_monat) {
                $tag_tag[$w][$t] = substr($tag[$w][$t], 6, 8);
                echo "<a href=\"fotos.php?datum=" . $tag[$w][$t] . "\">" . $tag_tag[$w][$t] . "</a>";
            } else {
                echo "&nbsp;";
            }
            echo "</td>\n";
        } else {
            echo "        <td>&nbsp;</td>\n";
        }
    }
    echo "      </tr>\n";
}
echo "    </table>\n";
