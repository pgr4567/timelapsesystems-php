<!DOCTYPE html>
<html lang="en">

<head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="https://portal.timelapsesystems.at/favicon.ico" type="image/x-icon">
    <title>timelapsesystems - interaktive Foto-Übersicht</title>
</head>

<body>
    <?php
    require 'scrollFoto.html';
    ?>
    <?php
    require_once 'utils.php';
    $UNSAFE_date = $_GET['datum'] ?? null;
    $sanitized_date = getSafeDateFolder($UNSAFE_date);
    ?>
    <div id="container">
        <?php
        require 'sidebar.html';
        ?>
        <div id="tables">
            <span class="box_shadow">
                <?php
                echo "<a style=\"display: flex; flex-direction: row; align-items: center; font-weight: 500; text-decoration: none; color: #58666e;\" href=\"fotos.php?datum=" . $sanitized_date . "\">
                    <svg style=\"width: 1rem; height: 1rem; margin-right: 10px;\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d=\"M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z\" />
                    </svg>
                    Foto-Übersicht</a>"
                ?>
            </span>
            <div class="box_shadow">
                <?php
                if ($sanitized_date === false) {
                    echo "    <h3>Ungültiges Datum</h3>\n";
                    return;
                }

                echo "    <h3 style=\"margin: 0; font-weight: 500;\">Fotos vom " . $sanitized_date . "</h3>";
                ?>
            </div>
            <div class="box_shadow">
                <div class="timeline-wrapper">
                    <span id="timeline-timer" style="margin-bottom: 1rem; font-weight: 600; font-size: 1.3rem;"></span>
                    <div class="timeline" id="timeline">
                        <?php
                        $image_map = getImageMapOfDate($sanitized_date);
                        foreach (array_reverse($image_map) as $hour => $images) {
                            foreach (array_reverse($images) as $index => $image) {
                                echo "<div class='timeline-item'><img src=\"" . $sanitized_date . DIRECTORY_SEPARATOR . $image . "\" alt='Timeline Image'></div>";
                            }
                        }
                        ?>
                    </div>
                    <input type="range" id="timeline-slider" min="0" max="0" value="0" step="1">
                </div>
            </div>
        </div>
    </div>
</body>

</html>