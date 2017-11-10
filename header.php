  <?php 
	   if($_SESSION["s_role_id"]=="1"){
	     include("nav_suadmin.php");
	   }else if($_SESSION["s_role_id"]=="2"){
		 include("nav_admin.php");
	   }else if($_SESSION["s_role_id"]=="3"){
		 include("nav_general.php");
	   }
	 
	 ?>