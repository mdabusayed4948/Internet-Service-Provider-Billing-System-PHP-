
<?php session_start();
	require_once("db_config.php");
	
if(isset($_POST["btnLogin"])){
	
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
<!doctype html>
<html>
<head>
<link rel="icon" type="img/png" sizes="32x32" href="img/favicon-32x32.png">
<meta charset="utf-8">
<title>Internet Service Provider</title>
<link href="plugins/css/style1.css" rel="stylesheet" type="text/css"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!---<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>--->
</head>

<body>
	
  <div class="container">
        <div class="card card-container">
        <div style="text-align:center; background-color:#6790A1; color:#FFF">Login Form</div>
          <div><h4 style="text-align:center">Internet Service Provider</h4></div>
          <hr>
            <img id="profile-img" class="profile-img-card" src="img/2.jpg" />
            <p style="text-align:center">please sign in only internal user</p>
            
            
            <form class="form-signin"  method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="txtName" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="txtPassword" id="inputPassword" class="form-control" placeholder="Password" required>
    <div>           
       &nbsp;
<?php
    echo isset($msg)?$msg:"";
     ?>

  </div>               
              
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="btnLogin">Sign in</button>
            </form>
            
            <div style="text-align:center">
          <div><h4>Powered By : B-Fast IT LTD</h4></div> 
            <div><h5>Contact No : +880 1716-927793</h5></div> 
            For Username and Password
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Click Here</button> 
            </div>
        </div>
    </div>



  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" style="text-align: center;"><i>Internet Service Provider</i></h3>
        </div>
        <div class="modal-body" style="text-align: center;">
          <h4 style="background-color: #6790A1; padding: 3px"><i>For Super Admin</i></h4>
          <p>User Name : suadmin</p>
          <p>Password : suadmin</p>

          <h4 style="background-color: #6790A1; padding: 3px"><i>For  Admin</i></h4>
          <p>User Name : admin</p>
          <p>Password : admin</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>









    <!--<script src="js/jquery.min.js"></script>-->
    <!---<script src="js/bootstrap.min.js"></script>-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $('#myAlert').on('closed.bs.alert', function () {
  // do something…
})
    </script>
<script src="plugins/js/script.js"></script>
</body>
</html>

