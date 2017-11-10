
<?php
	if(isset($_POST["btnSubmit"])){

		$cname       = validate($_POST["txtCustomer"]);
		$gender      = validate($_POST["cmbGender"]);
		$contact     = validate($_POST["txtContact"]);
		$mail        = validate($_POST["txtMail"]);
		$blood       = validate($_POST["cmbBlood"]);
		$national_id = validate($_POST["txtNationalid"]);
		$occupation  = validate($_POST["txtOcupation"]);
		$address     = validate($_POST["txtAddress"]);
		$ipaddress   = validate($_POST["txtIpAddress"]);
		$date        = validate($_POST["txtDate"]);
		$speed       = validate($_POST["txtSpeed"]);
		$status      = validate($_POST["cmbStatus"]);

		$errors = array();

		if($cname==""){
			array_push($errors, "Customer name field is Empty !!");
		}

		if($gender==""){
			array_push($errors, "Gender field is Empty !!");
		}

		if($contact==""){
			array_push($errors,"Contact no field is empty !!");	
		}else if(!preg_match('/^[0-9]{11,13}$/',$contact)){
		array_push($errors,"Only Number and White space allowed");	
		}

		if($mail==""){
			array_push($errors,"E-mail Addrtess field is Empty !!");	
		}else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			array_push($errors,"Invalid email format");	
		}

		if($blood==""){
			array_push($errors, "Blood Group field is Empty !!");
		}

		if($national_id==""){
			array_push($errors, "National Id field is Empty !!");
		}


		if($occupation==""){
			array_push($errors, "Occupation field is Empty !!");
		}


		if($address==""){
			array_push($errors, "Address field is Empty !!");
		}

		if($ipaddress==""){
			array_push($errors, "Ip Address field is Empty !!");
		}

		if($date==""){
			array_push($errors, "Connection Date field is Empty !!");
		}

		if($speed==""){
			array_push($errors, "Connection Date field is Empty !!");
		}

		if($status==""){
			array_push($errors, "Connection Date field is Empty !!");
		}

		if(count($errors)==0){
			$db->query("insert into bf_client(name,gender,contact,email,blood_group,national_id,occupation,address,ip_address,connection_date,package_id,status)values('$cname','$gender','$contact','$mail','$blood','$national_id','$occupation','$address','$ipaddress','$date','$speed','$status')");
			

				echo "<div class='alert alert-success alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Success !</strong> Successfully Created .
			</div>";

			$cname = $gender = $contact = $mail = $blood = $national_id = $occupation = $address = $ipaddress = $date = $speed = $status = " ";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
				<a href='#' class = 'close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Warning !</strong>".implode("<br/>",$errors)."
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

<form method="POST" action="home.php?item=11">

	<div class="box box-default">
		<div class="box-header with-border">
		<h3 class="box-title">Client Create Form</h3>	

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<a href="home.php?item=12" class="btn btn-default" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
		</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label>Client Name :</label>
					<div class="input-group">
					   <div class="input-group-addon">
					   	<i class="fa fa-user"></i>
					   </div>
					   <input type="text" name="txtCustomer" placeholder="Client Name" class="form-control">	
					</div>	
					</div>

					<div class="form-group">
					<label>Gender :</label>	
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
					<label>Contact No :</label>	
					<div class="input-group">
					  <div class="input-group-addon">
					  	<i class="fa fa-phone"></i>
					  </div>
					 <input type="text" name="txtContact" class="form-control" placeholder="Contact No">
						
					</div>
					</div>

					<div class="form-group">
					<label>E-mail Address :</label>	
					<div class="input-group">
					  <div class="input-group-addon">
					  	<i class="glyphicon glyphicon-envelope"></i>
					  </div>
					 <input type="email" name="txtMail" class="form-control" placeholder="E-mail">
						
					</div>
					</div>

					<div class="form-group">
					<label>Blood Group :</label>	
					<div class="input-group">
					  <div class="input-group-addon">
					  	<i class="fa fa-user"></i>
					  </div>
					  <select class="form-control" name="cmbBlood">
					  	<option>--select--</option>
					  	<option value="A (+ve)">A Positive (A +ve)</option>
					  	<option value="B (+ve)">B Positive (B +ve)</option>
					  	<option value="AB (+ve)">AB Positive (AB +ve)</option>
					  	<option value="O (+ve)">O Positive (O +ve)</option>
					  	<option value="A (-ve)">A Negative (A -ve)</option>
					  	<option value="B (-ve)">B Negative (B -ve)</option>
					  	<option value="AB (-ve)">AB Negative (AB -ve)</option>
					  	<option value="O (-ve)">O Negative (O -ve)</option>
					  </select>
						
					</div>
					</div>

					<div class="form-group">
					<label>National Id :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
						</div>
						<input type="text" name="txtNationalid" class="form-control" placeholder="National Id No">
					</div>
						
					</div>

				</div>

				<div class="col-md-6">

					<div class="form-group">
					<label>Occupation :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="glyphicon glyphicon-education""></i>
						</div>
						<input type="text" name="txtOcupation" class="form-control">
					</div>
						
					</div>

					<div class="form-group">
					<label>Address :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="glyphicon glyphicon-tags""></i>
						</div>
						<textarea class="form-control" rows="3" name="txtAddress"></textarea>
					</div>
						
					</div>

					<div class="form-group">
					<label>Ip Address :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="glyphicon glyphicon-sort"></i>
						</div>
						<input type="text" name="txtIpAddress" class="form-control">
					</div>
						
					</div>

					  <div class="form-group">
                <label>Connection Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="Date" name="txtDate">
                </div>
                
              </div>

              <div class="form-group">
                <label>Speed:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                   <i class="glyphicon glyphicon-signal"></i>
                  </div>
                  <select class="form-control" name="txtSpeed">
                  <option>--Select--</option>
                  	 <?php
                  $package_table = $db->query("select id,name,package_speed,amount from bf_package");
                  while(list($id,$name,$speed,$amount)=$package_table->fetch_row()){
                  	echo "<option value='$id'>id=$id | $name | $speed | $amount</option>";
                  }
                  ?>
                  </select>
                 
                 
                </div>
                
              </div>

              <div class="form-group">
                <label>Status:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-send"></i>
                  </div>
                  <select class="form-control" name="cmbStatus">
                  	<option value="Active">Active</option>
                  	<option value="InActive">InActive</option>
                  </select>
                </div>
                
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
	</div>

		

</form>