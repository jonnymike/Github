<?php
/*----------------get access_token----------------------*/
if(isset($_GET['code'])){
			$code=$_GET['code'];
			$client_id = "8bb82c801c9ba0854812";
			$client_secret = "23f14e9a81843a3f95e66469817ee2414a826014";
			$scope = "user";
			$redirect_uri = "http://work.seventhfoundation.com/Github_Api/";
			$headers =array("Accept: application/json");

			 $oauth2token_url = "https://github.com/login/oauth/access_token";
				$clienttoken_post = array(
				"code" => $code,
				"client_id" => $client_id,
				"client_secret" => $client_secret,
				"redirect_uri" => $redirect_uri
				);
				$curl = curl_init($oauth2token_url);
			    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $clienttoken_post);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$json_response = curl_exec($curl);
				//curl_close($curl);	
				 $authObj = json_decode($json_response, true);
				 $token = array($authObj);
				 $final_token = $token['0']['access_token'];				 
							/*----------------usre info--------------*/
                  $header1 = array("Authorization: token ".$final_token, "User-Agent: websolution806");							
										   $url_2 = 'https://api.github.com/user';
											$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$url_2);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
											$output=curl_exec($ch);
										    $response = json_decode($output, true);
										    $final_res = array($response);
										   $url_3 = $final_res['0']['repos_url'];	
										   /* echo "<pre>";
											print_r($final_res);										   
										   echo "</pre>"; */										   
				/*----------------get repositories details --------------*/
											$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$url_3);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
											$output=curl_exec($ch);
											$repositories = json_decode($output, true);
											$final_repositories = array($repositories);
                                               $final_1_repos =  $final_repositories['0'];
											   $url_4 = $final_1_repos['0']['url'];
											   /* echo "<pre>";
											print_r($final_repositories);										   
										   echo "</pre>"; */
				/*----------------get repository_1 -----------------------*/
											$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$url_4);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
											$output=curl_exec($ch);
											$repository_1 = json_decode($output, true);
											$final_repository_1 = array($repository_1);
                                            $final_1_repository_1 =  $final_repository_1['0'];
										    
											$master = $final_1_repository_1['branches_url']; 
											$tress =  $final_1_repository_1['trees_url']; 
											
				/*----------------get repository_2 -----------------------*/
				$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$url_5);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
											$output=curl_exec($ch);
											$repository_2 = json_decode($output, true);
											$final_repository_2 = array($repository_2);
                                           $final_1_repository_2 =  $final_repository_2['0'];
										
						/*--------------------------get branches master------------------*/
											$data = preg_replace("/\{[^}]+\}/", "", $master);
											$final_data = $data.'/master';
											$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$final_data);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
											$output=curl_exec($ch);
											$branches = json_decode($output, true);
											$branches_1 = array($branches);
                                            $sha =  $branches_1['0']['commit']['sha'];
									      /*  echo "<pre>";
											print_r($branches_1);										   
										   echo "</pre>" */;
								/*---------------------------get repository tress -------------------------------*/
								$tress_url = preg_replace("/\{[^}]+\}/", "", $tress);
										echo $f_tress_url = $tress_url.'/'. $sha;
								
											$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$f_tress_url);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
											$tress_1=curl_exec($ch);
											$tress_data = json_decode($tress_1, true);
											$final_tress = array($tress_data);	
											$respos_url = $final_tress['0']['tree']['0']['url']; 
										   /*  echo "<pre>";
										    print_r($final_tress);
										    echo "</pre>";
											echo $respos_url; */
								/*---------------------------------get repositories data-------------------*/	

								$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$respos_url);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
											$respository=curl_exec($ch);
											$respository_1 = json_decode($respository, true);
											$final_respository_1 = array($respository_1);
											$data_file_name = $final_respository_1['0']['tree']['0']['path'];
											
										   $data_file_url = $final_respository_1['0']['tree']['0']['url'];
										 /* echo "<pre>";
										print_r($final_respository_1);
										echo "</pre>";  */
								/*--------------------------------get file data--------------------*/
								$ch = curl_init();  
											curl_setopt($ch, CURLOPT_HTTPHEADER,$header1);
											curl_setopt($ch,CURLOPT_URL,$data_file_url);
											curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
											$file_data=curl_exec($ch);
											$final_file_data = json_decode($file_data, true);
											$final_file_data_1 = array($final_file_data);
											$final_content = $final_file_data_1['0']['content'];
										   echo $final_content_1 = base64_decode($final_content);
											
								
	//header('Location:'.$index_page);
}
/*----------------get code----------------------*/
else{
	$url="https://github.com/login/oauth/authorize?client_id=8bb82c801c9ba0854812&client_secret=23f14e9a81843a3f95e66469817ee2414a826014&scope=user&redirect_uri=http://work.seventhfoundation.com/Github_Api/";
	header('Location:'.$url);
}
?>