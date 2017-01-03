<?php
session_start();
$file_1 = $_SESSION['twitter_file1'];
$file_2 = $_SESSION['twitter_file2'];
$file_3 = $_SESSION['twitter_file3'];
if (isset($_POST['tw_file1'])) {
    $FileName = "/$file_1"; // the name of the file that is downloaded
    $FilePath = "twitter"; // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
    $size     = filesize($FilePath . $FileName);
    header("Content-Type: application/force-download; name=\"" . $FileName . "\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $size . "");
    header("Content-Disposition: attachment; filename=\"" . $FileName . "\"");
    header("Expires: 0");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    echo (readfile($FilePath . $FileName));
}
if (isset($_POST['tw_file2'])) {
    $FileName = "/$file_2"; // the name of the file that is downloaded
    $FilePath = "twitter"; // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
    $size     = filesize($FilePath . $FileName);
    header("Content-Type: application/force-download; name=\"" . $FileName . "\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $size . "");
    header("Content-Disposition: attachment; filename=\"" . $FileName . "\"");
    header("Expires: 0");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    echo (readfile($FilePath . $FileName));
}
if (isset($_POST['tw_file3'])) {
    $FileName = "/$file_3"; // the name of the file that is downloaded
    $FilePath = "twitter"; // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
    $size     = filesize($FilePath . $FileName);
    header("Content-Type: application/force-download; name=\"" . $FileName . "\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $size . "");
    header("Content-Disposition: attachment; filename=\"" . $FileName . "\"");
    header("Expires: 0");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    echo (readfile($FilePath . $FileName));
}
?>


