<!DOCTYPE html>
<html lang="en">

<head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="https://portal.timelapsesystems.at/favicon.ico" type="image/x-icon">
    <title>timelapsesystems - Foto-Übersicht</title>
</head>

<body>
    <div id="container">
        <?php
        require 'sidebar.html';
        ?>
        <div id="tables">
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

            $image_map = getImageMapOfDate($sanitized_date);
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

            echo "    <span class=\"box_shadow\"><a style=\"display: flex; flex-direction: row; align-items: center; font-weight: 500; text-decoration: none; color: #58666e;\" href=\"fotos.php?datum=" . $sanitized_date . "\"><svg style=\"width: 1rem; height: 1rem; margin-right: 10px;\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z\" /></svg>Foto-Übersicht</a></span>";
            echo "    <div class=\"box_shadow\"><h3 style=\"margin: 0; text-align: center; margin-bottom: 1rem; font-weight: 500;\">$sanitized_date / $hour:$min</h3>\n";

            echo "    <div class=\"center\">\n";
            echo "      <img src=\"" . $sanitized_date . "/" . $image . "\">\n";
            echo "    </div>\n";

            if ($prev_image) {
                echo "    <div class=\"center\">\n";
                echo "      <svg style=\"width: 1rem; height: 1rem; margin-right: 10px;\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z\" /></svg>";
                echo "      <a class=\"back\" style=\"margin-right: 0.5rem;\" href=\"foto.php?hour=" . $hour . "&datum=" . $sanitized_date . "&pos=" . $pos + 1 . "\">" . "Vorheriges Foto" . "</a>\n";
            } else {
                echo "    <div class=\"center\">\n";
                echo "      <a class=\"back\" style=\"margin-right: 0.5rem;\">" . "Vorheriges Foto" . "</a>\n";
            }
            if ($next_image) {
                echo "      <a class=\"back\" style=\"margin-left: 1rem;\" href=\"foto.php?hour=" . $hour . "&datum=" . $sanitized_date . "&pos=" . $pos - 1 . "\">" . "Nächstes Foto" . "</a><br>\n";
                echo "      <svg style=\"width: 1rem; height: 1rem; margin-left: 10px;\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z\"/></svg>";
                echo "    </div>\n";
            } else {
                echo "      <a class=\"back\" style=\"margin-left: 1rem;\">" . "Nächstes Foto" . "</a>\n";
                echo "    </div>\n";
            }
            ?>
        </div>
    </div>
</body>

</html>