
<?php

function thumbnail($imgfile, $outdir = "./thumbnails/")
{
    $thumbsize = 150;

    $filename = basename($imgfile);

    // Add folder path to image name
    $replace = array("/", "\\", ".");
    $filename = str_replace($replace, "_", dirname($imgfile)) . "_" . $filename;

    if (!is_dir($outdir))
        return false;

    if (file_exists($outdir . $filename))
        return $outdir . $filename;

    if (!file_exists($imgfile))
        return false;

    list($width, $height) = getimagesize($imgfile);
    $imgratio = $width / $height;

    if ($imgratio > 1) {
        $newwidth = $thumbsize;
        $newheight = $thumbsize / $imgratio;
    } else {
        $newheight = $thumbsize;
        $newwidth = $thumbsize * $imgratio;
    }

    $thumb = imagecreate($newwidth, $newheight);

    imageJPEG($thumb, $outdir . "temp.jpg");
    $thumb = imagecreatefromjpeg($outdir . "temp.jpg");

    $source = imagecreatefromjpeg($imgfile);

    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    imagejpeg($thumb, $outdir . $filename, 80);

    ImageDestroy($thumb);
    ImageDestroy($source);

    return $outdir . $filename;
}
?>