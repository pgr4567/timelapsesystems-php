<!DOCTYPE html>
<html lang="en">

<head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <?php
    require_once 'utils.php';

    $pos = filter_input(INPUT_GET, 'pos', FILTER_SANITIZE_NUMBER_INT);
    $hour = filter_input(INPUT_GET, 'hour', FILTER_SANITIZE_NUMBER_INT);
    $UNSAFE_date = $_GET['datum'] ?? null;
    $sanitized_date = getSafeDateFolder($UNSAFE_date);

    if ($sanitized_date === false || $pos === null || $hour === null) {
        echo "    <h3>Ungültige GET Parameter</h3>\n";
        return;
    }

    $image_paths = scandir($sanitized_date, SCANDIR_SORT_DESCENDING);
    $image_map = array();
    foreach ($image_paths as $image_path) {
        if (substr($image_path, 0, 1) == '.') {
            continue;
        }
        $current_hour = substr($image_path, 6, 2);
        $image_map[$current_hour][] = $image_path;
    }

    if (key_exists($pos, $image_map[$hour])) {
        $image = $image_map[$hour][$pos];
        $min = substr($image, 9, 2);
    } else {
        echo "    <h3>Ungültige GET Parameter</h3>\n";
        return;
    }
    $prev_image = false;
    $next_image = false;
    if (key_exists($pos - 1, $image_map[$hour])) {
        $next_image = true;
    }
    if (key_exists($pos + 1, $image_map[$hour])) {
        $prev_image = true;
    }

    echo "    <a class=\"back\" href=\"fotos.php?datum=" . $sanitized_date . "\">" . "Bilder Übersicht" . "</a><br>\n";
    echo "    <h3>$sanitized_date / $hour:$min</h3>\n";

    echo "    <div class=\"center\">\n";
    echo "      <img src=\"" . $sanitized_date . "/" . $image . "\">\n";
    echo "    </div>\n";

    if ($prev_image) {
        echo "    <div class=\"center\">\n";
        echo "      <a class=\"back\" href=\"foto.php?hour=" . $hour . "&datum=" . $sanitized_date . "&pos=" . $pos + 1 . "\">" . "Vorheriges Bild" . "</a>\n";
    } else {
        echo "    <div class=\"center\">\n";
        echo "      <a class=\"back\">" . "Vorheriges Bild" . "</a>\n";
    }
    if ($next_image) {
        echo "      <a class=\"back\" href=\"foto.php?hour=" . $hour . "&datum=" . $sanitized_date . "&pos=" . $pos - 1 . "\">" . "Nächstes Bild" . "</a><br>\n";
        echo "    </div>\n";
    } else {
        echo "      <a class=\"back\">" . "Nächstes Bild" . "</a>\n";
        echo "    </div>\n";
    }
    ?>
</body>

</html>