

<?php

	if(isset($_POST["txtbillincome"])){

		$bill_id = $_POST["txtbillincome"];

		$bill_table = $db->query("select id,customer_id,source_id,amount,due_amount,income_date,status from bf_income where id='$bill_id' ");

		list($bill_id,$name,$source,$pamount,$damount,$date,$status) = $bill_table->fetch_row();
	}


	if(isset($_POST["btnSubmit"])){

		$bill_id = validate($_POST["txtbillincome"]);
		$name    = validate($_POST["txtCname"]);
		$source  = validate($_POST["cmbSource"]);
		$pamount = validate($_POST["txtPamount"]);
		$damount = validate($_POST["txtDamount"]);
		$date    = validate($_POST["txtDate"]);
		$status  = validate($_POST["cmbStatus"]);

	
		$db->query("update bf_income set customer_id='$name',source_id='$source',amount='$pamount',due_amount='$damount',income_date='$date ',status='$status' where id='$bill_id'");

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

<form method="POST" action="home.php?item=28">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Bill Edit Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<a href="home.php?item=25" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
				<div class="form-group" hidden="">
				<label>bill id :</label>	
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-calendar"></i>	
					</div>
					<input type="text" name="txtbillincome"  class="form-control" value="<?php echo isset($bill_id)?$bill_id:"";?>">
				</div>
				</div>
					<div class="form-group">
					<label>Customer Name :</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<select class="form-control" name="txtCname">
						
							<?php
						$customer_table = $db->query("select c.id,c.name,c.contact,c.email,p.package_speed,p.amount from bf_client as c, bf_package as p where p.id=c.package_id");
						while(list($id,$cname,$contact,$email,$speed,$amount)=$customer_table->fetch_row()){
							if($name==$id){
							echo "<option value='$id' selected>id=$id | $cname | $contact | $email | $speed | $amount</option>";	
						}else{
							echo "<option value='$id'>id=$id | $cname | $contact | $email | $speed | $amount</option>";	
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
							while(list($id,$sname)=$source_table->fetch_row()){
								if($source==$id){
								echo "<option value='$id' selected> $sname</option>";
								}else{
								echo "<option value='$id' > $sname</option>";	
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
					<input type="text" name="txtPamount" class="form-control" placeholder="Paid Amount" value="<?php echo isset($pamount)?$pamount:""?>">
				</div>	
				</div>

				<div class="form-group">
				<label>Due Amount :</label>	
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-usd"></i>
					</div>
					<input type="text" name="txtDamount" class="form-control" placeholder="Due Amount" value="<?php echo isset($damount)?$damount:""?>">
				</div>
				</div>

				<div class="form-group">
				<label>Date :</label>	
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-calendar"></i>	
					</div>
					<input type="text" name="txtDate" id="Date" class="form-control" placeholder="bill Collection Date" value="<?php echo isset($date)?$date:""?>">
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