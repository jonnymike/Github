<?php
session_start();
$Git_file1 = $_SESSION['Git_file1']
$file_1 = $_SESSION['files_1'];
$file_2 = $_SESSION['files_2'];	
$file_3 = $_SESSION['files_3'];
if (isset($_POST['Git_file1'])) {
$FileName = "/$Git_file1";
//$FileName = "/config.php";  // the name of the file that is downloaded
$FilePath = "github";  // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
$size = filesize($FilePath . $FileName) ;
header("Content-Type: application/force-download; name=\"". $FileName ."\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ". $size ."");
header("Content-Disposition: attachment; filename=\"". $FileName ."\"");
header("Expires: 0");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
echo (readfile($FilePath . $FileName));
}
if (isset($_POST['file1'])) {
$FileName = "/$file_1";
//$FileName = "/config.php";  // the name of the file that is downloaded
$FilePath = "twitter";  // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
$size = filesize($FilePath . $FileName) ;
header("Content-Type: application/force-download; name=\"". $FileName ."\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ". $size ."");
header("Content-Disposition: attachment; filename=\"". $FileName ."\"");
header("Expires: 0");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
echo (readfile($FilePath . $FileName));
}
if (isset($_POST['file2'])) {
$FileName = "/$file_2";
//$FileName = "/config.php";  // the name of the file that is downloaded
$FilePath = "twitter";  // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
$size = filesize($FilePath . $FileName) ;
header("Content-Type: application/force-download; name=\"". $FileName ."\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ". $size ."");
header("Content-Disposition: attachment; filename=\"". $FileName ."\"");
header("Expires: 0");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
echo (readfile($FilePath . $FileName));
}
if (isset($_POST['file3'])) {
$FileName = "/$file_3";
//$FileName = "/config.php";  // the name of the file that is downloaded
$FilePath = "twitter";  // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
$size = filesize($FilePath . $FileName) ;
header("Content-Type: application/force-download; name=\"". $FileName ."\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ". $size ."");
header("Content-Disposition: attachment; filename=\"". $FileName ."\"");
header("Expires: 0");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
echo (readfile($FilePath . $FileName));
}
?>


