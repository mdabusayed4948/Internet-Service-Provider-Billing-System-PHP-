
<?php session_start();
	require_once("db_config.php");
	
if(isset($_POST["btnSubmit"])){
	
	$username = trim($_POST["txtName"]);	
	$password = md5(trim($_POST["txtPassword"]));
	
		$user_table = $db->query("select id,username,image,role_id from bf_users where username='$username' and password='$password'");	
	
	list($uid,$uname,$image,$role_id)=$user_table->fetch_row();
	
	if(isset($uname)){
		$_SESSION["s_id"]=$uid;	
		$_SESSION["s_username"]=$uname;	
		$_SESSION["s_image"]=$image;	
		$_SESSION["s_role_id"]=$role_id;
		
		header("location:home.php");	
	}else{
		$msg = "
			
			<div class='alert alert-danger alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <strong>Warning!</strong> Incorrect Username or password !!
</div>";
		}
}
?>
<!DOCTYPE html>
<html >
<head>
	<link rel="icon" type="img/png" sizes="32x32" href="img/favicon-32x32.png">
  <meta charset="UTF-8">
  <title>Internet Service Provider</title>
  
  
  
  <link rel="stylesheet" href="plugins/css/style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  
</head>

<body>
  <body>
<div class="container" style="margin-top:100px; ">
	<section id="content" >
    
       <div>           
    
<?php
    echo isset($msg)?$msg:"";
     ?>

  </div> 
		<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h1>Login Form</h1>
            <h3>Internet Service Provider(ISP)</h3>
			<div>
				<input type="text" placeholder="Username" required id="username" name="txtName" />
			</div>
			<div>
				<input type="password" placeholder="Password" required id="password" name="txtPassword" />
			</div>
			<div>
				<input type="submit" value="Log in" name="btnSubmit" />
				<a href="#"></a>
				<a href="#"></a>
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="http://www.bfastit.com/" target='_blank'>Developed By B-Fast IT</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="plugins/js/index.js"></script>
  
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
