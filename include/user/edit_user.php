
<?php

if(isset($_POST["txtUserId"])){
	
	$user_id = $_POST["txtUserId"];
	
	$user_table = $db->query("select id,username,password,email,mobile,address,image,office_location,status,gender,role_id,join_date from bf_users where id='$user_id'");
	
	list($user_id,$username,$password,$mail,$mobile,$address,$image,$olocation,$status,$gender,$role_id,$join_date)=$user_table->fetch_row();
}

if(isset($_POST["btnSubmit"])){
	
    	$file_name = $_FILES["pic"]["name"];
		 $tmp_name = $_FILES["pic"]["tmp_name"];
		 $type     = $_FILES["pic"]["type"];
		$file_size = $_FILES["pic"]["size"];
		$div =explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image="images/".$unique_image;
		
		$kb=$file_size/1024;
		
		 if("image/jpeg"==$type||
	    "image/png"==$type||
	    "image/gif"==$type||
        "application/pdf"==$type){ 
		
	    if($kb<=2000000){
		
	    copy($tmp_name,$upload_image);
	    
	  $user_id = $_POST["txtUserId"];
        	
	$msg=$db->query("update  bf_users set  image='$upload_image' where id='$user_id'");
  
	    }
        
        } 
		 $user_id  = validate($_POST["txtUserId"]);	
		$name      =  validate($_POST["txtUserName"]);
		$mail  =  validate($_POST["txtEmail"]);
		$gender    =  validate($_POST["cmbGender"]);
		$contact   =  validate($_POST["txtContact"]);
		$address     =  validate($_POST["txtAddress"]);
		$olocation   =  validate($_POST["cmbOlocation"]);
		$status      =  validate($_POST["cmbStatus"]);
		$utype      =  validate($_POST["cmbUtype"]);
		$date      = validate($_POST["txtJoin"]);
		$pwd       =  md5(validate($_POST["pwdPassword"]));
		$repwd     =  md5(validate($_POST["pwdRePassword"]));
		
		$errors = array();
		
	
		
	
		 if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        array_push($errors,"Invalid email format"); 
   		 }
		
		 if(!preg_match('/^[0-9]{11,13}$/', $contact)) {
         array_push($errors,"Only Number and white space allowed");
            }
			
	
		if($pwd!=$repwd ){
		array_push($errors,"Password did not match");	
		}
		
		if(count($errors)==0){
			$msg=$db->query("update bf_users set username='$name',password='$pwd',email='$mail',mobile='$contact',address='$address',office_location='$olocation',status='$status',gender='$gender',role_id='$utype',join_date='$date' where id='$user_id'");
		

	
	}
		if($msg){
				 echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Updated.
  </div>";	
				
			}else{
		
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
   <strong> Error:</strong>".implode("<br/>",$errors)."</div>";	
	
	
	}
		
}
	
	function validate($data){
		$data = trim($data);	
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>



<form method="post" enctype="multipart/form-data" action="home.php?item=3" id="form1" runat="server">


<div class="box box-default">
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">User Update Form</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          
            <a href="home.php?item=2" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
         
              <div class="form-group" hidden>
              <label>User Id:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="User Id" name="txtUserId" value="<?php echo isset($user_id)?$user_id:""?>">
                </div>
              
              </div>
              
                <div class="form-group">
              <label>User Name:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Username" name="txtUserName" value="<?php echo isset($username)?$username:""?>">
                </div>
              
              </div>
          
            <div class="form-group">
              	<label>E-mail:</label>
                
                	<div class="input-group">
                      <div class="input-group-addon">
                      	<i class="fa fa-envelope"></i>
                      
                      </div>
                        <input type="email" class="form-control" placeholder="E-mail" name="txtEmail" value="<?php echo isset($mail)?$mail:""?>"/>
                    </div>
              </div>
              
               <div class="form-group">
              	<label>Gender:</label>
                
                	<div class="input-group">
                      <div class="input-group-addon">
                      	<i class="fa fa-user"></i>
                      
                      </div>
                       <select class="form-control" name="cmbGender">
                       <option><?php echo isset($gender)?$gender:""?></option>
                       	<option value="Male">Male</option>
                        <option value="Female">Female</option>
                       </select>
                    </div>
              </div>
              
              
              <div class="form-group">
              <label>Contact No:</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    	<i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" name="txtContact" value="<?php echo isset($mobile)?$mobile:""?>"/>
                
                </div>
              </div>
           
            <div class="form-group">
              <label> Address:</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    <i class="glyphicon glyphicon-tags" ></i>	
                    </div>
                 
                   <textarea class="form-control" rows="3" name="txtAddress"><?php echo isset($address)?$address:""?></textarea>
                </div>
              </div>
              
                 <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="Date" name="txtJoin" value="<?php echo isset($join_date)?$join_date:""?>">
                </div>
                <!-- /.input group -->
              </div>
            
			  
            </div>
            
        
            
            <div class="col-md-6">
				  <img src="<?php echo isset($image)?$image:""?>" id="test"  alt="" class="thumbnail" width="100" height="100"/>
			
              <div class="form-group">
            
              <label> Image:</label>
              	
                <div class="input-group">
           
                 <input onChange="readURL(this);" type="file" name="pic"/>
                
                </div>
            
              </div>
			  
			  
             <div class="form-group">
              <label>Office Location :</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    	<i class="glyphicon glyphicon-map-marker"></i>
                    </div>
                  <select class="form-control" name="cmbOlocation">
                 	 <option><?php echo isset($olocation)?$olocation:""?></option>
                  	<option value="Head Office">Head Office</option>
                    <option value="Brance Office">Branch Office</option>
                  </select>
                
                </div>
              </div> 
			  
			    <div class="form-group">
              <label> User Status :</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    	<i class="fa fa-status"></i>
                    </div>
                  <select class="form-control" name="cmbStatus">
                   	<option><?php echo isset($status)?$status:""?></option>
                  	<option value="Active"> Active</option>
                    <option value="InActive"> InActive</option>
                  </select>
                
                </div>
              </div> 
             
			    <div class="form-group">
              <label> User Type :</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    	<i class="fa fa-status"></i>
                    </div>
                  <select class="form-control" name="cmbUtype">
                  
                
                  <?php
                  $role_table = $db->query("select id,name from bf_role");
				  while(list($id,$name)=$role_table->fetch_row()){
                  	if($user_id==$id){
						echo "<option value='$id' selected>$name</option>";
						}else{
						echo "<option value='$id' >$name</option>";	
							}
					
					 }
				
				  ?>
                  </select>
                
                </div>
              </div> 
			  
			    <div class="form-group">
               <label>Password:</label>
                  
                  <div class="input-group">
                  	<div class="input-group-addon">
                    <i class="fa fa-key"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="**********" name="pwdPassword" value="<?php echo isset($password)?$password:""?>"/>
                  </div>
              </div>
              
               <div class="form-group">
               <label>Retype Password:</label>
                  
                  <div class="input-group">
                  	<div class="input-group-addon">
                    <i class="fa fa-key"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="**********" name="pwdRePassword" value="<?php echo isset($password)?$password:""?>"/>
                  </div>
              </div>
			  
			  
             
            </div>
       
		 <div class="form-group ">
         
      <div class="col-sm-offset-5 col-sm-5">
      <input type="submit" name="btnSubmit" value="Update" class="btn btn-primary  " />
     
      </div>
     </div>   
		   
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
</div>

</form>





