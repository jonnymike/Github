<?php
/*------------------Get code -----------------*/
session_start();
$_SESSION['code'] = $_GET['code'];
$_SESSION['github'] = "github";
$_SESSION['twitter'] = "twitter";
?>
<html>	
<body>
<center>
<head> 
</head>
<h1>Please Click here to get Github Repositories Files:</h1><br />
<form>
<button formaction="http://work.seventhfoundation.com/Github/github.php">Github-Api</button>
<button formaction="http://work.seventhfoundation.com/Github/twitter.php">Twitter</button>
</form>
<hr />
</center>
</body>
</html>