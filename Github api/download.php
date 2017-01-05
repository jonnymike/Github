<?php
session_start();
$Git_file1 = $_SESSION['Git_file1'];
$twit_file1 = $_SESSION['twit_file1'];
$twit_file2 = $_SESSION['twit_file2'];
$twit_file3 = $_SESSION['twit_file3'];
if (isset($_POST['Git_file1'])) {
	$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '',"$Git_file1");
	$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); 
    $FilePath = "github/"; // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
	$fullPath = $FilePath.$dl_file;
	$fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    $size     = filesize($FilePath . $FileName);
    header("Content-Type: application/force-download; filename=\"" . $path_parts["basename"] . "\"");
    header("Content-Length: " . $fsize . "");
    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
    readfile($FilePath . $dl_file); 
}
if (isset($_POST['tw_file1'])) {
   $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '',"$twit_file1");
	$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); 
    $FilePath = "twitter/"; // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
	$fullPath = $FilePath.$dl_file;
	$fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    $size     = filesize($FilePath . $FileName);
    header("Content-Type: application/force-download; filename=\"" . $path_parts["basename"] . "\"");
    header("Content-Length: " . $fsize . "");
    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
    readfile($FilePath . $dl_file); 
}
if (isset($_POST['tw_file2'])) {
    $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '',"$twit_file2");
	$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); 
    $FilePath = "twitter/"; // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
	$fullPath = $FilePath.$dl_file;
	$fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    $size     = filesize($FilePath . $FileName);
    header("Content-Type: application/force-download; filename=\"" . $path_parts["basename"] . "\"");
    header("Content-Length: " . $fsize . "");
    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
    readfile($FilePath . $dl_file); 
}
if (isset($_POST['tw_file3'])) {
    $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '',"$twit_file3");
	$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); 
    $FilePath = "twitter/"; // the folder of the file that is downloaded , you can put the file in a folder on the server just for more order
	$fullPath = $FilePath.$dl_file;
	$fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    $size     = filesize($FilePath . $FileName);
    header("Content-Type: application/force-download; filename=\"" . $path_parts["basename"] . "\"");
    header("Content-Length: " . $fsize . "");
    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
    readfile($FilePath . $dl_file); 
}
?>


