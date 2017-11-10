

<?php
	if(isset($_POST["btnSubmit"])){


		$source  = validate($_POST["cmbSource"]);
		$pamount = validate($_POST["txtPamount"]);
	
		$date    = validate($_POST["txtDate"]);
		$status  = validate($_POST["cmbStatus"]);

		$errors = array();

		

		if($source==""){
			array_push($errors,"Source Field is Empty !!");
		}

		if($date==""){
			array_push($errors,"Date field is Empty !!");
		}

		if($status==""){
			array_push($errors,"Status field is Empty !!");
		}

		if(count($errors)==0){
			$db->query("insert into bf_income(source_id,amount,income_date,status) values('$source','$pamount','$date','$status')");

			echo "<div class='alert alert-success alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Success !</strong> Successfully Created.
			</div>";
			$source = $pamount = $date = $status = "";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Warning !</strong>".implode("<br/>",$errors)."
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

<form method="POST" action="home.php?item=29">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Others Bill Collection Form</h3>
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
					

					<div class="form-group">
					<label>Source Name :</label>
					<div class="input-group">
						
						<select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size="10" name="cmbSource">
						<option>--Select--</option>
							<?php
							$source_table = $db->query("select id,name from bf_source");
							while(list($id,$name)=$source_table->fetch_row()){
								echo "<option value='$id'> $name</option>";
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
					<input type="text" name="txtPamount" class="form-control" placeholder=" Amount">
				</div>	
				</div>

				

				<div class="form-group">
				<label>Date :</label>	
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-calendar"></i>	
					</div>
					<input type="text" name="txtDate" id="Date" class="form-control" placeholder="bill Collection Date">
				</div>
				</div>

				<div class="form-group" hidden="">
				<label>Status :</label>
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-paper-plane"></i>
					</div>
					<select class="form-control" name="cmbStatus">
						
						<option value="OthersIncome">OthersIncome</option>
					
					</select>
				</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-5">
						<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
						<input type="reset" value="Refresh" class="btn btn-success">
					</div>
				</div>
			</div>


		</div>

	</div>
</form>