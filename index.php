<!DOCTYPE html>
<html lang="de">

<head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="https://portal.timelapsesystems.at/favicon.ico" type="image/x-icon">
    <?php
    $cwd_path = getcwd();
    $cwd_len = strlen($cwd_path);
    # find first /
    $cam_strt = strpos($cwd_path, DIRECTORY_SEPARATOR, 1);
    # search for last /
    while ($cam_strt) {
        $cwd_mark = $cam_strt + 1;
        $pro_strt = $cwd_mark;
        # search for next /
        $cam_strt = strpos($cwd_path, DIRECTORY_SEPARATOR, $cwd_mark);
        # if one found then cut out the part before the / as project name
        if ($cam_strt) {
            # addon: remove the project number from the pro_nam
            $pro_strt = $pro_strt + 6;
            $pro_nam = substr($cwd_path, $pro_strt, $cam_strt - $pro_strt);
        }
    }
    # cut out the part behind the / as camera name
    # addon: remove the string 'cam' from the name
    $cwd_mark = $cwd_mark + 3;
    $cam_nam = substr($cwd_path, $cwd_mark, $cwd_len - $cwd_mark);

    echo "    <title>timelapsesystems - $pro_nam</title>\n";
    echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-15\">\n";
    echo "  </head>\n";
    echo "  <body>\n";
    ?>
    <div id="container">
        <?php
        require 'sidebar.html';
        ?>
        <div id="tables">
            <div class="box_shadow">
                <?php
                echo "    <h1 style=\"font-weight: 300 !important; margin: 0;\">Timelapse Systems - Archiv</h1>\n";
                echo "    <h3 style=\"margin: 0; margin-top: 5px; color: #99a6ad !important; font-size: .92857rem; font-weight: 400;\">Fotoarchiv des Projektes $pro_nam - Kamera $cam_nam</h3></div>\n";

                $dir_array = scandir(__DIR__, SCANDIR_SORT_ASCENDING);
                $str_month = array("Jänner", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
                for ($year = 29; $year > 18; $year--) {
                    $month = array();
                    // Get and save pictures by month
                    foreach ($dir_array as $dir_entry) {
                        if (substr($dir_entry, 0, 2) == $year) {
                            for ($m = 1; $m <= 12; $m++) {
                                if (substr($dir_entry, 3, -3) == $m) {
                                    $month[$m][] = $dir_entry;
                                }
                            }
                        }
                    }
                    // Print table for each month in decending order
                    for ($mo = 12; $mo > 0; $mo--) {
                        if (array_key_exists($mo, $month)) {
                            $start_woche = null;
                            foreach ($month[$mo] as $current_day) {
                                $day_as_date   = strtotime($current_day);
                                $iso_week      = date("W", $day_as_date);
                                $num_wochentag = date("w", $day_as_date);
                                if ($num_wochentag == 0) {
                                    $num_wochentag = 7;
                                }
                                $tag[$iso_week][$num_wochentag] = $current_day;
                                if ($start_woche == null) {
                                    $start_woche = $iso_week;
                                }
                            }
                            $ende_woche = $iso_week;
                            echo "    <div class=\"box_shadow\"><h4 style=\"margin: 0; margin-bottom: 10px; font-weight: 600;\">" . $str_month[$mo - 1] . " 20" . $year . "</h4><div id=\"table_container\">";
                            include("tabelle.php");
                            echo "</div></div>";
                        }
                    }
                }
                unset($dir_entry);
                ?>
            </div>
        </div>
    </div>
    </body>

</html>