<?php
// Takes an unsafe date string and returns a safe date string if it exists as a folder, otherwise false
function getSafeDateFolder($input_date)
{
    // Regex to match correct date string yy-mm-dd
    if (preg_match('/^\d{2}-\d{2}-\d{2}$/', $input_date)) {
        $sanitized_date = basename($input_date);

        // Check if folder exists
        $folderPath = __DIR__ . DIRECTORY_SEPARATOR . $sanitized_date;
        if (is_dir($folderPath)) {
            // Check if date is valid
            if (strtotime($sanitized_date) === false) {
                return false;
            } else {
                return $sanitized_date;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Returns an associative array with the hour as key and an array of image paths as value
function getImageMapOfDate($sanitized_date)
{
    $image_paths = scandir($sanitized_date, SCANDIR_SORT_DESCENDING);
    $image_map = array();
    foreach ($image_paths as $image_path) {
        // Invisible files
        if (substr($image_path, 0, 1) == '.') {
            continue;
        }
        $hour = substr($image_path, 6, 2);
        $image_map[$hour][] = $image_path;
    }
    return $image_map;
}

// Used in tabelle.php to print a table row for one week
function printWeek($tag, int $w, $mo)
{
    $array_index = str_pad($w, 2, "0", STR_PAD_LEFT);
    if (array_key_exists($array_index, $tag) == false) {
        echo "      <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>\n";
        return;
    }
    echo "      <tr>\n";
    for ($t = 1; $t <= 7; $t++) {
        // Check if date has an entry --> an image exists
        if (array_key_exists($t, $tag[$array_index])) {
            $str_monat = strtotime($tag[$array_index][$t]);
            echo "        <td>";
            // Weeks may be in two months, only add to table if day is in current month
            if (date("n", $str_monat) == $mo) {
                $day = substr($tag[$array_index][$t], 6, 2);
                echo "<a class=\"table_link\" href=\"fotos.php?datum=" . $tag[$array_index][$t] . "\">" . $day . "</a>";
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
