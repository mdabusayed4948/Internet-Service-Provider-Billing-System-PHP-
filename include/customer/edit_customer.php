
<?php

	if(isset($_POST["txtCustomerId"])){

		$customer_id = $_POST["txtCustomerId"];

		$customer_table = $db->query("select id,name,gender,contact,email,blood_group,national_id,occupation,address,ip_address,connection_date,package_id,status from bf_client where id='$customer_id'");

		list($id,$name,$gender,$contact,$mail,$blood,$national_id,$occupation,$address,$ipaddress,$date,$speed,$status)=$customer_table->fetch_row();
	}

	if(isset($_POST["btnSubmit"])){

		$customer_id = validate($_POST["txtCustomerId"]);

		$name        = validate($_POST["txtCustomer"]);
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

		$db->query("update bf_client set name='$name',gender='$gender',contact='$contact',email='$mail',blood_group='$blood',national_id='$national_id',occupation='$occupation',address='$address',ip_address='$ipaddress',connection_date='$date',package_id='$speed',status='$status' where id='$customer_id'");
		
		
			echo "<div class='alert alert-success alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Success !</strong> Successfully Updated.
			</div>";

	}

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

?>

<form method="POST" action="home.php?item=15">

	<div class="box box-default">
		<div class="box-header with-border">
		<h3 class="box-title">Client Edit Form</h3>	

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<a href="home.php?item=12" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
		</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">

					<div class="form-group" hidden="">
					<label>Customer Id :</label>
					<div class="input-group">
					   <div class="input-group-addon">
					   	<i class="fa fa-user"></i>
					   </div>
					   <input type="text" name="txtCustomerId" placeholder="Customer Name" class="form-control" value="<?php echo isset($customer_id)?$customer_id:""?>">	
					</div>	
					</div>

					<div class="form-group">
					<label>Customer Name :</label>
					<div class="input-group">
					   <div class="input-group-addon">
					   	<i class="fa fa-user"></i>
					   </div>
					   <input type="text" name="txtCustomer" placeholder="Customer Name" class="form-control" value="<?php echo isset($name)?$name:""?>">	
					</div>	
					</div>

					<div class="form-group">
					<label>Gender :</label>	
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
					<label>Contact No :</label>	
					<div class="input-group">
					  <div class="input-group-addon">
					  	<i class="fa fa-phone"></i>
					  </div>
					 <input type="text" name="txtContact" class="form-control" placeholder="Contact No" value="<?php echo isset($contact)?$contact:""?>">
						
					</div>
					</div>

					<div class="form-group">
					<label>E-mail Address :</label>	
					<div class="input-group">
					  <div class="input-group-addon">
					  	<i class="glyphicon glyphicon-envelope"></i>
					  </div>
					 <input type="email" name="txtMail" class="form-control" placeholder="E-mail" value="<?php echo isset($mail)?$mail:""?>">
						
					</div>
					</div>

					<div class="form-group">
					<label>Blood Group :</label>	
					<div class="input-group">
					  <div class="input-group-addon">
					  	<i class="fa fa-user"></i>
					  </div>
					  <select class="form-control" name="cmbBlood">
					  	<option><?php echo isset($blood)?$blood:""?></option>
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
						<input type="text" name="txtNationalid" class="form-control" placeholder="National Id No" value="<?php echo isset($national_id)?$national_id:""?>">
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
						<input type="text" name="txtOcupation" class="form-control" value="<?php echo isset($occupation)?$occupation:""?>">
					</div>
						
					</div>

					<div class="form-group">
					<label>Address :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="glyphicon glyphicon-tags""></i>
						</div>
						<textarea class="form-control" rows="3" name="txtAddress"><?php echo isset($address)?$address:""?></textarea>
					</div>
						
					</div>

					<div class="form-group">
					<label>Ip Address :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="glyphicon glyphicon-sort"></i>
						</div>
						<input type="text" name="txtIpAddress" class="form-control" value="<?php echo isset($ipaddress)?$ipaddress:""?>">
					</div>
						
					</div>

					  <div class="form-group">
                <label>Connection Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="Date" name="txtDate" value="<?php echo isset($date)?$date:""?>">
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Speed:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                   <i class="glyphicon glyphicon-signal"></i>
                  </div>
                  <select class="form-control" name="txtSpeed">
                  	<?php 
                  	$package_table = $db->query("select id,name,package_speed,amount from bf_package");
                  	while(list($id,$name,$pspeed,$amount)=$package_table->fetch_row()){
                  		if($speed==$id){
                  		echo "<option value='$id' selected>$id | $name | $pspeed | $amount</option>";
                  		}else{
                  		echo "<option value='$id'>$id | $name | $pspeed | $amount</option>";	
                  		}
                  		
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
                   <option><?php echo isset($status)?$status:""?></option>
                  	<option value="Active">Active</option>
                  	<option value="InActive">InActive</option>
                  </select>
                </div>
                <!-- /.input group -->
              </div>

				</div>


			</div>

			 <div class="form-group ">
         
      <div class="col-sm-offset-5 col-sm-5">
      <input type="submit" name="btnSubmit" value="Update" class="btn btn-primary  " />
     
      </div>
     </div> 

		</div>
	</div>

		

</form>