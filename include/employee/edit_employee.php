
<?php
	
	if(isset($_POST["txtEmpId"])){

		$emp_id = $_POST["txtEmpId"];

		$emp_table = $db->query("select id,name,email,mobile,p_address,per_address,image,gender,status,join_date,designation_id from bf_employee where id='$emp_id'");

		list($emp_id,$ename,$mail,$contact,$paddress,$peraddress,$image,$gender,$status,$date,$designation)=$emp_table->fetch_row();
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
	    
	  $emp_id = $_POST["txtEmpId"];
        	
	$msg=$db->query("update  bf_employee set  image='$upload_image' where id='$emp_id'");
  
	    }
        
        } 
		$emp_id       = validate($_POST["txtEmpId"]);	
		$ename        = validate($_POST["txtEmpname"]);
		$mail         = validate($_POST["txtEmail"]);
		$contact      = validate($_POST["txtContact"]);
		$paddress     = validate($_POST["txtPaddress"]);
		$peraddress   = validate($_POST["txtPerAddress"]);
		$gender       = validate($_POST["txtGender"]);
		$status       = validate($_POST["txtStatus"]);
		$date         = validate($_POST["txtDate"]);
		$designation  = validate($_POST["cmbDesignation"]);
		
		$errors = array();
		
	
		
	
			
		 if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        array_push($errors,"Invalid email format"); 
   		 }
		
		 if(!preg_match('/^[0-9]{11,13}$/', $contact)) {
         array_push($errors,"Only Number and white space allowed");
            }
			
	
	
		
		if(count($errors)==0){
			$msg=$db->query("update bf_employee set name='$ename',email='$mail',mobile='$contact',p_address='$paddress',per_address='$peraddress',gender='$gender',status='$status',join_date='$date' ,designation_id='$designation' where id='$emp_id'");
		

	
	}
		if($msg==true){
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

<form method="POST" action="home.php?item=9" enctype="multipart/form-data">
	<div class="box box-default">
	<div class="box-header with-border">
      <h3 class="box-title">Employee Update Form</h3>
      
      <div class="box-tools pull-right">
      	 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         <a href="home.php?item=7"><i class="glyphicon glyphicon-log-out"></i></a>
      </div>
    </div>

	<div class="box-body">
		<div class="row">
			<div class="col-md-6">

				<div class="form-group" hidden="">
				<label>Employee Id :</label>	
				<div class="input-group">
				 <div class="input-group-addon">
				   <i class="fa fa-user"></i>	
				 </div>	
				 <input type="text" name="txtEmpId" placeholder="Employee Name" class="form-control" value="<?php echo isset($emp_id)?$emp_id:""?>">
				</div>
				</div>

				<div class="form-group">
				<label>Employee Name :</label>	
				<div class="input-group">
				 <div class="input-group-addon">
				   <i class="fa fa-user"></i>	
				 </div>	
				 <input type="text" name="txtEmpname" placeholder="Employee Name" class="form-control" value="<?php echo isset($ename)?$ename:""?>">
				</div>
				</div>


          <div class="form-group">
        <label> Designation :</label>
        
        	<div class="input-group">
             
            <select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size="10" name="cmbDesignation">
           
             	<?php
             	   $designation_table = $db->query("select id,name,salary from bf_designation");
             	   while(list($id,$name,$salary)=$designation_table->fetch_row()){
             	   	if($designation==$id){
             	   		echo "<option value='$id' selected>$name | $salary</option>";
             	   	}else{
             	   		echo "<option value='$id'>$name | $salary</option>";	
             	   	}
             	   	
             	   }
             	?>
             </select>
            </div>
        </div>

			<div class="form-group">
			<label>E-mail :</label>
			<div class="input-group">
			<div class="input-group-addon">
		    <i class="glyphicon glyphicon-envelope"></i>
				
			</div>
			<input type="email" name="txtEmail" class="form-control" placeholder="E-mail" value="<?php echo isset($mail)?$mail:""?>">
				
			</div>
				
			</div>

			<div class="form-group">
        <label>Contact No :</label>
        
        <div class="input-group">
          <div class="input-group-addon">
          	<i class="fa fa-phone"></i>
          </div>
          <input type="text" placeholder="Contact No" class="form-control" name="txtContact" value="<?php echo isset($contact)?$contact:""?>" />
        
        </div>

        <div class="form-group">
         <label>Present Address :</label>
         
         <div class="input-group">
           <div class="input-group-addon">
           	<i class="fa fa-map-marker"></i>
           </div>
          <textarea class="form-control" rows="3" name="txtPaddress" placeholder="Present Address"><?php echo isset($paddress)?$paddress:""?></textarea>
         </div>
        </div>

        <div class="form-group">
         <label>Permanent Address :</label>
         
         <div class="input-group">
           <div class="input-group-addon">
           	<i class="fa fa-map-marker"></i>
           </div>
          <textarea class="form-control" rows="3" name="txtPerAddress" placeholder="Present Address"><?php echo isset($peraddress)?$peraddress:""?></textarea>
         </div>
        </div>


        </div>

			</div>

		<div class="col-md-6">
		 <div class="form-group">
       <img src="<?php echo isset($image)?$image:""?>" id="test" alt="" class="thumbnail" width="120" height="130"/>
       <label>Chose Image :</label>
       <div class="input-group">
       <input onChange="readURL(this);"type="file" name="pic"/>
                   
       </div>
      </div>

       <div class="form-group">
      <label>Gender :</label>
      
      <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-user"></i>
      </div>
      <select class="form-control" name="txtGender">
      	<option><?php echo isset($gender)?$gender:""?></option>
      	<option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      </div>
      
      </div>

       <div class="form-group">
      <label>Employee Status :</label>
      
      <div class="input-group">
      <div class="input-group-addon">
      	<i class="fa fa-paper-plane"></i>
      </div>
      <select class="form-control" name="txtStatus">
      	<option><?php echo isset($status)?$status:""?></option>
      	<option value="Active">Active</option>
        <option value="InActive">InActive</option>
      </select>
      </div>
      
      </div>

       <div class="form-group">
      <label>Joining Date :</label>
      
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="Date" name="txtDate" placeholder="yyyy-mm-dd" value="<?php echo isset($date)?$date:""?>" />
      </div>
      </div>
			</div>
		</div>

		<div class="form-group">
    <div class="col-sm-offset-5 col-sm-5">
    <input type="submit" name="btnSubmit" value="Update" class="btn btn-primary"/>
  
    </div>
    </div>
	</div>

	</div>
</form>