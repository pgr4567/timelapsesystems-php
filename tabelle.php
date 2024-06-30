<?php
require_once 'utils.php';
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

// Handle 53 week of last year separately
if ($start_woche == 53) {
    printWeek($tag, $start_woche, $mo);
    $start_woche = 1;
}

// Loop over all weeks in current month
for ($w = $start_woche; $w <= $ende_woche; $w++) {
    printWeek($tag, $w, $mo);
}
echo "    </table>\n";
