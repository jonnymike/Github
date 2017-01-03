<?php
/*----------------Get Authorizations -----------------------*/
$url = "https://github.com/login/oauth/authorize?client_id=8bb82c801c9ba0854812&client_secret=23f14e9a81843a3f95e66469817ee2414a826014&scope=user&redirect_uri=http://work.seventhfoundation.com/Github/token.php";
header('Location:' . $url);
?>


 