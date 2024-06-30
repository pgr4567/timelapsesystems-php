<?php
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

function getImageMapOfDate($sanitized_date)
{
    $image_paths = scandir($sanitized_date, SCANDIR_SORT_DESCENDING);
    $image_map = array();
    foreach ($image_paths as $image_path) {
        if (substr($image_path, 0, 1) == '.') {
            continue;
        }
        $hour = substr($image_path, 6, 2);
        $image_map[$hour][] = $image_path;
    }
    return $image_map;
}
