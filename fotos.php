<!DOCTYPE html>
<html lang="en">

<head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <span class="back">
        <a href="index.php">Kalender Übersicht</a>
    </span>
    <?php
    require_once 'utils.php';
    $dir_path = '../';
    $UNSAFE_date = $_GET['datum'] ?? null;
    $sanitized_date = getSafeDateFolder($UNSAFE_date);

    if ($sanitized_date === false) {
        echo "    <h3>Ungültiges Datum</h3>\n";
        return;
    }

    echo "    <h3>" . $sanitized_date . "</h3>\n";

    $image_paths = scandir($sanitized_date, SCANDIR_SORT_DESCENDING);
    $image_map = array();
    foreach ($image_paths as $image_path) {
        if (substr($image_path, 0, 1) == '.') {
            continue;
        }
        $hour = substr($image_path, 6, 2);
        $image_map[$hour][] = $image_path;
    }
    foreach ($image_map as $hour => $images) {
        echo "    <details>\n";
        echo "      <summary>Stunde&nbsp;" . $hour . "</summary>\n";
        foreach ($images as $index => $image) {
            echo "        <a class=\"details\" href=\"foto.php?datum=" . $sanitized_date . "&hour=" . $hour . "&pos=" . $index . "\">" . $image . "</a><br>\n";
        }
        echo "    </details>\n";
    }
    ?>
</body>

</html>