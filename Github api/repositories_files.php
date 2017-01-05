<?php
session_start();
$header1 = $_SESSION['header'];
$_SESSION['url_1'];
$_SESSION['url_2'];
$folder1 = $_SESSION['folder1'];
$folder2  = $_SESSION['folder2'];
?>
<html>	
<body>
<center>
<head> 
</head>
<h1>Repository Folders:</h1><br />
<form action=""method="POST">
<input name="file_1" type="submit" value="<?php echo $folder1;?>" ></input>
<input name="file_2" type="submit" value="<?php echo $folder2;?>" ></input>
</form>
<hr />
</center>
</body>
</html>
<?php
/*---------------------github-----------------------*/
if (isset($_POST['file_1'])) {
	/*------------------if file exit then delete-----------------*/
	$files = glob('github/*'); //get all file names
   foreach($files as $file){
    if(is_file($file))
    unlink($file); //delete file
}
    /*----------------get files -----------------------*/
    $ch                   = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $_SESSION['url_1']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output         = curl_exec($ch);
    $url_1          = json_decode($output, true);
    $final_url_1    = array(
        $url_1
    );
	foreach($final_url_1 as $final_url) {
	$file_name_1 = $final_url['0']['name'];
    $index_page_url = $final_url['0']['download_url'];
	} 
    /*----------------save file on server -----------------------*/
    $file   = fopen(__DIR__ . '/github/'.$file_name_1.'',"a");
    $ch             = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
    curl_setopt($ch, CURLOPT_URL, $index_page_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_FILE, $file);
    $output          = curl_exec($ch);
    $page_data       = json_decode($output, true);
    $index_page_data = array(
        $page_data
    );
    fclose($file); 
/*----------------get files name to the server -----------------------*/
	 $dir                   = 'github';
$file                 = scandir($dir);
$files =  array_slice($file,2);
$Git_file1 = $_SESSION['Git_file1'] = $Git_file1 = $files['0']; 
echo "
<center>
<h1> Click here to download the $folder1 files </h1>
<form action='download.php' method='POST'>
<input name='Git_file1' type='submit'value='$Git_file1'></input>
</form>
</center>";
}



					/*--------------------------twitter data ----------------*/


if (isset($_POST['file_2'])) {
	/*------------------if file exit then delete-----------------*/
	$files = glob('twitter/*'); //get all file names
   foreach($files as $file){
    if(is_file($file))
    unlink($file); //delete file
}
    /*----------------get files -----------------------*/
    $ch                   = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
    curl_setopt($ch, CURLOPT_URL, $_SESSION['url_2']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output      = curl_exec($ch);
    $url_1       = json_decode($output, true);
    $final_url_1 = array(
        $url_1
		
    ); 
   foreach($final_url_1 as $final_url) {
	    $file_name_1 = $final_url['0']['name'];
	     $file_name_2 = $final_url['1']['name'];
	    $file_name_3 = $final_url['2']['name'];
	   
	    $page_url_1  = $final_url['0']['download_url'];
        $page_url_2  = $final_url['1']['download_url'];
       $page_url_3  = $final_url['2']['download_url'];
}  

    /*----------------save file on server -----------------------*/
    $file = fopen(__DIR__ . '/twitter/'.$file_name_1.'', "a");
    $ch   = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $page_url_1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_FILE, $file);
    
    $output          = curl_exec($ch);
    $page_data       = json_decode($output, true);
    $index_page_data = array(
        $page_data
    );
    fclose($file);

    /*----------------save file on server -----------------------*/
    $file = fopen(__DIR__ . '/twitter/'.$file_name_2.'', "a");
    $ch   = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $page_url_2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_FILE, $file);
    $output          = curl_exec($ch);
    $page_data       = json_decode($output, true);
    $index_page_data = array(
        $page_data
    );
    fclose($file);

    /*----------------save file on server -----------------------*/

    $file = fopen(__DIR__ . '/twitter/'.$file_name_3.'', "a");
    $ch   = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $page_url_3);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_FILE, $file);
    $output          = curl_exec($ch);
    $page_data       = json_decode($output, true);
    $index_page_data = array(
        $page_data
    );
    fclose($file);

/*----------------get files name to the server -----------------------*/
 $dir                     = 'twitter';
$file                    = scandir($dir);
$files =  array_slice($file,2);	
$tw_file1 = $_SESSION['twit_file1'] = $twit_file1 = $files['0'];
$tw_file2 = $_SESSION['twit_file2'] = $twit_file2 = $files['1'];
$tw_file3 = $_SESSION['twit_file3'] = $twit_file3 = $files['2']; 
echo "<center>
<h1> Click here to download the $folder2 files </h1>
<form action='download.php' method='POST'>
<input name='tw_file1' type='submit' value='$tw_file1'></input>
<input name='tw_file2' type='submit' value='$tw_file2'></input>
<input name='tw_file3' type='submit' value='$tw_file3'></input>
</form>
</center> ";
}
?> 