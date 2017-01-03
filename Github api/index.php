<?php
session_start();
$_SESSION['code'] = $_GET['code'];
?>
<html>	
<body>
<center>
<head> 
</head>
<h1>Please Click here to get Github Files:</h1><br />
<form action="github.php"  method="POST">
<input name="github" type="submit" value="Github_Api" ></input>
</form>
<form action="twitter.php"  method="POST">
<input name="twitter" type="submit" value="Twitter" ></input>
</form>
<hr />
</center>
</body>
</html>


 