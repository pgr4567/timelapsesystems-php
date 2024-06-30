<!DOCTYPE html>
<html lang="de">

<head>
    <!-- TODO: Change href back-->
    <link rel="stylesheet" href="./css/styles.css">
    <?php
    $cwd_path = getcwd();
    $cwd_len = strlen($cwd_path);
    # find first /
    # TODO: change back to /
    $cam_strt = strpos($cwd_path, '\\', 1);
    # search for last /
    while ($cam_strt) {
        $cwd_mark = $cam_strt + 1;
        $pro_strt = $cwd_mark;
        # search for next /
        # TODO: change back to /
        $cam_strt = strpos($cwd_path, '\\', $cwd_mark);
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
        <div id="sidebar">
            <div style="margin-top: 1.5rem; padding: 1rem;">
                <a href="https://portal.timelapsesystems.at" style="cursor: pointer; display: flex; align-items: center; margin: 0;">
                    <img style="vertical-align: middle; width: 100%;" src="https://portal.timelapsesystems.at/img/timelapse-systems-LOGO_green.jpg" alt="Timelapse Systems Logo" width="100%">
                </a>
            </div>
            <a class="btn" href="https://portal.timelapsesystems.at/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1.15em" height="1.15em" viewBox="0 0 32 32" style="margin-right: 0.5rem;" role="img" fill="currentColor" componentname="orchid-icon">
                    <path d="M31.772 16.043l-15.012-15.724c-0.189-0.197-0.449-0.307-0.721-0.307s-0.533 0.111-0.722 0.307l-15.089 15.724c-0.383 0.398-0.369 1.031 0.029 1.414 0.399 0.382 1.031 0.371 1.414-0.029l1.344-1.401v14.963c0 0.552 0.448 1 1 1h6.986c0.551 0 0.998-0.445 1-0.997l0.031-9.989h7.969v9.986c0 0.552 0.448 1 1 1h6.983c0.552 0 1-0.448 1-1v-14.968l1.343 1.407c0.197 0.204 0.459 0.308 0.722 0.308 0.249 0 0.499-0.092 0.692-0.279 0.398-0.382 0.411-1.015 0.029-1.413zM26.985 14.213v15.776h-4.983v-9.986c0-0.552-0.448-1-1-1h-9.965c-0.551 0-0.998 0.445-1 0.997l-0.031 9.989h-4.989v-15.777c0-0.082-0.013-0.162-0.032-0.239l11.055-11.52 10.982 11.507c-0.021 0.081-0.036 0.165-0.036 0.252z"></path>
                </svg>
                Startseite
            </a>
            <small style="font-size: .82857rem; font-weight: 400; color: #717272 !important; margin-top: 10px; margin-bottom: 10px; margin-left: 20px;">Links</small>
            <a class="btn" href="https://timelapsesystems.at/">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1.15em" height="1.15em" viewBox="0 0 32 32" style="margin-right: 0.5rem;" role="img" fill="currentColor" componentname="orchid-icon">
                    <path d="M9.239 22.889c0.195 0.195 0.451 0.293 0.707 0.293s0.511-0.098 0.707-0.293l12.114-12.209c0.39-0.39 0.39-1.024 0-1.414s-1.023-0.39-1.414 0l-12.114 12.209c-0.391 0.39-0.391 1.023 0 1.414zM14.871 20.76c0.331 1.457-0.026 2.887-1.152 4.014l-4.039 3.914c-0.85 0.849-1.98 1.317-3.182 1.317s-2.332-0.468-3.182-1.317c-1.754-1.755-1.754-4.61-0.010-6.354l3.946-4.070c0.85-0.849 1.98-1.318 3.182-1.318 0.411 0 0.807 0.073 1.193 0.179l1.561-1.561c-0.871-0.407-1.811-0.619-2.754-0.619-1.663 0-3.327 0.635-4.596 1.904l-3.936 4.061c-2.538 2.538-2.538 6.654 0 9.193 1.269 1.27 2.933 1.904 4.596 1.904s3.327-0.634 4.596-1.904l4.030-3.904c1.942-1.942 2.361-4.648 1.333-7.023zM30.098 1.899c-1.27-1.269-2.933-1.904-4.596-1.904-1.664 0-3.328 0.635-4.596 1.904l-4.029 3.905c-2.012 2.013-2.423 5.015-1.244 7.439l1.552-1.552c-0.459-1.534-0.107-3.261 1.096-4.463l4.039-3.914c0.851-0.849 1.98-1.318 3.183-1.318 1.201 0 2.332 0.469 3.181 1.318 1.754 1.755 1.754 4.611 0.010 6.354l-4.039 4.039c-0.849 0.85-1.98 1.317-3.181 1.317-0.306 0-0.576 0.031-0.87-0.029l-1.593 1.594c0.796 0.331 1.613 0.436 2.463 0.436 1.663 0 3.326-0.634 4.596-1.904l4.029-4.029c2.538-2.538 2.538-6.653-0-9.192z"></path>
                </svg>
                Timelapse Homepage
            </a>
            <a class="btn" href="https://portal.timelapsesystems.at/Timelapse-Systems_AGB.pdf">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1.15em" height="1.15em" viewBox="0 0 32 32" style="margin-right: 0.5rem;" role="img" fill="currentColor" componentname="orchid-icon">
                    <path d="M24 0h-11c-1.104 0-2 0.895-2 2h11v8h8v16h-7v2h7c1.105 0 2-0.895 2-2v-18zM24 8v-5.172l5.171 5.172h-5.171zM2 4c-1.105 0-2 0.896-2 2v24c0 1.105 0.895 2 2 2h17c1.105 0 2-0.895 2-2v-18l-8-8.001h-11zM19 30h-17v-24h9v8h8v16zM13 12v-5.172l5.171 5.172h-5.171z"></path>
                </svg>
                AGBs
            </a>
            <a class="btn" href="https://portal.timelapsesystems.at/Timelapse-Systems_Hilfe.pdf">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="1.15em" height="1.15em" viewBox="0 0 32 32" style="margin-right: 0.5rem;" role="img" fill="currentColor" componentname="orchid-icon">
                    <path d="M16.000,32.000 C7.178,32.000 -0.000,24.822 -0.000,16.000 C-0.000,7.178 7.178,-0.000 16.000,-0.000 C24.822,-0.000 32.000,7.178 32.000,16.000 C32.000,24.822 24.822,32.000 16.000,32.000 ZM29.410,20.000 L22.917,20.000 C22.216,21.209 21.209,22.216 20.000,22.917 L20.000,29.410 C24.507,28.064 28.064,24.507 29.410,20.000 ZM16.000,10.000 C12.691,10.000 10.000,12.691 10.000,16.000 C10.000,19.309 12.691,22.000 16.000,22.000 C19.309,22.000 22.000,19.309 22.000,16.000 C22.000,12.691 19.309,10.000 16.000,10.000 ZM16.000,30.000 C16.681,30.000 17.345,29.935 18.000,29.840 L18.000,23.737 C17.359,23.902 16.692,24.000 16.000,24.000 C15.308,24.000 14.641,23.902 14.000,23.737 L14.000,29.840 C14.655,29.935 15.319,30.000 16.000,30.000 ZM12.000,29.410 L12.000,22.917 C10.791,22.216 9.784,21.209 9.083,20.000 L2.590,20.000 C3.936,24.507 7.493,28.064 12.000,29.410 ZM2.000,16.000 C2.000,16.681 2.065,17.345 2.160,18.000 L8.263,18.000 C8.097,17.359 8.000,16.692 8.000,16.000 C8.000,15.308 8.097,14.641 8.263,14.000 L2.160,14.000 C2.065,14.655 2.000,15.319 2.000,16.000 ZM2.590,12.000 L9.083,12.000 C9.784,10.791 10.791,9.784 12.000,9.082 L12.000,2.590 C7.493,3.936 3.936,7.493 2.590,12.000 ZM16.000,2.000 C15.319,2.000 14.655,2.065 14.000,2.160 L14.000,8.263 C14.641,8.097 15.308,8.000 16.000,8.000 C16.692,8.000 17.359,8.097 18.000,8.263 L18.000,2.160 C17.345,2.065 16.681,2.000 16.000,2.000 ZM20.000,2.590 L20.000,9.082 C21.209,9.784 22.216,10.791 22.918,12.000 L29.410,12.000 C28.064,7.493 24.507,3.936 20.000,2.590 ZM23.737,14.000 C23.903,14.641 24.000,15.308 24.000,16.000 C24.000,16.692 23.903,17.359 23.737,18.000 L29.840,18.000 C29.935,17.345 30.000,16.681 30.000,16.000 C30.000,15.319 29.935,14.655 29.840,14.000 L23.737,14.000 Z"></path>
                </svg>
                Dokumentation und Hilfe
            </a>
            <div style="flex-grow: 1; border-bottom: 1px solid rgba(233, 236, 239, .05);"></div>
            <div class="p-3 mb-2 m-t d-none d-lg-block w-100">
                <p class="small m-n">
                    © Copyright 2024 - <a href="//timelapsesystems.at" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: #babec2;">Timelapse Systems</a>
                </p>
            </div>
        </div>
        <div id="tables">
            <div class="box_shadow">
                <?php
                echo "    <h1 style=\"font-weight: 300 !important; margin: 0;\">Timelapse Systems - Archiv</h1>\n";
                echo "    <h3 style=\"margin: 0; margin-top: 5px; color: #99a6ad !important; font-size: .92857rem; font-weight: 400;\">Bildarchiv des Projektes $pro_nam - Kamera $cam_nam</h3></div>\n";

                $t = 0;
                $dir_path = '.';
                $dir_array = scandir($dir_path, SCANDIR_SORT_ASCENDING);
                $str_month = array("test", "J&auml;nner", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
                $bool_month = array(false, false, false, false, false, false, false, false, false, false, false, false, false);

                for ($year = 29; $year > 18; $year--) {
                    foreach ($dir_array as $dir_entry) {
                        if (substr($dir_entry, 0, 2) == $year) {
                            for ($m = 1; $m <= 12; $m++) {
                                if (substr($dir_entry, 3, -3) == $m) {
                                    $month[$m][$t] = $dir_entry;
                                    $t++;
                                    $bool_month[$m] = true;
                                }
                            }
                        }
                    }
                    for ($mo = 12; $mo > 0; $mo--) {
                        if ($bool_month[$mo] == true) {
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
                            echo "    <div class=\"box_shadow\"><h4 style=\"margin: 0; margin-bottom: 10px; font-weight: 600;\">" . $str_month[$mo] . " 20" . $year . "</h4><div id=\"table_container\">";
                            include("tabelle.php");
                            echo "</div></div>";
                        }
                    }
                    for ($m = 1; $m <= 12; $m++) {
                        $bool_month[$m] = false;
                    }
                }
                unset($dir_entry);
                ?>
            </div>
        </div>
    </div>
    </body>

</html>