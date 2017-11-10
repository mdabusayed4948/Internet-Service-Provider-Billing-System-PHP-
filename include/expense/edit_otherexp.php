

<?php

if(isset($_POST["txtOexp"])){

	$oexp_id = $_POST["txtOexp"];

	$otherexp_table = $db->query("select id,source_id, amount,exp_date,status from bf_expense where id='$oexp_id' ");
	list($oexp_id,$source,$pamount,$date,$status)=$otherexp_table->fetch_row();

	
}

	if(isset($_POST["btnSubmit"])){

		$oexp_id = $_POST["txtOexp"];
		$source  = validate($_POST["cmbSource"]);
		$pamount = validate($_POST["txtamount"]);
		$date    = validate($_POST["txtDate"]);
		$status  = validate($_POST["cmbStatus"]);

	
		
			$db->query("update bf_expense set source_id='$source',amount='$pamount',exp_date='$date',status='$status' where id='$oexp_id'");

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

<form method="POST" action="home.php?item=46">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Others Expense Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<a href="home.php?item=45" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					
						<div class="form-group">
				<label> oexp_id :</label>
				<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-usd"></i>
				</div>
					<input type="text" name="txtOexp" class="form-control" placeholder=" Amount" value="<?php echo isset($oexp_id)?$oexp_id:""?>">
				</div>	
				</div>

					<div class="form-group">
					<label>Source Name :</label>
					<div class="input-group">
						
						<select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size="10" name="cmbSource">
						
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
					<input type="text" name="txtamount" class="form-control" placeholder=" Amount" value="<?php echo isset($pamount)?$pamount:""?>">
				</div>	
				</div>

				

				<div class="form-group">
				<label>Date :</label>	
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-calendar"></i>	
					</div>
					<input type="text" name="txtDate" id="Date" class="form-control" placeholder="Date" value="<?php echo isset($date)?$date:""?>">
				</div>
				</div>

				<div class="form-group" hidden="">
				<label>Status :</label>
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-paper-plane"></i>
					</div>
					<select class="form-control" name="cmbStatus">
						
						<option value="OthersExp">OthersExp</option>
					
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