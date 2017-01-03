<?php
session_start();
$_SESSION['code'];
if (isset($_POST['github'])) {
   $code          = $_SESSION['code'];
    $client_id     = "8bb82c801c9ba0854812";
    $client_secret = "23f14e9a81843a3f95e66469817ee2414a826014";
    $scope         = "user";
    $redirect_uri  = "http://work.seventhfoundation.com/Github_Api/";
    $headers       = array(
        "Accept: application/json"
    );
    
    $oauth2token_url  = "https://github.com/login/oauth/access_token";
    $clienttoken_post = array(
        "code" => $code,
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "redirect_uri" => $redirect_uri
    );
    $curl             = curl_init($oauth2token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $clienttoken_post);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json_response = curl_exec($curl);
    //curl_close($curl);    
    $authObj       = json_decode($json_response, true);
    $token         = array(
        $authObj
    );
    $final_token   = $token['0']['access_token'];
    /*----------------usre info--------------*/
    $header1       = array(
        "Authorization: token " . $final_token,
        "User-Agent: websolution806"
    );
    $url_2         = 'https://api.github.com/user';
    $ch            = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $url_2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output    = curl_exec($ch);
    $response  = json_decode($output, true);
    $final_res = array($response );
    $url_3 = $final_res['0']['repos_url'];
    /* echo "<pre>";
    print_r($final_res);
    echo "</pre>";  */
    
    /*----------------get repositories details --------------*/
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $url_3);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output             = curl_exec($ch);
    $repositories       = json_decode($output, true);
    $final_repositories = array($repositories);
    $final_1_repos      = $final_repositories['0'];
    $url_4 = $final_repositories['0']['0']['url'];
    
 /*   echo "<pre>";
    print_r($final_repositories);
    echo "</pre>"; */

    /*----------------get repository_1 -----------------------*/
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $url_4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output               = curl_exec($ch);
    $repository_1         = json_decode($output, true);
    $final_repository_1   = array(
        $repository_1
    );
    $final_1_repository_1 = $final_repository_1['0'];
    $content_url          = $final_1_repository_1['contents_url'];
  /*   echo "<pre>";
    print_r($final_repository_1);                                           
    echo "</pre>";  */ 
    //////////////////////////////////////
    $data_1               = preg_replace("/\{[^}]+\}/", "", $content_url);
    $ch                   = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $data_1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output               = curl_exec($ch);
    $repository_2         = json_decode($output, true);
    $final_repository_2   = array(
        $repository_2
    );
    $git_subfolder_1 = $final_repository_2['0']['0'] ['name'];
	$git_subfolder_2 = $final_repository_2['0']['1'] ['name'];	
    $final_1_repository_2 = $final_repository_2['0']['0']['url'];
    /* echo "<pre>";
    print_r($final_repository_2);
    echo "</pre>"; */ 
    //////////////////////////////////////////////
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
    curl_setopt($ch, CURLOPT_URL, $final_1_repository_2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output      = curl_exec($ch);
    $url_1       = json_decode($output, true);
    $final_url_1 = array(
        $url_1
    );
   $index_page_url = $final_url_1['0']['0']['download_url'];
	
  /*   echo "<pre>";
    print_r($final_url_1);
    echo "</pre>"; */
    /////////////////////
	
    $file = fopen(__DIR__ . '/github/index.php', "a");
	//$file = fopen('index2.php', 'w');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
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
}
$dir    = 'github';
$files = scandir($dir);
$_SESSION['Git_file1']  = $Git_file1 = $files['2']; 
?>
<center>
<h1> Click here to download the files </h1>
<form action="git_download.php"  method="POST">
<input name="Git_file1" type="submit" value="<?php echo $_SESSION['Git_file1']; ?>" ></input>
</form>
</center>