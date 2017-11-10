
<?php
	if(isset($_POST["btnSubmit"])){
	    
		$file_name = $_FILES["pic"]["name"];
		$tmp_name = $_FILES["pic"]["tmp_name"];
		$type = $_FILES["pic"]["type"];
		$file_size = $_FILES["pic"]["size"];
		$div =explode('.',$file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image="images/".$unique_image;
		
		$errors = array();
		
		if($upload_image==""){
			array_push($errors,"Please Select any Image !!");
			}
			
		if(empty($file_name)){
			
		  echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Warning!</strong>Image Upload field is empty!!
  </div>";	
		}else{
		$kb=$file_size/1024;
		
		if("image/jpeg"==$type ||
		"image/png"==$type ||
		"image/gif"==$type ||
		"application/pdf"==$type){
		if($kb<=400){
		 copy($tmp_name,$upload_image);	
		 echo " ";
		 }else{
		echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Warning!</strong>File size is more than 200kb. Actual file size is $kb kb
  </div>";
			 
			}	
		}else{
		 echo "<div class='alert alert-danger alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Warning!</strong>Invalid format !
  </div>";
	 
	 
			}	
		}
		
		$name       =  validate($_POST["txtUserName"]);
		$mail       =  validate($_POST["txtEmail"]);
		$gender     =  validate($_POST["cmbGender"]);
		$contact    =  validate($_POST["txtContact"]);
		$address    =  validate($_POST["txtAddress"]);
		$olocation  =  validate($_POST["cmbOlocation"]);
		$status     =  validate($_POST["cmbStatus"]);
		$utype      =  validate($_POST["cmbUtype"]);
		$date       =  validate($_POST["txtJoin"]);
		$pwd        =  md5(validate($_POST["pwdPassword"]));
		$repwd      =  md5(validate($_POST["pwdRePassword"]));
		
		
		
	
		
		if($name==""){
			array_push($errors,"Username field is Empty !!");
		
        }else if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
         array_push($errors,"Only letters and white space allowed");
            }
			
		if($mail==""){
			array_push($errors,"Email address Field is Empty !!");
		}else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        array_push($errors,"Invalid email format"); 
   		 }
			
		if($gender==""){
			array_push($errors,"Gender field is Empty !!");	
		}
		
		if($date==""){
			array_push($errors,"Date field is Empty !!");	
		}
		
		if($contact==""){
			array_push($errors,"Contact no field is Empty !!");	
		}else if(!preg_match('/^[0-9]{11,13}$/', $contact)) {
         array_push($errors,"Only Number and white space allowed");
            }
			
		
		 
		if($address==""){
		array_push($errors,"Address field is Empty !!");	
		}
	
		if($olocation==""){
		array_push($errors,"Location field is Empty !!");	
		}
		
		if($status==""){
		array_push($errors,"Status field is Empty !!");	
		}
		
		if($utype==""){
		array_push($errors,"User Type field is Empty !!");	
		}
		
		if($pwd==""){
		array_push($errors,"Password field is Empty !!");	
		}
		
		if($repwd==""){
		array_push($errors,"Retype Password field is Empty !!");	
		}
		
		
		if($pwd!=$repwd ){
		array_push($errors,"Password did not match");	
		}
		
		if(count($errors)==0){
			$db->query("insert into bf_users(username,password,email,mobile,address,image,office_location,status,gender,role_id,join_date) values(' $name','$pwd','$mail','$contact','$address','$upload_image','$olocation','$status','$gender','$utype','$date');");
			
	 echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Created.
  </div>";
	 
	 $name = $pwd = $repwd =$mail = $gender = $contact = $address = $upload_image = $olocation = $status =$utype=$date= "";   

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



<form method="post" enctype="multipart/form-data" action="home.php?item=1" id="form1" runat="server">



    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">User Create Form</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
       
            <a href="home.php?item=2" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
         
              <div class="form-group">
              <label>User Name:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Username" name="txtUserName">
                </div>
              
              </div>
          
			
			  
			  
              
              <div class="form-group">
              	<label>E-mail:</label>
                
                	<div class="input-group">
                      <div class="input-group-addon">
                      	<i class="fa fa-envelope"></i>
                      
                      </div>
                        <input type="email" class="form-control" placeholder="E-mail" name="txtEmail"/>
                    </div>
              </div>
              
               <div class="form-group">
              	<label>Gender:</label>
                
                	<div class="input-group">
                      <div class="input-group-addon">
                      	<i class="fa fa-user"></i>
                      
                      </div>
                       <select class="form-control" name="cmbGender">
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
                    <input type="text" class="form-control" name="txtContact"/>
                
                </div>
              </div>
           
            <div class="form-group">
              <label> Address:</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    <i class="glyphicon glyphicon-tags" ></i>	
                    </div>
                 
                   <textarea class="form-control" rows="3" name="txtAddress"></textarea>
                </div>
              </div>
              
                 <div class="form-group">
                <label>Joining Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="Date" name="txtJoin">
                </div>
                <!-- /.input group -->
              </div>
            
			  
            </div>
            
        
            
            <div class="col-md-6">
	
			
              <div class="form-group">
                <img id="test"  alt="" class="thumbnail" width="100" height="100"/>
              <label> Image:</label>
              	
                <div class="input-group">
                	
              		<input onChange="readURL(this);"type="file" name="pic"/>
                   
                
                </div>
            
              </div>
			  
			  
             <div class="form-group">
              <label>Office Location :</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    	<i class="glyphicon glyphicon-map-marker"></i>
                    </div>
                  <select class="form-control" name="cmbOlocation">
                  	<option value="Head Office">Head Office</option>
                    <option value="Brance Office">Branch Office</option>
                  </select>
                
                </div>
              </div> 
			  
			    <div class="form-group">
              <label> User Status :</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    	<i class="glyphicon glyphicon-send"></i>
                    </div>
                  <select class="form-control" name="cmbStatus">
                  	<option value="Active"> Active</option>
                    <option value="InActive"> InActive</option>
                  </select>
                
                </div>
              </div> 
             
			    <div class="form-group">
              <label> User Type :</label>
              	
                <div class="input-group">
                	<div class="input-group-addon">
                    	<i class="fa fa-user"></i>
                    </div>
                  <select class="form-control" name="cmbUtype">
                  
                  <option>--select--</option>
                  <?php
                  $role_table = $db->query("select id,name from bf_role");
				  while(list($id,$name)=$role_table->fetch_row()){ ?>
                  
					<option value="<?php echo $id;?>"><?php echo $name;?></option>
					<?php }
				  
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
                    <input type="text" class="form-control" placeholder="**********" name="pwdPassword"/>
                  </div>
              </div>
              
               <div class="form-group">
               <label>Retype Password:</label>
                  
                  <div class="input-group">
                  	<div class="input-group-addon">
                    <i class="fa fa-key"></i>
                    </div>
                    <input type="text" class="form-control" placeholder="**********" name="pwdRePassword"/>
                  </div>
              </div>
			  
			  
             
            </div>
       
		 <div class="form-group ">
         
      <div class="col-sm-offset-5 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary  " />
      <input type="reset"  value="Refresh" class="btn btn-success" />
      </div>
     </div>   
		   
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>


</form>












