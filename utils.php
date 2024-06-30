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
