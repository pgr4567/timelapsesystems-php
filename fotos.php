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
            <span class="box_shadow">
                <a style="display: flex; flex-direction: row; align-items: center; font-weight: 500; text-decoration: none; color: #58666e;" href="index.php">
                    <svg style="width: 1rem; height: 1rem; margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                    </svg>
                    Kalender-Übersicht</a>
            </span>
            <div class="box_shadow">
                <?php
                require_once 'utils.php';
                $UNSAFE_date = $_GET['datum'] ?? null;
                $sanitized_date = getSafeDateFolder($UNSAFE_date);

                if ($sanitized_date === false) {
                    echo "    <h3>Ungültiges Datum</h3>\n";
                    return;
                }

                echo "    <h3 style=\"margin: 0; font-weight: 500;\">Fotos vom " . $sanitized_date . "</h3></div>\n";

                $image_map = getImageMapOfDate($sanitized_date);
                foreach ($image_map as $hour => $images) {
                    echo "    <div class=\"box_shadow\">\n";
                    echo "      <p style=\"margin: 0; text-align: center; font-weight: 600; font-size: 1.3rem;\">Stunde&nbsp;" . $hour . "</p><div class=\"image_grid\">\n";
                    foreach ($images as $index => $image) {
                        $minute = substr($image, 9, 2);
                        echo "        <a class=\"image_link\" href=\"foto.php?datum=" . $sanitized_date . "&hour=" . $hour . "&pos=" . $index . "\"><div class=\"image_subtext\"><img src=\"" . $sanitized_date . DIRECTORY_SEPARATOR . $image . "\"/><span>" . $hour . ":" . $minute . "</span></div></a>\n";
                    }
                    echo "    </div></div>\n";
                }
                ?>
            </div>
        </div>
</body>

</html>