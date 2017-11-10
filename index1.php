
<?php session_start();
	require_once("db_config.php");
	
if(isset($_POST["btnSubmit"])){
	
	$username = $_POST["name"];	
	$password = $_POST["pass"];
	
		$user_table = $db->query("select id,username,image,role_id from users where username='$username' and password='$password'");	
	
	list($uid,$uname,$image,$role_id)=$user_table->fetch_row();
	
	if(isset($uname)){
		$_SESSION["s_id"]=$uid;	
		$_SESSION["s_username"]=$uname;	
		$_SESSION["s_image"]=$image;	
		$_SESSION["s_role_id"]=$role_id;
		
		header("location:home.php");	
	}else{
		echo "Invalid username or Password";
		}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form method="post" action="index.php">
<div>username :<br>
<input type="text" name="name"/>
</div>

<div>Password :<br>
<input type="password" name="pass" placeholder="**********"/>
</div>

<div><br>
<input type="submit" name="btnSubmit" value="Login"/>
</div>

</form>

</body>
</html>