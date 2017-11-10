
<?php session_start();

require_once("db_config.php");

if(!isset($_SESSION["s_username"])){
	header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="img/png" sizes="32x32" href="img/favicon-32x32.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <title>ISP Management System</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
 <?php
 
 include("css_lib.php");
 ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
include("header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
     <?php 
	 if($_SESSION["s_role_id"]=="1"){//1 for Super admin
	   include("placeholder_suadmin.php");
	 }else if($_SESSION["s_role_id"]=="2"){ //2 for admin
	   include("placeholder_admin.php");
	 }else if($_SESSION["s_role_id"]=="3"){ // 3 for entry Operator
	   include("placeholder_eoperator.php");
	 }else if($_SESSION["s_role_id"]=="4"){ // 3 for editor
	   include("placeholder_editor.php");
	 }else if($_SESSION["s_role_id"]=="5"){ // 3 for super user
	   include("placeholder_suuser.php");
	 }else if($_SESSION["s_role_id"]=="6"){ // 3 for user
	   include("placeholder_user.php");
	 }
		
	?>
   
  </div>
  <!-- /.content-wrapper -->
  
<?php
include("footer.php");
include("aside.php");
?>


 

  <div class="control-sidebar-bg"></div>
</div>

<?php
include("js_lib.php");
?>

</body>
</html>
