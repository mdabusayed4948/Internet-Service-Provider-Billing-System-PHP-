

<?php

	if(isset($_POST["txtOincome"])){

		$oincome_id = $_POST["txtOincome"];

		$oincome_table = $db->query("select id,source_id,amount,income_date from bf_income where id='$oincome_id'");
		list($oincome_id,$source,$amount,$date) = $oincome_table->fetch_row();
	}

	if(isset($_POST["btnSubmit"])){

		$oincome_id = $_POST["txtOincome"];

		$source  = validate($_POST["cmbSource"]);
		$amount = validate($_POST["txtPamount"]);
	
		$date    = validate($_POST["txtDate"]);
		

		
			$db->query("update bf_income set source_id='$source',amount='$amount',income_date='$date' where id='$oincome_id'");

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

<form method="POST" action="home.php?item=31">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Others Bill Collection Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<a href="home.php?item=30" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					
					<div class="form-group" hidden="">
				<label> Others Income Id :</label>
				<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-usd"></i>
				</div>
					<input type="text" name="txtOincome" class="form-control" value="<?php echo isset($oincome_id)?$oincome_id:""?>">
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
				<label> Amount :</label>
				<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-usd"></i>
				</div>
					<input type="text" name="txtPamount" class="form-control" placeholder=" Amount" value="<?php echo isset($amount)?$amount:""?>">
				</div>	
				</div>

				

				<div class="form-group">
				<label>Date :</label>	
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-calendar"></i>	
					</div>
					<input type="text" name="txtDate" id="Date" class="form-control" value="<?php echo isset($date)?$date:""?>">
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