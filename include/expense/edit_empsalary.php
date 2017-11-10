

<?php

	if(isset($_POST["txtexpid"])){

		$exp_id = $_POST["txtexpid"];

		$exp_table= $db->query("select id,employee_id,source_id,amount,due_amount,exp_date,status from bf_expense where id='$exp_id' ");

		list($exp_id,$name,$source,$pamount,$damount,$date,$status)=$exp_table->fetch_row();
	}


	if(isset($_POST["btnSubmit"])){

		$name    = validate($_POST["txtEname"]);
		$source  = validate($_POST["cmbSource"]);
		$pamount = validate($_POST["txtPamount"]);
		$damount = validate($_POST["txtDamount"]);
		$date    = validate($_POST["txtDate"]);
		$status  = validate($_POST["cmbStatus"]);

	
		
			$db->query("update bf_expense set employee_id='$name',source_id='$source ',amount='$pamount',due_amount='$damount',exp_date='$date',status='$status' where id='$exp_id'");

			echo "<div class='alert alert-success alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Success !</strong> Successfully Updated.
			</div>";
		


	}

		function validate($data){
		$data = trim($data);	
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<form method="POST" action="home.php?item=38">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title"> Employee Salary Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<a href="home.php?item=37" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label>exp Id :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
					<input type="text" name="txtexpid" value="<?php echo isset($exp_id)?$exp_id:"";?>">
						
					</div>
					</div>

					<div class="form-group">
					<label>Employee Name :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<select class="form-control" name="txtEname">
						
							<?php
						$customer_table = $db->query("select e.id,e.name,e.email,e.mobile,d.name,d.salary from bf_employee as e,bf_designation as d where d.id=e.designation_id");
						while(list($id,$ename,$email,$mobile,$designation,$salary)=$customer_table->fetch_row()){
							if($name==$id){
								echo "<option value='$id' selected>id=$id | $ename | $email | $mobile | $designation | $salary</option>";
							}else{
								echo "<option value='$id'>id=$id | $ename | $email | $mobile | $designation | $salary</option>";
							}
							
						}
						?>
						</select>
						
					</div>
					</div>

					<div class="form-group">
					<label>Source Name :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<select class="form-control" name="cmbSource">
						
							<?php
							$source_table = $db->query("select id,name from bf_source");
							while(list($id,$name)=$source_table->fetch_row()){
								if($source==$id){
								echo "<option value='$id' selected> $name</option>";
								}else{
								echo "<option value='$id'> $name</option>";	
								}
								
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
				<label>Paid Amount :</label>
				<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-usd"></i>
				</div>
					<input type="text" name="txtPamount" class="form-control" value="<?php echo isset($pamount)?$pamount:""?>" placeholder="Paid Amount">
				</div>	
				</div>

				<div class="form-group">
				<label>Due Amount :</label>	
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-usd"></i>
					</div>
					<input type="text" name="txtDamount" class="form-control" placeholder="Due Amount" value="<?php echo isset($damount)?$damount:""?>" >
				</div>
				</div>

				<div class="form-group">
				<label>Date :</label>	
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-calendar"></i>	
					</div>
					<input type="text" name="txtDate" id="Date" class="form-control" placeholder="Date" value="<?php echo isset($date)?$date:""?>" >
				</div>
				</div>

				<div class="form-group">
				<label>Status :</label>
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-paper-plane"></i>
					</div>
					<select class="form-control" name="cmbStatus">
						<option><?php echo isset($status)?$status:""?></option>
						<option value="Paid">Paid</option>
						<option value="Unpaid">Unpaid</option>
						<option value="Due">Due</option>
					</select>
				</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-5">
						<input type="submit" name="btnSubmit" value="Update" class="btn btn-primary">
						
					</div>
				</div>
			</div>


		</div>

	</div>
</form>