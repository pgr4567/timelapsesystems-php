<?php
require_once 'utils.php';
echo "
    <table border class=\"calendar-table\">
      <tr>
        <th>Montag</th>
        <th>Dienstag</th>
        <th>Mittwoch</th>
        <th>Donnerstag</th>
        <th>Freitag</th>
        <th>Samstag</th>
        <th>Sonntag</th>
      </tr>\n";

// Handle 53th week of last year separately
if ($start_woche == 53) {
    printWeek($tag, $start_woche, $mo);
    $start_woche = 1;
}

// Loop over all weeks in current month and print them
for ($w = $start_woche; $w <= $ende_woche; $w++) {
    printWeek($tag, $w, $mo);
}
echo "    </table>\n";
