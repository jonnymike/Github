<?php
		/*------------------Get code -----------------*/
	session_start();
	$_SESSION['code']    = $_GET['code'];
	$code                = $_GET['code'];
	$client_id           = "8bb82c801c9ba0854812";
	$client_secret       = "23f14e9a81843a3f95e66469817ee2414a826014";
	$scope               = "user";
	$redirect_uri        = "http://work.seventhfoundation.com/Github/token.php";
	$headers             = array(
		"Accept: application/json"
	);
	$oauth2token_url     = "https://github.com/login/oauth/access_token";
	$clienttoken_post    = array(
		"code" => $code,
		"client_id" => $client_id,
		"client_secret" => $client_secret,
		"redirect_uri" => $redirect_uri
	);
		$curl                = curl_init($oauth2token_url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $clienttoken_post);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json_response      = curl_exec($curl);
		//curl_close($curl);    
		$authObj            = json_decode($json_response, true);
		$token              = array(
			$authObj
		);
		$final_token        = $token['0']['access_token'];
		/*----------------usre info--------------*/
		$_SESSION['header'] = $header1 = array(
			"Authorization: token " . $final_token,
			"User-Agent: websolution806"
		);
		$url_2              = 'https://api.github.com/user';
		$ch                 = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $_SESSION['header']);
		curl_setopt($ch, CURLOPT_URL, $url_2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output    = curl_exec($ch);
		$response  = json_decode($output, true);
		$final_res = array(
			$response
		);
		$url_3     = $final_res['0']['repos_url'];
		/*----------------get repositories details --------------*/
		$ch        = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
		curl_setopt($ch, CURLOPT_URL, $url_3);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output             = curl_exec($ch);
		$repositories       = json_decode($output, true);
		$final_repositories = array(
			$repositories
		);
		foreach ($final_repositories as $final_1_reposit) {
			$url_4 = $final_1_reposit['0']['url'];
		}
		/*----------------get repository -----------------------*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
		curl_setopt($ch, CURLOPT_URL, $url_4);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output             = curl_exec($ch);
		$repository_1       = json_decode($output, true);
		$final_repository_1 = array(
			$repository_1
		);
		foreach ($final_repository_1 as $repository)
			$_SESSION['name'] = $respose_name = $repository['name'];
		$content_url = $repository['contents_url'];
		/*----------------get repository content -----------------------*/
		$data_1      = preg_replace("/\{[^}]+\}/", "", $content_url);
		$ch          = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header1);
		curl_setopt($ch, CURLOPT_URL, $data_1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output             = curl_exec($ch);
		$repository_2       = json_decode($output, true);
		$final_repository_2 = array(
			$repository_2
		);
		foreach ($final_repository_2 as $final_1_reposit_2) {
			$_SESSION['folder1'] = $git_subfolder_1 = $final_1_reposit_2['0']['name'];
			$_SESSION['folder2'] = $git_subfolder_2 = $final_1_reposit_2['1']['name'];
			$_SESSION['url_1']   = $final_1_repository_1 = $final_1_reposit_2['0']['url'];
			$_SESSION['url_2']   = $final_1_repository_2 = $final_1_reposit_2['1']['url'];
		}
?>
<html>    
<body>
<center>
<head> 
</head>
<h1>Please Click here to get Github Repositories Files:</h1><br />
<form action="repositories_files.php"method="POST">
<input name="respos" type="submit" value="<?php echo $_SESSION['name'];?>" ></input>
</form>
<hr />
</center>
</body>
</html>