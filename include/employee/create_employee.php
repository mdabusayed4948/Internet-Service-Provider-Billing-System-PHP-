
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
		
	
		$ename        = validate($_POST["txtEmpname"]);
		$mail         = validate($_POST["txtEmail"]);
		$contact      = validate($_POST["txtContact"]);
		$paddress     = validate($_POST["txtPaddress"]);
		$peraddress   = validate($_POST["txtPerAddress"]);
		$gender       = validate($_POST["txtGender"]);
		$status       = validate($_POST["txtStatus"]);
		$date         = validate($_POST["txtDate"]);
		$designation  = validate($_POST["cmbDesignation"]);
		
		if($ename==""){
			array_push($errors,"Employee name field is Empty !!");
		
        }else if (!preg_match("/^[a-zA-Z ]*$/",$ename)) {
         array_push($errors,"Only letters and white space allowed");
            }

        if($designation==""){
			array_push($errors," Designation field is Empty !!");	
		}
		
		if($mail==""){
			array_push($errors,"E-mail Addrtess field is Empty !!");	
		}else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			array_push($errors,"Invalid email format");	
		}
		
		if($contact==""){
			array_push($errors,"Contact no field is empty !!");	
		}else if(!preg_match('/^[0-9]{11,13}$/',$contact)){
		array_push($errors,"Only Number and White space allowed");	
		}
		
		if($paddress==""){
			array_push($errors,"Present Address field is Empty !!");	
		}
		
		if($peraddress==""){
			array_push($errors,"Permanent Address field is Empty !!");	
		}
		
		if($gender==""){
			array_push($errors,"Gender field is Empty !!");	
		}
		
		if($status==""){
			array_push($errors,"Status field is Empty !!");	
		}
		
		if($date==""){
			array_push($errors,"Date field is Empty !!");	
		}
		
		if(count($errors)==0){
		$db->query("insert into bf_employee(name,email,mobile,p_address,per_address,image,gender,status,join_date,designation_id)     values('$ename','$mail','$contact','$paddress','$peraddress','$upload_image','$gender','$status','$date','$designation')");
			
			echo "<div class='alert alert-success alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Success !</strong> Successfully Created .
			</div>";
			$ename = $mail = $contact = $paddress = $peraddress = $upload_image = $gender = $status = $date =$designation = "";
		}else{
			
			echo "<div class='alert alert-danger alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong></strong>".implode("<br/>",$errors)."
			</div>";
		}
	}
	
	
	function validate($data){
		$data = trim($data);	
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>

<form method="post" action="home.php?item=6" enctype="multipart/form-data" id="form1" runat="server">
<div class="box box-default">
	<div class="box-header with-border">
      <h3 class="box-title">Employee Create Form</h3>
      
      <div class="box-tools pull-right">
      	 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         <a href="home.php?item=7" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
      </div>
    </div>
    
 <div class="box-body">
    <div class="row">
      <div class="col-md-6">
      
        <div class="form-group">
        <label>Employee Name :</label>
        
        	<div class="input-group">
              <div class="input-group-addon">
              <i class="fa fa-user"></i>
              </div>
              <input type="text" placeholder="Employee Name" name="txtEmpname" class="form-control"/>
            </div>
        </div>

          <div class="form-group">
        <label> Designation :</label>
        
        	<div class="input-group">
             
            <select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size="10" name="cmbDesignation">
             <option>--Select--</option>
             	<?php
             	   $designation_table = $db->query("select id,name,salary from bf_designation");
             	   while(list($id,$name,$salary)=$designation_table->fetch_row()){
             	   	echo "<option value='$id'>$name | $salary</option>";
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
          <input type="email" placeholder="E-mail Address" name="txtEmail" class="form-control"/>
        </div>
        </div>
        
        <div class="form-group">
        <label>Contact No :</label>
        
        <div class="input-group">
          <div class="input-group-addon">
          	<i class="fa fa-phone"></i>
          </div>
          <input type="text" placeholder="Contact No" class="form-control" name="txtContact"/>
        
        </div>
        </div>
        
        <div class="form-group">
         <label>Present Address :</label>
         
         <div class="input-group">
           <div class="input-group-addon">
           	<i class="fa fa-map-marker"></i>
           </div>
          <textarea class="form-control" rows="3" name="txtPaddress" placeholder="Present Address"></textarea>
         </div>
        </div>
        
        <div class="form-group">
        <label>Permanent Address :</label>
        
        <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-map-marker"></i>
        </div>
        <textarea class="form-control" rows="3" name="txtPerAddress" placeholder="Permanent Address"></textarea>
        </div>
        
        </div>
        
      </div><!----end col-md-6------------>
      
      <div class="col-md-6">
      
      <div class="form-group">
       <img id="test" alt="" class="thumbnail" width="120" height="130"/>
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
        <input type="text" class="form-control pull-right" id="Date" name="txtDate" placeholder="yyyy-mm-dd"/>
      </div>
      </div>
	  
      </div>
      
    
      
      
    </div><!-----end row------------>
	
	<div class="form-group">
    <div class="col-sm-offset-5 col-sm-5">
    <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"/>
    <input type="reset" value="Refresh" class="btn btn-success" />
    </div>
    </div>
    
 </div><!---end box body--------->
    
</div><!---end box box-default----->



</form>